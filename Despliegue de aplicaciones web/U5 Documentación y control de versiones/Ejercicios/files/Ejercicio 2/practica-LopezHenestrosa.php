<?php
// Cambio

/**
 * Comprueba si el usuario actual es administrador o no
 *
 * @author José Carlos López Henestrosa <henestrosaconh@gmail.com>
 *
 * @version 1.0
 *
 * @internal Redirige a la página que se pasa por parámetro
 *
 * @param string $key Clave del array $_SESSION que contiene el valor de si es
 * admin
 * @param string $page Página a la que se le redirige al administrador
 *
 * @return boolean true si es admin o false si no es admin
 */

function check_admin($key, $page){
	session_status() === PHP_SESSION_ACTIVE ?: session_start();
	if (!isset($_SESSION) || $_SESSION[$key] !== 'A') {
		redirect($page);
		return true;
	}

	return false;
}  

/**
 * Establece una conexión con una base de datos (BBDD) MySQL
 *
 * @author José Carlos López Henestrosa <henestrosaconh@gmail.com>
 *
 * @version 1.1
 *
 * @internal Puede cambiarse "mysql" por "pgsql" si usamos una BBDD Postgres
 *
 * @param string $db_host Host de la BBDD
 * @param string $db_name Nombre de la BBDD
 * @param string $db_user Usuario de la BBDD
 * @param string $db_password Contraseña de la BBDD
 *
 * @return boolean True si se ha establecido correctamente o false si hay errores
 */

function connectDB($db_host, $db_name, $db_user, $db_password) {
	try {
		$dbh = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return true;
	} catch (PDOException $e) {
		echo "Connection failed: {$e->getMessage()}";
		return false;
	}
}
?>