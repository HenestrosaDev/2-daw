<?php
$sql_user_for_statistic = "
SELECT b.app_user_id, u.username, COUNT(app_user_id) AS bookings_no
FROM booking AS b 
INNER JOIN app_user AS u 
	ON b.app_user_id = u.id
GROUP BY b.app_user_id, u.username";
$sth_user_for_statistic = $dbh->prepare($sql_user_for_statistic);
$sth_user_for_statistic->execute();
$users_for_statistic = $sth_user_for_statistic->fetchAll(PDO::FETCH_ASSOC);

$sql_most_reserved_car = "
SELECT b.app_user_id, c.model, COUNT(b.car_id) AS occurence 
FROM booking AS b 
INNER JOIN car AS c
	ON b.car_id = c.id 
WHERE b.app_user_id = ? 
GROUP BY b.app_user_id, c.model
ORDER BY occurence DESC 
LIMIT 1";
$sth_most_reserved_car = $dbh->prepare($sql_most_reserved_car);

$sql_periods = "
SELECT booked_from, booked_to
FROM booking
WHERE app_user_id = ?";
$sth_periods = $dbh->prepare($sql_periods);
?>