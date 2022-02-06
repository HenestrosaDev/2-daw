<?php
$sql_get_pizza_types = "SELECT * FROM pizza_type";
$sth_get_pizza_types = $dbh->prepare($sql_get_pizza_types);
$sth_get_pizza_types->execute();
$pizza_types = $sth_get_pizza_types->fetchAll(PDO::FETCH_ASSOC);
