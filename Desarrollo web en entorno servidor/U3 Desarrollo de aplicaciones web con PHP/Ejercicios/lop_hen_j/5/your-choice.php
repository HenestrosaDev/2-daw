<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();

$relative = "..";
$active = 5;
$show_cart = true;

if (!(!empty($_SESSION["app_user_id"]))) {
	/*
	 * Ruta a la que redirigir en caso de que 
	 * el usuario inicie sesión correctamente
	 */
	$_SESSION["redirect_from_php"] = "../5/your-choice.php";
	/*
	 * Ruta a la que redirigir en caso de que 
	 * el usuario haya iniciado sesión previamente
	 */
	$_SESSION["redirect_from_join"] = "./5/your-choice.php";
	header("Location: {$relative}/join.php");
	exit();
}

require_once("{$relative}/php/connect_db.php");
include "./php/get_ingredients.php";
/**
 * $counter es usado para saber cuándo tenemos que añadir un
 * div con la clase .card-group, lo cual ocurre cuando el
 * $counter es divisible entre 3.
 */
$counter = 0;
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 3 | Ejercicio 5: Elige ingredientes</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/nav.php" ?>

	<div class="container pt-3">
		<header>
			<div class="p-3 pb-md-3 mx-auto text-center">
				<h1 class="mb-3">Selecciona los ingredientes que quieres añadir</h1>
				<p class="fs-5 text-muted mb-1">El precio de la masa mediana son 3.95€ (30 cm de diámetro) y 4.95€ la familiar (42 cm de diámetro).</p>
				<p class="fs-5 text-muted">Cada ingrediente extra cuesta 0.80€.</p>
			</div>
		</header>

		<main class="row g-5">
			<section id="checkout" class="col-md-5 col-lg-4 order-md-last">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-primary">Ingredientes</span>
					<span id="checkout__badge" class="badge bg-primary rounded-pill">1</span>
				</h4>
				<ul class="list-group mb-3">
					<li id="checkout__dought" class="list-group-item d-flex justify-content-between lh-sm checkout__item">
						<div>
							<h6 id="dought__type" class="my-0">Masa mediana</h6>
							<small id="dought__price" class="text-muted">3.95</small>
						</div>
						<a id="dought__toggle" href="#" class="link-primary">Prefiero familiar</a>
					</li>
					<li class="list-group-item bg-light">
						<strong class="float-start">Total</strong>
						<span class="float-end">
							<strong id="checkout__total">3.95</strong>
							<strong>€</strong>
						</span>
					</li>
				</ul>

				<form class="card">
					<button id="checkout__submit" type="button" class="btn btn-success">Añadir al carro</button>
				</form>
			</section>

			<section id="ingredients" class="col-md-7 col-lg-8">
				<div class="card-group">

					<?php foreach ($ingredients as $ingredient) { ?>
						<div id="<?= $ingredient["id"] ?>__card" class="card" title="Haz click para introducir los kgs" aria-label="Haz click para introducir los kgs" tabindex="0" data-bs-toggle="modal" data-bs-target="#buy__modal" role="button">
							<img src="<?= $ingredient["image_path"] ?>" class="card-img-top edible-image--sm p-4" alt="<?= $ingredient["name_for_client"] ?>">
							<div class="card-body">
								<h5 class="card-title">
									<span id="<?= $ingredient["id"] ?>__name" class="float-start"><?= $ingredient["name_for_client"] ?></span>
								</h5>
							</div>
						</div>
						<?php if (++$counter % 3 === 0) { ?>
				</div>
				<?php if ($counter !== count($ingredients)) { ?>
					<!-- Determinamos si es el último elemento para abrir una nueva etiqueta o no -->
					<div class="card-group">
					<?php } ?>
				<?php } ?>
			<?php } ?>

			</section>
		</main>
		<?php include "{$relative}/common/footer.html" ?>
	</div>


	<?php include "{$relative}/common/scripts.php" ?>
	<script src="<?= $relative ?>/assets/js/jquery.cookie-1.4.1.js"></script>
	<script type="module" src="./js/your-choice.js"></script>
</body>

</html>