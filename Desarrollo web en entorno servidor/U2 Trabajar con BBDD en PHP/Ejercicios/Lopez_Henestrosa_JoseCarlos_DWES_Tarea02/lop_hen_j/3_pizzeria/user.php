<!doctype html>
<html lang="es">

<head>
	<title>Unidad 2 | Ejercicio 1: Test</title>
	<?php
	require_once("../php/get_relative.php");
	$relative = get_relative(__FILE__);
	$active = 3;
	$showCart = true;
	include $relative . "/common/head.php";
	?>
	<link href="<?= $relative ?>/css/pizza-ingredients.css" rel="stylesheet">
</head>

<body class="bg-light">

	<?php include $relative . "/common/nav.php" ?>

	<div class="container pt-3">
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">Realiza tu pedido</h1>
				<p class="fs-5 text-muted">Puedes elegir entre una de nuestras especialidades o elegir la pizza al gusto con nuestros ingredientes.</p>
			</div>
		</header>

		<main>
			<div id="your-choice" class="mb-5">
				<h1 class="text-muted">A tu gusto</h1>
				<div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
					<div class="col">
						<div class="card">
							<img src="./img/specialities/your-choice.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">A tu gusto</h5>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Preparar</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="specialities" class="pt-3">
				<h3 class="text-muted">Especialidades</h3>
				<div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
					<div class="col">
						<div class="card">
							<img src="./img/specialities/bbq.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Barbacoa</h5>
								<a href="" class="card-text text-muted" data-bs-toggle="modal" data-bs-target="#pizza__modal">Ver ingredientes</a>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Pedir</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card">
							<img src="./img/specialities/from-orchard.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">De la Huerta</h5>
								<a href="" class="card-text text-muted">Ver ingredientes</a>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Pedir</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card">
							<img src="./img/specialities/carbonara.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Carbonara</h5>
								<a href="" class="card-text text-muted">Ver ingredientes</a>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Pedir</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card">
							<img src="./img/specialities/hawaiian.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Hawaiana</h5>
								<a href="" class="card-text text-muted">Ver ingredientes</a>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Pedir</a>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card">
							<img src="./img/specialities/pepperoni.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Pepperoni</h5>
								<a href="" class="card-text text-muted">Ver ingredientes</a>
								<a href="#" class="btn btn-primary btn__order float-end text-uppercase mt-4">Pedir</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>

	<?php include $relative . "/common/footer.html" ?>

	<?php include $relative . "/common/modal-login.html" ?>
	<?php include $relative . "/common/modal-sign-up.html" ?>
	<?php include "./modal-ingredients.html" ?>

	<?php include $relative . "/common/scripts.php" ?>
	<script src="<?= $relative ?>/js/buttons.js"></script>
</body>

</html>