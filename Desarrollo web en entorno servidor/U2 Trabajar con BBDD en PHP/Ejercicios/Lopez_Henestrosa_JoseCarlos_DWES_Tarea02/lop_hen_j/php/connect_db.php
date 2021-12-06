<?php
$host = 'localhost';
$dbname = 'tarea02';
$username = '';
$password = '';

$database_handler = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
?>