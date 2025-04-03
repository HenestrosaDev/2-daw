<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();

$relative = "..";
$active = 5;
$show_cart = true;

/*
 * Las variables "redirect_from_..." se usan
 * para saber a dónde redireccionar al usuario
 * en caso de que se registre/inicie sesión 
 * correctamente, puesto que join.php se usa
 * tanto en el archivo 4.php como en 5.php
 */
if (!(!empty($_SESSION["app_user_id"]))) {
	/*
	 * Ruta a la que redirigir en caso de que 
	 * el usuario inicie sesión correctamente.
	 * Se redirige desde common/modal-login.php
	 */
	$_SESSION["redirect_from_php"] = "../5/admin.php";
	/*
	 * Ruta a la que redirigir en caso de que 
	 * el usuario haya iniciado sesión previamente.
	 * Se redirige desde join.php, situado en la raíz.
	 */
	$_SESSION["redirect_from_join"] = "./5/admin.php";
	header("Location: {$relative}/join.php");
	exit();
}

require_once("{$relative}/php/connect_db.php");
include "./php/get_pizza_types.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 3 | Ejercicio 5: Pizzería</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/modal-logout.php" ?>
	<?php include "./modal-dought.html" ?>

	<?php include "{$relative}/common/nav.php" ?>

	<div class="container pt-3">
		<header>
		<div class="p-3 pb-md-4 mx-auto text-center">
			<h1 class="display-4 fw-normal">Realiza tu pedido</h1>
			<p class="fs-5 text-muted">
				Puedes elegir entre una de nuestras especialidades o elegir la pizza al
				gusto con nuestros ingredientes.
			</p>
		</div>
	</header>

	<main>
		<section
			id="your-choice"
			class="mb-5"
		>
			<h1 class="text-muted">A tu gusto</h1>

			<div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
				<div class="col">
					<div class="card">
						<img
							src="./img/specialities/your-choice.jpg"
							class="card-img-top"
							alt="A tu gusto"
						/>

						<div class="card-body">
							<h5 class="card-title">A tu gusto</h5>
							<p class="card-text text-muted">
								Combina los ingredientes a tu gusto con la masa que te apetezca.
							</p>
							<a
								href="./your-choice.php"
								class="btn btn-danger btn__order float-end text-uppercase"
							>
								Preparar
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section
			id="specialities"
			class="pt-3"
		>
				<h1 class="text-muted">Especialidades</h1>
				
				<div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
					<?php foreach ($pizza_types as $pizza_type) { ?>
						<div class="col">
							<div class="card">
								<img 
									src="<?= $pizza_type["image_path"] ?>" 
									class="card-img-top" 
									alt="<?= $pizza_type["name_for_client"] ?>"
								>

								<div class="card-body">
									<h5 
										id="<?= $pizza_type["id"] ?>__name" 
										class="card-title"
									>
										<?= $pizza_type["name_for_client"] ?>
									</h5>
									
									<p class="card-text text-muted">
										<?= $pizza_type["ingredients"] ?>
									</p>

									<input 
										id="<?= $pizza_type["id"] ?>__price" 
										value="<?= $pizza_type["price"] ?>"
										type="hidden" 
										class="d-none" 
									>
									
									<a 
										id="<?= $pizza_type["id"] ?>__order" 
										type="button" 
										data-bs-toggle="modal" 
										data-bs-target="#dought__modal" 
										class="btn btn-danger btn__order float-end text-uppercase"
									>
										Pedir
									</a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</section>
		</main>
	</div>

	<?php include "{$relative}/common/footer.html" ?>

	<?php include "{$relative}/common/scripts.php" ?>
	<script src="<?= $relative ?>/assets/js/jquery.cookie-1.4.1.js"></script>
	<script type="module" src="./js/user.js"></script>
</body>

</html>