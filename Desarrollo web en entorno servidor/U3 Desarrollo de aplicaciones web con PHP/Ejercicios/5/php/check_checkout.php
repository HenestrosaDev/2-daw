<?php
/** 
 * Comprueba si un array asociativo contiene un valor 
 * determinado.
 */
function array_contains($array, $key, $valueToFind) {
	return count(
		array_filter($array, function ($item) use ($key, $valueToFind) {
			return isset($item[$key]) && $valueToFind == $item[$key];
		})
	);
}

if (!empty($_POST["checkout"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
	$checkout = $_POST["checkout"];

	// HTTP code response 200 => OK
	$code = 200;
	$dough_price = 0;

	// Identificamos el tipo de masa de la que se trata.
	if (array_contains($checkout, "id", "medium-dought") > 0) {
		$dough_price = 3.95;
	} else if (array_contains($checkout, "id", "familiar-dought") > 0) {
		$dough_price = 4.95;
	} else {
		/*
		 * Si no encontramos masa familiar ni mediana, significa
		 * que el array ha sido manipulado, por lo que enviamos
		 * una respuesta negativa.
		 * 
		 * Este es el código que devolvemos a la petición POST.
		 * Generamos un código criptográfico aleatorio para que 
		 * el usuario no pueda adivinar cuál es la respuesta negativa
		 * del servidor. En caso de que pudiera adivinarla, podría 
		 * introducir pizzas sin masa, de 0€, etc. abusando de la 
		 * respuesta del servidor.
		 * 
		 * En este caso, generamos 20 bytes aleatorios, los cuales
		 * son convertidos a hexadecimal.
		 */
		$code = bin2hex(random_bytes(20));
		echo json_encode([$code, $dough_price]);
		return;
	}

	/* 
	 * Para calcular el de los ingredientes, como todos 
	 * valen lo mismo, contamos los elementos del array 
	 * (número de ingredientes) y le restamos uno (la masa). 
	 * A continuación, lo multiplicamos por el precio.
	 */
	$ingredients_price = (float) number_format(((count($checkout) - 1) * 0.80), 2);

	/*
	 * El precio final es el precio de la masa más el precio
	 * de los ingredientes, redondeando a 2 decimales.
	 */
	$price = (float) number_format($dough_price + $ingredients_price, 2);

	// Devolvemos el código de éxito junto al precio final de la pizza.
	echo json_encode([$code, $price]);	
}
