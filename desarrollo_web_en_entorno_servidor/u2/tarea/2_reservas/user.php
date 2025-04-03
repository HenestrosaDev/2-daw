<?php
require_once("../php/get_relative.php");
$relative = get_relative(__FILE__);
include "{$relative}/php/user_check.php";
$active = 2;

include "./php/get_cars.php";
include "./php/get_user_bookings.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 2 | Ejercicio 1: Reservas</title>
	<?php include "{$relative}/common/head.php"; ?>
	<!-- jQuery UI for Datepicker -->
	<script src="<?= $relative ?>/assets/js/jquery-ui-1.13.0.datepicker.min.js"></script>
	<link rel="stylesheet" href="<?= $relative ?>/assets/css/jquery-ui-1.13.0.datepicker.min.css">
</head>

<body class="bg-light">
	<?php include "{$relative}/common/modal-logout.php" ?>

	<!-- Modal booking -->
	<div 
		id="booking__modal" 
		class="modal fade" 
		tabindex="-1" 
		aria-labelledby="booking__title" 
		aria-hidden="true"
	>
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 
						id="booking__title"
						class="modal-title" 
					>
						Indica periodo de reserva
					</h5>
					<button 
						type="button" 
						class="btn-close" 
						data-bs-dismiss="modal" 
						aria-label="Close"
					></button>
				</div>

				<form 
					id="booking__form" 
					action="./php/insert_booking.php" 
					method="post"
				>
					<div class="modal-body">
						<div class="form-floating">
							<input 
								id="booking__from" 
								name="booking_from" 
								type="text" 
								class="form-control" 
								readonly 
								required
							>
							<label for="booking__from">Desde</label>
						</div>

						<div class="form-floating">
							<input 
								id="booking__to" 
								name="booking_to" 
								type="text" 
								class="form-control" 
								readonly 
								required
							>
							<label for="booking__to">Hasta</label>
						</div>

						<div id="form__hidden_input">
							<input 
								id="booking__car_id" 
								name="booking_car_id"
								type="hidden" 
							>
						</div>
					</div>

					<div class="modal-footer">
						<button 
							type="button" 
							class="btn btn-secondary" 
							data-bs-dismiss="modal"
						>
							Cancelar
						</button>
						<button 
							type="button" 
							id="booking__submit" 
							class="btn btn-primary"
						>
							Confirmar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php include "{$relative}/common/nav.php" ?>

	<div class="container pt-3">
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">Reservas de coches</h1>
				<p class="fs-5 text-muted">Realiza la reserva de uno de estos coches desde y hasta una fecha determinada.</p>
			</div>
		</header>

		<main>
			<div class="row row-cols-1 row-cols-lg-3 g-4">
				<?php foreach ($cars as $car) { ?>
					<div class="col">
						<div class="card h-100">
							<img 
								src="<?= $car["image_name"] ?>" 
								class="card-img-top car__img" 
								alt="<?= $car["model"] ?>"
							/>

							<div class="card-body">
								<div>
									<div class="float-start">
										<span 
											id="<?= $car["id"] ?>__model" 
											class="float-start"
										>
											<?= $car["model"] ?>
										</span>
									</div>

									<div class="float-end">
										<span id="<?= $car["id"] ?>__price">
											<?= $car["price"] ?>
										</span>
										<span>€/día</span>
									</div>
								</div>

								<div class="text-center mt-5">
									<?php
									foreach ($user_bookings as $user_booking) {
										if ($user_booking["car_id"] == $car["id"]) {
											$from_date = new DateTime($user_booking["booked_from"]);
											$to_date = new DateTime($user_booking["booked_to"]);
											$append_text = "desde el {$from_date->format('d-m-Y')} hasta el {$to_date->format('d-m-Y')}";

											if (!empty($title)) {
												$title .= ", {$append_text}";
											} else {
												$title = "Has realizado la reserva de este coche {$append_text}";
											}
										}
									}

									if (!empty($title)) {
									?>
										<a 
											id="<?= $car["id"] ?>__button" 
											href="#" 
											title="<?= $title ?>" 
											class="btn btn-success btn__order text-uppercase w-100" 
											data-bs-toggle="modal" 
											data-bs-target="#booking__modal"
										>
											Volver a reservar
										</a>
									<?php 
										unset($title);
									} else { 
									?>
										<a 
											id="<?= $car["id"] ?>__button" 
											href="#" 
											class="btn btn-primary btn__order text-uppercase w-100" 
											data-bs-toggle="modal" 
											data-bs-target="#booking__modal"
										>
											Reservar
										</a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</main>
	</div>

	<?php include "{$relative}/common/footer.html" ?>

	<?php include "{$relative}/common/scripts.php" ?>
	<script src="./js/script.js"></script>
</body>

</html>