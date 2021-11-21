<?php
function get_relative($path) {
	// Si el nombre del archivo contiene una letra, es debido a que está contenido dentro de una carpeta con la letra correspondiente al apartado del ejercicio
	if (preg_match('/[a-zA-Z]/', basename($path, '.php'))) {
		// Por ejemplo, en los casos 4/a/4a.php
		return "../..";
	} else {
		// Por ejemplo, en los casos 1/1.php
		return "..";
	}
}
?>