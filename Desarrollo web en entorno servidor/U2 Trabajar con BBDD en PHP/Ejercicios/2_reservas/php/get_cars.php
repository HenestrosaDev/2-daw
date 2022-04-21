<?php
$sql_get_cars = "SELECT * FROM car";
$sth_get_cars = $dbh->prepare($sql_get_cars);
$sth_get_cars->execute();
$cars = $sth_get_cars->fetchAll(PDO::FETCH_ASSOC);
?>