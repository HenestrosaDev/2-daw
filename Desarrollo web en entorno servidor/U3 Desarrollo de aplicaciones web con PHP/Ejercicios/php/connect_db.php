<?php
// LOCAL
// $db_host = "localhost";
// $db_name = "dwes_tarea_03";
// $db_user = "root";
// $db_password = '';

// REMOTE
$db_host = "ec2-176-34-105-15.eu-west-1.compute.amazonaws.com";
$db_name = "dac7ldrde3r4vd";
$db_user = "ajnfrxfaxywnno";
$db_password = "4c3f66a4806691cb14735270704b6bb33fa0d4f0a6d1a45d6f7142995af3f71d";

try {
	// $dbh = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
	$dbh = new PDO("pgsql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Connection failed: {$e->getMessage()}";
}