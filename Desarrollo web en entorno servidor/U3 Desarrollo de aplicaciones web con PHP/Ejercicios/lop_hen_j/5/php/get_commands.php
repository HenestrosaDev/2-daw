<?php
$sql_get_commands = "
SELECT c.id, c.app_user_id, u.username, c.price 
FROM command AS c
INNER JOIN app_user AS u
	ON c.app_user_id = u.id";
$sth_get_commands = $dbh->prepare($sql_get_commands);
$sth_get_commands->execute();
$commands = $sth_get_commands->fetchAll(PDO::FETCH_ASSOC);
