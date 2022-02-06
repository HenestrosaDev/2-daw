<?php
$sql_get_ingredients = "SELECT * FROM ingredient";
$sth_get_ingredients = $dbh->prepare($sql_get_ingredients);
$sth_get_ingredients->execute();
$ingredients = $sth_get_ingredients->fetchAll(PDO::FETCH_ASSOC);