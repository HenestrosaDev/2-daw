<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();

$relative = "..";
$active = 5;
$show_cart = true;

/*
 * Si el usuario no es admin, lo redirigimos
 * a la página de user.php
 */
if (!(!empty($_SESSION["app_user_id"])) || $_SESSION["user_role"] !== 'A') {
	header("Location: ./user.php");
	exit();
}

require_once("{$relative}/php/connect_db.php");
include "./php/get_commands.php";
include "./php/get_statistics.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 3 | Ejercicio 5: Pizzería (admin)</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/modal-logout.php" ?>

	<?php include "{$relative}/common/nav.php" ?>

	<div class="container pt-3">
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">Pedidos</h1>
			</div>
		</header>

		<?php if (count($commands) > 0) { ?>
			<main>
				<div class="mt-3">
					<h1 class="text-muted text-center">Pedidos por cliente</h1>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Id pedido</th>
								<th>Id cliente</th>
								<th>Nombre cliente</th>
								<th>Precio total</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($commands as $command) { ?>
								<tr>
									<td><?= implode("</td><td>", $command); ?></td>
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
								<th>Precio medio por pedido</th>
								<!--<th>Ingrediente más solicitado</th>
								<th>Ingrediente menos solicitado</th>-->
								<th>Especialidad más solicitada</th>
								<th>Especialidad más solicitada (veces)</th>
								<th>Especialidad menos solicitada</th>
								<th>Especialidad menos solicitada (veces)</th>
								<th>Pizzas personalizadas pedidas</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?= $avg_price[0] ?></td>
								<td><?= $top_type[0] ?></td>
								<td><?= $top_type[1] ?></td>
								<td><?= $bottom_type[0] ?></td>
								<td><?= $bottom_type[1] ?></td>
								<td><?= $custom_count[0] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</main>
		<?php } else { ?>
			<main>
				<h3 class="text-center text-muted">No hay ningún pedido realizado.</h3>
			</main>
		<?php } ?>

		<?php include "{$relative}/common/footer.html" ?>

		<?php include "{$relative}/common/scripts.php" ?>
</body>

</html>