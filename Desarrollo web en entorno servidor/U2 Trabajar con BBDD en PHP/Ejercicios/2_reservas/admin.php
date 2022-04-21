<?php
require_once("../php/get_relative.php");
$relative = get_relative(__FILE__);
$active = 2;

include "{$relative}/php/admin_check.php";

include "./php/get_all_bookings.php";
include "./php/get_user_statistics.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 2 | Ejercicio 1: Reservas (admin)</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/modal-logout.php" ?>

	<?php include "{$relative}/common/nav.php" ?>

	<div class="container pt-3">
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">Reservas de coches</h1>
			</div>
		</header>

		<?php if (count($bookings) > 0) { ?>
			<main>
				<div class="mt-3">
					<h1 class="text-muted text-center">Reservas</h1>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Id reserva</th>
								<th>Id cliente</th>
								<th>Nombre cliente</th>
								<th>Id coche</th>
								<th>Modelo</th>
								<th>Precio</th>
								<th>Desde</th>
								<th>Hasta</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($bookings as $booking) { ?>
								<tr>
									<td><?= implode("</td><td>", $booking); ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

				<div class="mt-5">
					<h1 class="text-muted text-center">Estadísticas</h1>
					<table class="table table-striped table-hover mt-2">
						<thead>
							<tr>
								<th>Id cliente</th>
								<th>Nombre cliente</th>
								<th>N° reservas</th>
								<th>N° días reservados</th>
								<th>Veces y coche que más ha reservado</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($users_for_statistic as $user_for_statistic) {
								$sth_most_reserved_car->execute(array($user_for_statistic["app_user_id"]));
								$most_reserved_car = $sth_most_reserved_car->fetch(PDO::FETCH_ASSOC);

								$sth_periods->execute(array($user_for_statistic["app_user_id"]));
								$periods = $sth_periods->fetchAll(PDO::FETCH_ASSOC);
								$days = 0;
								foreach ($periods as $period) {
									$from = new DateTime($period["booked_from"]);
									$to = new DateTime($period["booked_to"]);
									$days += (int) $from->diff($to)->format("%a");
								}
							?>
								<tr>
									<td><?= $user_for_statistic["app_user_id"] ?></td>
									<td><?= $user_for_statistic["username"] ?></td>
									<td><?= $user_for_statistic["bookings_no"] ?></td>
									<td><?= $days ?></td>
									<td><?= "{$most_reserved_car["occurence"]} / {$most_reserved_car["model"]}" ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</main>
		<?php } else { ?>
			<main>
				<h3 class="text-center text-muted">No hay ninguna reserva realizada.</h3>
			</main>
		<?php } ?>

		<?php include "{$relative}/common/footer.html" ?>

		<?php include "{$relative}/common/scripts.php" ?>
</body>

</html>