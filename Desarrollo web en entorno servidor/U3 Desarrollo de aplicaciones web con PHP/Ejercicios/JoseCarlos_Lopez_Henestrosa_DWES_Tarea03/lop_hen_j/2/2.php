<?php
require_once("../php/get_relative.php");
$relative = get_relative(__FILE__);
$active = 2;
$showCart = true;
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 3 | Ejercicio 2: Cesta</title>
	<?php include "{$relative}/common/head.php"; ?>
	<link href="./css/styles.css" rel="stylesheet">
</head>

<body class="bg-light">
	<?php include "{$relative}/common/nav.php" ?>

	<!-- Modal quantity -->
	<div class="modal fade" id="buy__modal" tabindex="-1" aria-labelledby="buy__title" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="buy__title">¿Cuántos kilos ponemos?</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="input-group justify-content-center">
						<button type="button" class="btn btn-danger btn--number" disabled data-type="minus" data-field="quantity[1]">
							<span class="bi-dash"></span>
						</button>
						<input id="edible__kg" type="text" step=".1" name="quantity[1]" aria-label="Cantidad de kilogramos" class="form-control text-center" placeholder="Introduce kgs" min="0" max="99">
						<button type="button" class="btn btn-success btn--number" data-type="plus" data-field="quantity[1]">
							<span class="bi-plus"></span>
						</button>
						<input type="hidden" id="edible__name--client" name="edible_name--client">
						<input type="hidden" id="edible__name--internal" name="edible_name--internal">
						<input type="hidden" id="edible__price" name="edible_price">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary flex--buttons" data-bs-dismiss="modal">Cancelar</button>
					<button id="edible__add" type="submit" name="edible_add" value="edible_add" class="btn btn-primary flex--buttons">Añadir a la cesta</button>
				</div>
			</div>
		</div>
	</div>

	<div class="container pt-3" style="max-width: 960px;">
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">Uso de cookies</h1>
			</div>
		</header>

		<main>
			<section id="cart">
				<header>
					<h3 class="text-center mb-3">Añade frutas y verduras a la cesta</h3>
				</header>

				<div class="card-group">
					<div id="banana__card" class="card" title="Haz click para introducir los kgs" aria-label="Haz click para introducir los kgs" tabindex="0" data-bs-toggle="modal" data-bs-target="#buy__modal" role="button">
						<img src="./img/banana.png" class="card-img-top edible-image--sm p-4" alt="Banana">
						<div class="card-body">
							<h5 class="card-title">
								<span id="banana__name" class="float-start">Banana</span>
								<span class="float-end">
									<span id="banana__price">2.25</span>€/kg
								</span>
							</h5>
						</div>
					</div>
					<div id="apple__card" class="card" title="Haz click para introducir los kgs" aria-label="Haz click para introducir los kgs" tabindex="0" data-bs-toggle="modal" data-bs-target="#buy__modal" role="button">
						<img src="./img/apple.png" class="card-img-top edible-image--sm p-4" alt="Apple">
						<div class="card-body">
							<h5 class="card-title">
								<span id="apple__name" class="float-start">Manzana</span>
								<span class="float-end">
									<span id="apple__price">1.69</span>€/kg
								</span>
							</h5>
						</div>
					</div>
					<div id="tomato__card" class="card" title="Haz click para introducir los kgs" aria-label="Haz click para introducir los kgs" tabindex="0" data-bs-toggle="modal" data-bs-target="#buy__modal" role="button">
						<img src="./img/tomato.png" class="card-img-top edible-image--sm p-4" alt="...">
						<div class="card-body">
							<h5 class="card-title">
								<span id="tomato__name" class="float-start">Tomate</span>
								<span class="float-end">
									<span id="tomato__price">1.40</span>€/kg
								</span>
							</h5>
						</div>
					</div>
				</div>

				<div class="card-group">
					<div id="onion__card" class="card" title="Haz click para introducir los kgs" aria-label="Haz click para introducir los kgs" tabindex="0" data-bs-toggle="modal" data-bs-target="#buy__modal" role="button">
						<img src="./img/onion.png" class="card-img-top edible-image--sm p-4" alt="Banana">
						<div class="card-body">
							<h5 class="card-title">
								<span id="onion__name" class="float-start">Cebolla</span>
								<span class="float-end">
									<span id="onion__price">0.80</span>€/kg
								</span>
							</h5>
						</div>
					</div>
					<div id="carrots__card" class="card" title="Haz click para introducir los kgs" aria-label="Haz click para introducir los kgs" tabindex="0" data-bs-toggle="modal" data-bs-target="#buy__modal" role="button">
						<img src="./img/carrots.png" class="card-img-top edible-image--sm p-4" alt="Zanahoria">
						<div class="card-body">
							<h5 class="card-title">
								<span id="carrot__name" class="float-start">Zanahoria</span>
								<span class="float-end">
									<span id="carrots__price">0.55</span>€/kg
								</span>
							</h5>
						</div>
					</div>
					<div id="mushroom__card" class="card" title="Haz click para introducir los kgs" aria-label="Haz click para introducir los kgs" tabindex="0" data-bs-toggle="modal" data-bs-target="#buy__modal" role="button">
						<img src="./img/mushroom.png" class="card-img-top edible-image--sm p-4" alt="Setas">
						<div class="card-body">
							<h5 class="card-title">
								<span id="mushroom__name" class="float-start">Setas</span>
								<span class="float-end">
									<span id="mushroom__price">4.90</span>€/kg
								</span>
							</h5>
						</div>
					</div>
				</div>

				<div class="card-group">
					<div id="tangerine__card" class="card" title="Haz click para introducir los kgs" aria-label="Haz click para introducir los kgs" tabindex="0" data-bs-toggle="modal" data-bs-target="#buy__modal" role="button">
						<img src="./img/tangerine.png" class="card-img-top edible-image--sm p-4" alt="Mandarina">
						<div class="card-body">
							<h5 class="card-title">
								<span id="tangerine__name" class="float-start">Mandarina</span>
								<span class="float-end">
									<span id="tangerine__price">1.95</span>€/kg
								</span>
							</h5>
						</div>
					</div>
					<div id="lettuce__card" class="card" title="Haz click para introducir los kgs" aria-label="Haz click para introducir los kgs" tabindex="0" data-bs-toggle="modal" data-bs-target="#buy__modal" role="button">
						<img src="./img/lettuce.png" class="card-img-top edible-image--sm p-4" alt="Lechuga">
						<div class="card-body">
							<h5 class="card-title">
								<span id="lettuce__name" class="float-start">Lechuga</span>
								<span class="float-end">
									<span id="lettuce__price">1.30</span>€/kg
								</span>
							</h5>
						</div>
					</div>
					<div id="avocado__card" class="card" title="Haz click para introducir los kgs" aria-label="Haz click para introducir los kgs" tabindex="0" data-bs-toggle="modal" data-bs-target="#buy__modal" role="button">
						<img src="./img/avocado.png" class="card-img-top edible-image--sm p-4" alt="Aguacate">
						<div class="card-body">
							<h5 class="card-title">
								<span id="avocado__name" class="float-start">Aguacate</span>
								<span class="float-end">
									<span id="avocado__price">3.85</span>€/kg
								</span>
							</h5>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>

	<?php include "{$relative}/common/footer.html" ?>

	<?php include "{$relative}/common/scripts.php" ?>
	<script type="module" src="./js/script.js"></script>
</body>

</html>