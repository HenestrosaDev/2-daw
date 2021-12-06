<!doctype html>
<html lang="es">

<head>
	<title>Unidad 2 | Ejercicio 1: Test</title>
	<?php
	require_once("../php/get_relative.php");
	$relative = get_relative(__FILE__);
	$active = 2;
	include $relative . "/common/head.php";
	?>
	<link href="<?= $relative ?>/css/cars-container.css" rel="stylesheet">
</head>

<body class="bg-light">

	<?php include $relative . "/common/nav.php" ?>

	<div class="container pt-3">
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">Reserva de coches</h1>
				<p class="fs-5 text-muted">Realiza la reserva de uno de estos coches desde y hasta una fecha determinada.</p>
			</div>
		</header>

		<main>
			<div id="your-choice">
				<div class="row row-cols-1 row-cols-lg-3 g-4">
					<div class="col">
						<div class="card h-100">
							<img src="img/audi-quattro.jpg" class="card-img-top car__img" alt="Audio Quattro">
							<div class="card-body">
								<div>
									<span class="float-start">Audi Quattro</span>
									<span class="float-end">48 €/h</span>
								</div>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<img src="img/bmw-m3-e46.png" class="card-img-top car__img" alt="BMW M3 E64">
							<div class="card-body">
								<div>
									<span class="float-start">BMW M3 E64</span>
									<span class="float-end">48 €/h</span>
								</div>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<img src="img/ferrari-458-italia.jpg" class="card-img-top car__img" alt="Ferrari 458 Italia">
							<div class="card-body">
								<div>
									<span class="float-start">Ferrari 458 Italia</span>
									<span class="float-end">48 €/h</span>
								</div>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<img src="img/ferrari-testarossa.png" class="card-img-top car__img" alt="Ferrari Testarossa">
							<div class="card-body">
								<div>
									<span class="float-start">Ferrari Testarossa</span>
									<span class="float-end">48 €/h</span>
								</div>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<img src="img/mazda-mx5-nd.jpg" class="card-img-top car__img" alt="Mazda MX5 ND">
							<div class="card-body">
								<div>
									<span class="float-start">Mazda MX5 ND</span>
									<span class="float-end">48 €/h</span>
								</div>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<img src="img/nissan-gtr-r34.jpg" class="card-img-top car__img" alt="Nissan GT-R (R34)">
							<div class="card-body">
								<div>
									<span class="float-start">Nissan GT-R (R34)</span>
									<span class="float-end">48 €/h</span>
								</div>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<img src="img/porsche-911-carrera-4-1990.jpg" class="card-img-top car__img" alt="Porsche 911 Carrera 4 (1990)">
							<div class="card-body">
								<div>
									<span class="float-start">Porsche 911 Carrera 4 (1990)</span>
									<span class="float-end">48 €/h</span>
								</div>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<img src="img/tesla-model-3.jpg" class="card-img-top car__img" alt="Tesla Model 3">
							<div class="card-body">
								<div>
									<span class="float-start">Tesla Model 3</span>
									<span class="float-end">48 €/h</span>
								</div>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<img src="img/toyota-mr2.jpg" class="card-img-top car__img" alt="Toyota MR2 AW11">
							<div class="card-body">
								<div>
									<span class="float-start">Toyota MR2 AW11</span>
									<span class="float-end">48 €/h</span>
								</div>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<img src="img/mitsubishi-lancer-evolution-x.jpg" class="card-img-top car__img" alt="Mitsubishi Lancer Evolution X">
							<div class="card-body">
								<div>
									<span class="float-start">Mitsubishi Lancer Evolution X</span>
									<span class="float-end">48 €/h</span>
								</div>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<img src="img/subaru-impreza-wrx-sti-2003.jpg" class="card-img-top car__img" alt="Subaru Impreza WRX STI (2003)">
							<div class="card-body">
								<div>
									<span class="float-start">Subaru Impreza WRX STI (2003)</span>
									<span class="float-end">48 €/h</span>
								</div>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<img src="img/toyota-supra-mk3.png" class="card-img-top car__img" alt="Toyota Supra MK3">
							<div class="card-body">
								<div>
									<span class="float-start">Toyota Supra MK3</span>
									<span class="float-end">48 €/h</span>
								</div>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>

				</div>
			</div>
			<button class="w-100 btn btn-primary btn-lg mt-4" type="submit">Enviar</button>
		</main>
	</div>

	<?php include $relative . "/common/footer.html" ?>

	<?php include $relative . "/common/modal-login.html" ?>
	<?php include $relative . "/common/modal-sign-up.html" ?>

	<?php include $relative . "/common/scripts.php" ?>
</body>

</html>