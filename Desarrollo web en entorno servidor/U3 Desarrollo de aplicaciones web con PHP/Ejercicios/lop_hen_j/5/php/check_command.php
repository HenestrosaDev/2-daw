<?php
function getPrice($dbh, $table, $args) {
	$sql_get_price = "SELECT price FROM {$table} WHERE id=?";
	$sth_get_price = $dbh->prepare($sql_get_price);
	$sth_get_price->execute($args);
	$price = $sth_get_price->fetch();	
	return $price[0];
}

if (!empty($_POST["command"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
	session_status() === PHP_SESSION_ACTIVE ?: session_start();
	require_once("../../php/connect_db.php");

	$command_lines = json_decode($_POST["command"], true);
	$valid_command_lines = [];
	$command_price = 0;

	foreach ($command_lines as $command_line) {
		$args = array(
			"id"   					=> FILTER_SANITIZE_STRING,
			"nameForClient"	=> FILTER_SANITIZE_STRING,
			"isFamiliar"  	=> FILTER_VALIDATE_BOOLEAN,
			"price" 				=> FILTER_VALIDATE_FLOAT
		);

		$safe_command_line = filter_var_array($command_line, $args);

		$price = 0;

		if (str_contains($safe_command_line["id"], "custom")) {
			/*
			 * Obtenemos la cookie asociada a esta pizza ya
			 * que contiene el id de los ingredientes. 
			 */
			$ingredients_id = explode(",", $_COOKIE[$safe_command_line["id"]]);
			
			/*
			 * Obtenemos los precios de los ingredientes y 
			 * calculamos el precio de la pizza en base a ello
			 */
			foreach ($ingredients_id as $ingredient_id) {
				$price += getPrice($dbh, "ingredient", array($ingredient_id));
			}

			// Añadimos el precio de la masa
			if ($safe_command_line["isFamiliar"] === true) {
				$price += 4.95;
				$safe_command_line["size"] = "F";
			} else {
				$price += 3.95;
				$safe_command_line["size"] = "M";
			}

			$safe_command_line["ingredient_id"] = implode(",", $ingredients_id);

		} else {
			/**
			 * Obtenemos el precio desde la base de datos
			 * para evitar que el usuario manipule el precio
			 * desde HTML/JavaScript.
			 */
			$price = getPrice($dbh, "pizza_type", array($safe_command_line["id"]));
 
			// Si hay problemas con el precio, paramos la ejecución			 
			if (!(!empty($price))) {
				header("Location: ../../index.php");
				exit();
			}

			/*
			 * Como no es necesario tener ingredientes 
			 * necesarios en esta pizza (se trata de
			 * una especialidad), introduciremos la key
			 * "ingredient_id" vacía.
			 */

			$safe_command_line["ingredient_id"] = "";

			// Añadimos 1€ si la masa es familiar
			if ($safe_command_line["isFamiliar"] === true) {
				$price += 1;
				$safe_command_line["size"] = "F";
			} else {
				$safe_command_line["size"] = "M";
			}
		}

		/*
		 * A partir de aquí se ejecuta el código de la misma
		 * manera para las especialidades y las custom.
		 */
		$safe_command_line["price"] = $price;
		$command_price += $price;

		/*
		 * Almacenamos la línea de la comanda en el array
		 * de comandas saneadas.
		 */
		$valid_command_lines[] = $safe_command_line;
	}

	/*
	 * Si se ejecuta con éxito el bucle foreach,
	 * es porque no ha habido ningún problema con
	 * el procesamiento de los datos, por lo que los
	 * guardamos en la base de datos.
	 */
	$sql_insert_command = "INSERT INTO command (app_user_id, price) VALUES (?, ?)";
	$sth_insert_command = $dbh->prepare($sql_insert_command);
	$sth_insert_command->execute(array($_SESSION["app_user_id"], $command_price));

	/*
	 * Obtenemos el id de la comanda que acabamos de
	 * introducir para asociarla a las líneas de la 
	 * propia comanda. 
	 */
	$sql_get_command = "SELECT id FROM command WHERE app_user_id=? ORDER BY id DESC LIMIT 1";
	$sth_get_command = $dbh->prepare($sql_get_command);
	$sth_get_command->execute(array($_SESSION["app_user_id"]));
	$command_id =  $sth_get_command->fetch();

	 /*
		* Introducimos las líneas de la comanda
		*/
	foreach ($valid_command_lines as $valid_command_line) {
		$sql_insert_command_line = "INSERT INTO command_line (command_id, pizza_type_id, ingredient_id, price, size) VALUES (?, ?, ?, ?, ?)";
		$sth_insert_command_line = $dbh->prepare($sql_insert_command_line);
		$sth_insert_command_line->execute(
			array(
				$command_id[0],
				$valid_command_line["id"], 
				$valid_command_line["ingredient_id"], 
				$valid_command_line["price"], 
				$valid_command_line["size"]
			)
		);
	}
}
