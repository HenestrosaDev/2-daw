<?php
$relative = "..";
$active = 2;
$show_cart = true;
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 3 | Ejercicio 2: Cesta</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/nav.php" ?>

	<?php include "./modal-quantity.html" ?>

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
						<img src="./img/mushroom.png" class="card-img-top edible-image--sm p-4" alt="Champiñones">
						<div class="card-body">
							<h5 class="card-title">
								<span id="mushroom__name" class="float-start">Champiñones</span>
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
		<?php include "{$relative}/common/footer.html" ?>
	</div>


	<?php include "{$relative}/common/scripts.php" ?>
	<script type="module" src="./js/script.js"></script>
</body>

</html>