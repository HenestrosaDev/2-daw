<?php
// LOCAL
// $db_host = "localhost";
// $db_name = "dwes_tarea_02";
// $db_user = "root";
// $db_password = '';

// REMOTE
$db_host = "ec2-99-80-108-106.eu-west-1.compute.amazonaws.com";
$db_name = "d78bkgqqnt80g0";
$db_user = "ixnjbngydbtvfj";
$db_password = "98ced7b9076530523c3a84a48f26d799a0c6fdfec9e0cca8ae6c0f086af51942";


try {
	// $dbh = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
	$dbh = new PDO("pgsql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Connection failed: {$e->getMessage()}";
}
?>