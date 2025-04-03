<?php
$sql_get_price_avg = "SELECT ROUND(AVG(price)::numeric, 2) FROM command";
// $sql_get_price_avg = "SELECT FORMAT(AVG(price), 2) FROM command";
$sth_get_price_avg = $dbh->prepare($sql_get_price_avg);
$sth_get_price_avg->execute();
$avg_price = $sth_get_price_avg->fetch();

$sql_get_top_type = "
SELECT p.name_for_client, COUNT(p.name_for_client)
FROM command_line AS c
INNER JOIN pizza_type AS p
	ON c.pizza_type_id = p.id
GROUP BY p.name_for_client 
ORDER BY COUNT(*) DESC LIMIT 1";
$sth_get_top_type = $dbh->prepare($sql_get_top_type);
$sth_get_top_type->execute();
$top_type = $sth_get_top_type->fetch();

$sql_get_bottom_type = "
SELECT p.name_for_client, COUNT(p.name_for_client)
FROM command_line AS c
INNER JOIN pizza_type AS p
	ON c.pizza_type_id = p.id
GROUP BY p.name_for_client 
ORDER BY COUNT(*) ASC LIMIT 1";
$sth_get_bottom_type = $dbh->prepare($sql_get_bottom_type);
$sth_get_bottom_type->execute();
$bottom_type = $sth_get_bottom_type->fetch();

$sql_get_custom_count = "SELECT COUNT(*) FROM command_line WHERE pizza_type_id=0";
$sth_get_custom_count = $dbh->prepare($sql_get_custom_count);
$sth_get_custom_count->execute();
$custom_count = $sth_get_custom_count->fetch();