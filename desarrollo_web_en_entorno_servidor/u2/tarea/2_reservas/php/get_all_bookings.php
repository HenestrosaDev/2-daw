<?php
$sql_get_all_bookings = "
SELECT b.id, app_user_id, u.username, b.car_id, c.model, c.price, b.booked_from, b.booked_to 
FROM booking AS b 
INNER JOIN app_user AS u
	ON b.app_user_id = u.id 
INNER JOIN car AS c
	ON b.car_id = c.id";
$sth_get_all_bookings = $dbh->prepare($sql_get_all_bookings);
$sth_get_all_bookings->execute();
$bookings = $sth_get_all_bookings->fetchAll(PDO::FETCH_ASSOC);
?>