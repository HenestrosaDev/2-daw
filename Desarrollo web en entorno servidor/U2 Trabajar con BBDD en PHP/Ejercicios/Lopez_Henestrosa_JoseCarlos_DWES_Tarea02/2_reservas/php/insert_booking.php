<?php
if (
	(!empty($_POST["booking_from"]) && !empty($_POST["booking_to"]) && !empty($_POST["booking_car_id"]))
	&& $_SERVER["REQUEST_METHOD"] == "POST"
	) {
	$relative = "../..";
	session_status() === PHP_SESSION_ACTIVE ?: session_start();
	require_once("{$relative}/php/connect_db.php");
	
	if (!isset($_SESSION["app_user_id"])) {
		require_once("{$relative}/php/close_session.php");
		close_session();
	}

	require_once("{$relative}/php/filter.php");

	$carId = filter($_POST["booking_car_id"]);
	$booked_from =
		DateTime::createFromFormat("Y-m-d", $_POST["booking_from"])
		->settime(0, 0);
	$booked_to =
		DateTime::createFromFormat("Y-m-d", $_POST["booking_to"])
		->settime(0, 0);

	$date_now = date("Y-m-d");
	$is_from_valid =
		$booked_from !== false && !array_sum($booked_from::getLastErrors()) && $date_now < $booked_from;
	$is_to_valid =
		$booked_to !== false && !array_sum($booked_to::getLastErrors()) && $date_now < $booked_to;

	if ($is_from_valid && $is_to_valid && $carId) {
		$booked_from_formatted = $booked_from->format('Y-m-d H:i:s');
		$booked_to_formatted = $booked_to->format('Y-m-d H:i:s');

		$sql_car_exists = "SELECT 1 FROM car WHERE id = ?";
		$sth_car_exists = $dbh->prepare($sql_car_exists);
		$sth_car_exists->execute(array($carId));

		if ($sth_car_exists->rowCount() > 0) {
			$sql_insert_booking = "INSERT INTO booking (app_user_id, car_id, booked_from, booked_to) VALUES (?, ?, ?, ?)";
			$sth_insert_booking = $dbh->prepare($sql_insert_booking);
			$sth_insert_booking->execute(array($_SESSION["app_user_id"], $carId, $booked_from_formatted, $booked_to_formatted));
		} else {
			$errors = "Hay campos erróneos en el formulario.";	
		}
	} else {
		$errors = "Hay campos erróneos en el formulario.";
	}

	header("Location: ../user.php");
}
?>