<?php
require_once("../php/get_relative.php");
$relative = get_relative(__FILE__);
$active = 1;

include "{$relative}/php/admin_check.php";

include "./php/get_all_attempts.php";
include "./php/get_statistic.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 2 | Ejercicio 1: Test (admin)</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/modal-logout.php" ?>

	<?php include "{$relative}/common/nav.php" ?>

	<div class="container pt-3">
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">Examen unidad 2</h1>
			</div>
		</header>

		<main>
			<?php if (count($attempts) > 0) { ?>
				<div class="mt-3" id="attempts">
					<h1 class="text-muted text-center">Intentos</h1>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Id quiz</th>
								<th>Id intento</th>
								<th>Id usuario</th>
								<th>Nombre usuario</th>
								<th>N° Intento</th>
								<th>Puntuación</th>
								<th>Respuestas</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($attempts as $attempt) {
								$sth_attempt_answers->execute(array($attempt["id"]));
								$attempt_answers = $sth_attempt_answers->fetchAll(PDO::FETCH_ASSOC);
							?>
								<tr>
									<td><?= $attempt["quiz_id"] ?></td>
									<td><?= $attempt["id"] ?></td>
									<td><?= $attempt["app_user_id"] ?></td>
									<td><?= $attempt["username"] ?></td>
									<td><?= $attempt["attempt_no"] ?></td>
									<td><?= $attempt["score"] ?></td>
									<td>
										<?php foreach ($attempt_answers as $attempt_answer) { ?>
											<?= "<strong>{$attempt_answer["question_id"]}</strong>: {$attempt_answer["question_answer_id"]} /" ?>
										<?php } ?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

				<div class="mt-5" id="global_statistic">
					<h1 class="text-muted text-center">Estadísticas generales</h1>
					<table class="table table-striped table-hover mt-2">
						<thead>
							<tr>
								<th>Intentos totales</th>
								<th>Nota media</th>
								<th>Moda</th>
								<th>Varianza</th>
								<th>Desviación típica</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?= count($attempts) ?></td>
								<?php foreach ($quiz_statistic as $row) { ?>
									<td><?= implode("</td><td>", $row); ?></td>
								<?php } ?>
							</tr>
						</tbody>
					</table>
				</div>
			<?php } else { ?>
				<h3 class="text-center text-muted">No hay ningún intento realizado.</h3>
			<?php } ?>
		</main>

		<?php include "{$relative}/common/footer.html" ?>

		<?php include "{$relative}/common/scripts.php" ?>
	</div>
</body>

</html>