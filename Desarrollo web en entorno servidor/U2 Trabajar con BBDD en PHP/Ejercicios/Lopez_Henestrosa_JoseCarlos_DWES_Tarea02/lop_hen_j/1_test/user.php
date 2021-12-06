<!doctype html>
<html lang="es">

<head>
	<title>Unidad 2 | Ejercicio 1: Test</title>
	<?php
	require_once("../php/get_relative.php");
	$relative = get_relative(__FILE__);
	$active = 1;
	include $relative . "/common/head.php";
	?>
	<link href="<?= $relative ?>/css/form-container.css" rel="stylesheet">
</head>

<body class="bg-light">

	<?php include $relative . "/common/nav.php" ?>

	<div class="container pt-3">
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">Examen unidad 2</h1>
			</div>
		</header>

		<main>
			<h4 class="mb-3">Si al utilizar PDO, intentas comenzar una transacción con un motor de almacenamiento que no las soporta, obtendrás un error. ¿Verdadero o falso?</h4>

			<div class="my-3" id="question__container">
				<div class="form-check">
					<input id="question__1-1" name="question__1" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__1-1">Verdadero</label>
				</div>
				<div class="form-check">
					<input id="question__1-2" name="question__1" type="radio" class="form-check-input" checked required>
					<label class="form-check-label" for="question__1-2">Falso</label>
				</div>
			</div>

			<hr class="my-4">

			<h4 class="mb-3">Con la extensión PDO, para obtener un array a partir de un conjunto de resultados debes utilizar:</h4>

			<div class="my-3" id="question__container">
				<div class="form-check">
					<input id="question__2-1" name="question__2" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__2-1">el método fetch_assoc</label>
				</div>
				<div class="form-check">
					<input id="question__2-2" name="question__2" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__2-2">el método fetch_array</label>
				</div>
				<div class="form-check">
					<input id="question__2-3" name="question__2" type="radio" class="form-check-input" checked required>
					<label class="form-check-label" for="question__2-3">
						el método fetch</label>
				</div>
				<div class="form-check">
					<input id="question__2-4" name="question__2" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__2-4">
						el método fetch_row</label>
				</div>
			</div>

			<hr class="my-4">

			<h4 class="mb-3">Se debe configurar PDO para que cuando se produzca un error genere excepciones utilizando el manejador base de PHP, Exception. ¿Verdadero o falso?</h4>

			<div class="my-3" id="question__container">
				<div class="form-check">
					<input id="question__3-1" name="question__3" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__3-1">Verdadero</label>
				</div>
				<div class="form-check">
					<input id="question__3-2" name="question__3" type="radio" class="form-check-input" checked required>
					<label class="form-check-label" for="question__3-2">Falso</label>
				</div>
			</div>

			<hr class="my-4">

			<h4 class="mb-3">Si usas la extensión nativa MySQLi, se pueden utilizar transacciones sobre el motor de almacenamiento MyISAM, pero esto nunca es posible con la extensión PDO. ¿Verdadero o falso?</h4>

			<div class="my-3" id="question__container">
				<div class="form-check">
					<input id="question__4-1" name="question__4" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__4-1">Verdadero</label>
				</div>
				<div class="form-check">
					<input id="question__4-2" name="question__4" type="radio" class="form-check-input" checked required>
					<label class="form-check-label" for="question__4-2">Falso</label>
				</div>
			</div>

			<hr class="my-4">

			<h4 class="mb-3">Para configurar los niveles de error de los que debe notificar PHP, debes utilizar el parámetro _____ del fichero php.ini.</h4>

			<div class="my-3" id="question__container">
				<div class="form-check">
					<input id="question__5-1" name="question__5" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__5-1">display_errors</label>
				</div>
				<div class="form-check">
					<input id="question__5-2" name="question__5" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__5-2">error_notice</label>
				</div>
				<div class="form-check">
					<input id="question__5-3" name="question__5" type="radio" class="form-check-input" checked required>
					<label class="form-check-label" for="question__5-3">error_reporting</label>
				</div>
				<div class="form-check">
					<input id="question__5-4" name="question__5" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__5-4">show_errors</label>
				</div>
			</div>

			<hr class="my-4">

			<h4 class="mb-3">Al acabar una conexión mediante la extensión MySQLi, se debe ejecutar el método close para liberar los recursos que utiliza. ¿Verdadero o falso?</h4>

			<div class="my-3" id="question__container">
				<div class="form-check">
					<input id="question__6-1" name="question__6" type="radio" class="form-check-input" checked required>
					<label class="form-check-label" for="question__6-1">Verdadero</label>
				</div>
				<div class="form-check">
					<input id="question__6-2" name="question__6" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__6-2">Falso</label>
				</div>
			</div>

			<hr class="my-4">

			<h4 class="mb-3">¿Dónde se realiza la configuración de MySQLi?</h4>

			<div class="my-3" id="question__container">
				<div class="form-check">
					<input id="question__7-1" name="question__7" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__7-1">en el fichero httpd.conf</label>
				</div>
				<div class="form-check">
					<input id="question__7-2" name="question__7" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__7-2">en el fichero mysqli.conf</label>
				</div>
				<div class="form-check">
					<input id="question__7-3" name="question__7" type="radio" class="form-check-input" checked required>
					<label class="form-check-label" for="question__7-3">en el fichero php.ini</label>
				</div>
				<div class="form-check">
					<input id="question__7-4" name="question__7" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__7-4">en el fichero my.ini</label>
				</div>
			</div>

			<hr class="my-4">

			<h4 class="mb-3">Mediante la función set_error_handler es posible personalizar el comportamiento de PHP cuando se produce un error, sea cual sea su nivel. ¿Verdadero o falso?</h4>

			<div class="my-3" id="question__container">
				<div class="form-check">
					<input id="question__8-1" name="question__8" type="radio" class="form-check-input" checked required>
					<label class="form-check-label" for="question__8-1">Verdadero</label>
				</div>
				<div class="form-check">
					<input id="question__8-2" name="question__8" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__8-2">Falso</label>
				</div>
			</div>

			<hr class="my-4">

			<h4 class="mb-3">¿Cuál es el fichero de configuración de MySQL?</h4>

			<div class="my-3" id="question__container">
				<div class="form-check">
					<input id="question__9-1" name="question__9" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__9-2">se configura en el mismo fichero que Apache, httpd.conf</label>
				</div>
				<div class="form-check">
					<input id="question__9-2" name="question__9" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__9-2">se configura en el mismo fichero que PHP, php.ini</label>
				</div>
				<div class="form-check">
					<input id="question__9-3" name="question__9" type="radio" class="form-check-input" checked required>
					<label class="form-check-label" for="question__9-3">my.cnf</label>
				</div>
				<div class="form-check">
					<input id="question__9-4" name="question__9" type="radio" class="form-check-input" required>
					<label class="form-check-label" for="question__9-4">my.ini</label>
				</div>
			</div>

			<hr class="my-4">

			<h4 class="mb-3">Con la extensión MySQLi, para obtener un array a partir de un conjunto de resultados debes utilizar</h4>

			<div class="my-3" id="question__container">
				<div class="form-check">
					<input id="question__10-1" name="question__10" type="checkbox" class="form-check-input" checked required>
					<label class="form-check-label" for="question__10-1">el método fetch_assoc</label>
				</div>
				<div class="form-check">
					<input id="question__10-2" name="question__10" type="checkbox" class="form-check-input" checked required>
					<label class="form-check-label" for="question__10-2">el método fetch_array</label>
				</div>
				<div class="form-check">
					<input id="question__10-3" name="question__10" type="checkbox" class="form-check-input" required>
					<label class="form-check-label" for="question__10-3">el método fetch</label>
				</div>
				<div class="form-check">
					<input id="question__10-4" name="question__10" type="checkbox" class="form-check-input" checked required>
					<label class="form-check-label" for="question__10-4">el método fetch_row</label>
				</div>
			</div>

			<hr class="mt-4">

			<button class="w-100 btn btn-primary btn-lg mt-5" type="submit">Enviar</button>
	</div>
	</main>

	<?php include $relative . "/common/footer.html" ?>
	</div>

	<?php include $relative . "/common/modal-login.html" ?>
	<?php include $relative . "/common/modal-sign-up.html" ?>

	<?php include $relative . "/common/scripts.php" ?>
</body>

</html>