<?php
// LOCAL
$db_host = "localhost";
$db_name = "dwes_tarea_03";
$db_user = "root";
$db_password = '';

try {
	$dbh = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8mb4;", $db_user, $db_password);
	// $dbh = new PDO("pgsql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Connection failed: {$e->getMessage()}";
}