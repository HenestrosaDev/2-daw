<?php
if (!empty($_POST["car_id_to_check"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
	require_once("../../php/connect_db.php");
	
	$sql_bookings = "SELECT * FROM booking WHERE car_id=?";
	$sth_bookings = $dbh->prepare($sql_bookings);
	$sth_bookings->execute(array($_POST["car_id_to_check"]));

	if ($sth_bookings->rowCount() <= 0) exit();

	while ($model_booking = $sth_bookings->fetch(PDO::FETCH_ASSOC)) {
		$unavailable_periods[] =
			new DatePeriod(
				new DateTime($model_booking["booked_from"]),
				new DateInterval('P1D'),
				new DateTime($model_booking["booked_to"]),
			);
	}

	print_r($unavailable_periods);
	
	foreach ($unavailable_periods as $period) {
		foreach ($period as $date) {
			$unavailable_dates[] = $date->format("Y-m-d");
		}
	}

	echo json_encode($unavailable_dates);
}
?>