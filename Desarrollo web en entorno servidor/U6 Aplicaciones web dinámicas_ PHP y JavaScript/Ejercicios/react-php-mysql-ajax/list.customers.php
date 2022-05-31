<?php
header('Content-type: application/json; charset=utf-8');

require_once 'dbconnect/rb-database.class.php';

$objDB = new DataBase;

$result = $objDB->Execute('SELECT * FROM customers');

$customers = $result->fetch_all(MYSQLI_ASSOC);

die('{"items":'.json_encode($customers).'}');
