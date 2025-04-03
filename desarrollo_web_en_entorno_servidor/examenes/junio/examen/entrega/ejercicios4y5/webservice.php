<?php

//Almacena en un array dos instancias de la clase libro con los datos siguientes:
// ID=1 Título="PHP and MySQL Web Development (Developer's Library)" Autor/a="Laura Thompson" Precio=46.65
// ID=2 Título="Cocina de Resistencia" Autor/a="Alberto Chicote" Precio=20.80


//En función de la petición POST O GET, se realiza una cosa u otra.

require_once("./Modelo/Libro.php");

$libros = array(
    new Libro(1, "PHP and MySQL Web Development (Developer's Library)", "Laura Thompson", 46.65),
    new Libro(2, "Cocina de Resistencia", "Alberto Chicote", 20.80)
);

// Si obtenemos un post
if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') { 
	// Comprobamos que los parámetros estén correctos
    if (!empty($_POST["id"]) && !empty($_POST["unidades"])) {
		// Parseamos las unidades a número entero
		$unidades = (int) $_POST["unidades"];

		// Comprobamos que es un número y que es mayor a 0
		if (is_int($unidades) && $unidades > 0) {
			// Iteramos por el array para buscar el libro
			foreach ($libros as $libro) {
				if ($libro->get_id() == $_POST["id"]) {
					// Al encontrrarlo, calculamos el total y lo enviamos
					$total = $libro->get_precio() * $unidades;
					$roundedTotal = number_format((float) $total, 2, '.', '');
					return print(json_encode(array('total' => $roundedTotal)));
				}
			}
		}
	}
// Si obtenemos un get
} elseif (strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') { 
	// Comprobamos que los parámetros estén correctos
	if (!empty($_GET["id"])) {
		// Iteramos por el array para buscar el libro
		foreach ($libros as $libro) {
			if ($libro->get_id() == $_GET["id"]) {
				// Al encontrarlo, estructuramos los datos en un array
				$libroADevolver = array(
					"titulo" => $libro->get_titulo(),
					"autor" => $libro->get_autor(),
					"precio" => $libro->get_precio(),
				);

				$formattedLibro = <<<EOD
				<ul>
					<li>Título: ${libroADevolver["titulo"]}</li>
					<li>Autor: ${libroADevolver["autor"]}</li>
					<li>Precio: ${libroADevolver["precio"]}</li>
				</ul>
				EOD;

				// Devolvemos un elemento HTML con los datos formateados
				return print($formattedLibro);

				// SI QUEREMOS DEVOLVER UN JSON EN VEZ DE UNA LISTA, HAY QUE DESCOMENTAR LA LÍNEA DE ABAJO
				//return print(json_encode($libroADevolver));
			}
		}
	}
}