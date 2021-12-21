<?php
$sql_get_user_bookings = "SELECT * FROM booking WHERE app_user_id = ?";
$sth_get_user_bookings = $dbh->prepare($sql_get_user_bookings);
$sth_get_user_bookings->execute(array($_SESSION["app_user_id"]));
$user_bookings = $sth_get_user_bookings->fetchAll(PDO::FETCH_ASSOC);
?>