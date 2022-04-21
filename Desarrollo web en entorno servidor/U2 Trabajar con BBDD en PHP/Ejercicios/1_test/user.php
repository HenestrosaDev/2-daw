<?php
require_once("../php/get_relative.php");
$relative = get_relative(__FILE__);
include "{$relative}/php/user_check.php";
$active = 1;

include "./php/get_user_attempts.php";
include "./php/setup_quiz.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 2 | Ejercicio 1: Test</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/modal-logout.php" ?>

	<?php include "{$relative}/common/nav.php" ?>

	<div class="container pt-3" style="max-width: 960px;">
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal"><?= $quiz["title"] ?></h1>
				<p class="fs-5 text-muted">Has realizado el examen <?= $_SESSION["attempt_no"] ?> <?= ($_SESSION["attempt_no"] == 1 ? "vez" : "veces") ?>. Recuerda que solo dispones de 3 intentos.</p>
				<?php if ($_SESSION["attempt_no"] == 3) { ?>
					<div class="alert alert-danger text-center mt-4" role="alert">
						Has llegado al número máximo de intentos, no puedes enviar más tests.
					</div>
				<?php } ?>
			</div>
		</header>

		<?php if ($_SESSION["attempt_no"] < 3) { ?>
			<main>
				<form method="post" action="./php/test_submit.php">
					<?php foreach ($questions as $question) { ?>
						<div class="my-3 question__container">
							<header>
								<h4 id="question__title--<?= $question["id"] ?>" class="mb-3"><?= $question["content"] ?></h4>
							</header>
							<?php
							$i = 1;
							foreach ($question_answers as $question_answer) {
								if ($question_answer["question_id"] === $question["id"]) { ?>
									<div class="form-check">
										<input id="question_answer--<?= $question["id"] ?>-<?= $question_answer["id"] ?>" name="answer_for_question_<?= $question["id"] ?>" value="<?= $question_answer["id"] ?>" type="<?= ($question["kind"] === 'R' ? "radio" : "checkbox") ?>" class="form-check-input" <?= ($question["kind"] === 'R' ? "required" : '') ?>>
										<label class="form-check-label" for="question_answer--<?= $question["id"] ?>-<?= $question_answer["id"] ?>"><?= $question_answer["content"] ?></label>
									</div>
							<?php
								}
							} ?>
						</div>
					<?php } ?>

					<button name="test_submit" value="test_submit" class="w-100 btn btn-primary btn-lg mt-3" type="submit">Enviar</button>
					<!--
					<div class="my-3 question__container">
						<header>
							<h4 class="mb-3">Si al utilizar PDO, intentas comenzar una transacción con un motor de almacenamiento que no las soporta, obtendrás un error. ¿Verdadero o falso?</h4>
						</header>
						<div class="form-check">
							<input id="question__1-1" name="question_1" value="1" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__1-1">Verdadero</label>
						</div>
						<div class="form-check">
							<input id="question__1-2" name="question_1" value="2" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__1-2">Falso</label>
						</div>
					</div>

					<div class="my-3 question__container">
						<header>
							<h4 class="mb-3">Con la extensión PDO, para obtener un array a partir de un conjunto de resultados debes utilizar:</h4>
						</header>
						<div class="form-check">
							<input id="question__2-1" name="question_2" value="1" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__2-1">el método fetch_assoc</label>
						</div>
						<div class="form-check">
							<input id="question__2-2" name="question_2" value="2" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__2-2">el método fetch_array</label>
						</div>
						<div class="form-check">
							<input id="question__2-3" name="question_2" value="3" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__2-3">
								el método fetch</label>
						</div>
						<div class="form-check">
							<input id="question__2-4" name="question_2" value="4" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__2-4">
								el método fetch_row</label>
						</div>
					</div>

					<div class="my-3 question__container">
						<header>
							<h4 class="mb-3">Se debe configurar PDO para que cuando se produzca un error genere excepciones utilizando el manejador base de PHP, Exception. ¿Verdadero o falso?</h4>
						</header>
						<div class="form-check">
							<input id="question__3-1" name="question_3" value="1" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__3-1">Verdadero</label>
						</div>
						<div class="form-check">
							<input id="question__3-2" name="question_3" value="2" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__3-2">Falso</label>
						</div>
					</div>

					<div class="my-3 question__container">
						<header>
							<h4 class="mb-3">Si usas la extensión nativa MySQLi, se pueden utilizar transacciones sobre el motor de almacenamiento MyISAM, pero esto nunca es posible con la extensión PDO. ¿Verdadero o falso?</h4>
						</header>
						<div class="form-check">
							<input id="question__4-1" name="question_4" value="1" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__4-1">Verdadero</label>
						</div>
						<div class="form-check">
							<input id="question__4-2" name="question_4" value="2" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__4-2">Falso</label>
						</div>
					</div>

					<div class="my-3 question__container">
						<header>
							<h4 class="mb-3">Para configurar los niveles de error de los que debe notificar PHP, debes utilizar el parámetro _____ del fichero php.ini.</h4>
						</header>
						<div class="form-check">
							<input id="question__5-1" name="question_5" value="1" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__5-1">display_errors</label>
						</div>
						<div class="form-check">
							<input id="question__5-2" name="question_5" value="2" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__5-2">error_notice</label>
						</div>
						<div class="form-check">
							<input id="question__5-3" name="question_5" value="3" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__5-3">error_reporting</label>
						</div>
						<div class="form-check">
							<input id="question__5-4" name="question_5" value="4" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__5-4">show_errors</label>
						</div>
					</div>

					<div class="my-3 question__container">
						<header>
							<h4 class="mb-3">Al acabar una conexión mediante la extensión MySQLi, se debe ejecutar el método close para liberar los recursos que utiliza. ¿Verdadero o falso?</h4>
						</header>
						<div class="form-check">
							<input id="question__6-1" name="question_6" value="1" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__6-1">Verdadero</label>
						</div>
						<div class="form-check">
							<input id="question__6-2" name="question_6" value="2" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__6-2">Falso</label>
						</div>
					</div>

					<div class="my-3 question__container">
						<header>
							<h4 class="mb-3">¿Dónde se realiza la configuración de MySQLi?</h4>
						</header>
						<div class="form-check">
							<input id="question__7-1" name="question_7" value="1" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__7-1">en el fichero httpd.conf</label>
						</div>
						<div class="form-check">
							<input id="question__7-2" name="question_7" value="2" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__7-2">en el fichero mysqli.conf</label>
						</div>
						<div class="form-check">
							<input id="question__7-3" name="question_7" value="3" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__7-3">en el fichero php.ini</label>
						</div>
						<div class="form-check">
							<input id="question__7-4" name="question_7" value="4" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__7-4">en el fichero my.ini</label>
						</div>
					</div>

					<div class="my-3 question__container">
						<header>
							<h4 class="mb-3">Mediante la función set_error_handler es posible personalizar el comportamiento de PHP cuando se produce un error, sea cual sea su nivel. ¿Verdadero o falso?</h4>
						</header>
						<div class="form-check">
							<input id="question__8-1" name="question_8" value="1" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__8-1">Verdadero</label>
						</div>
						<div class="form-check">
							<input id="question__8-2" name="question_8" value="2" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__8-2">Falso</label>
						</div>
					</div>

					<div class="my-3 question__container">
						<header>
							<h4 class="mb-3">¿Cuál es el fichero de configuración de MySQL?</h4>
						</header>
						<div class="form-check">
							<input id="question__9-1" name="question_9" value="1" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__9-1">se configura en el mismo fichero que Apache, httpd.conf</label>
						</div>
						<div class="form-check">
							<input id="question__9-2" name="question_9" value="2" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__9-2">se configura en el mismo fichero que PHP, php.ini</label>
						</div>
						<div class="form-check">
							<input id="question__9-3" name="question_9" value="3" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__9-3">my.cnf</label>
						</div>
						<div class="form-check">
							<input id="question__9-4" name="question_9" value="4" type="radio" class="form-check-input" required>
							<label class="form-check-label" for="question__9-4">my.ini</label>
						</div>
					</div>

					<div class="my-3 question__container">
						<header>
							<h4 class="mb-3">Con la extensión MySQLi, para obtener un array a partir de un conjunto de resultados debes utilizar</h4>
						</header>
						<div class="form-check">
							<input id="question__10-1" name="question_10[]" value="1" type="checkbox" class="form-check-input">
							<label class="form-check-label" for="question__10-1">el método fetch_assoc</label>
						</div>
						<div class="form-check">
							<input id="question__10-2" name="question_10[]" value="2" type="checkbox" class="form-check-input">
							<label class="form-check-label" for="question__10-2">el método fetch_array</label>
						</div>
						<div class="form-check">
							<input id="question__10-3" name="question_10[]" value="3" type="checkbox" class="form-check-input">
							<label class="form-check-label" for="question__10-3">el método fetch</label>
						</div>
						<div class="form-check">
							<input id="question__10-4" name="question_10[]" value="4" type="checkbox" class="form-check-input">
							<label class="form-check-label" for="question__10-4">el método fetch_row</label>
						</div>
					</div>

					<button name="test_submit" value="test_submit" class="w-100 btn btn-primary btn-lg mt-3" type="submit">Enviar</button>
					-->
				</form>
			</main>
		<?php } ?>
	</div>

	<?php include "{$relative}/common/footer.html" ?>

	<?php include "{$relative}/common/scripts.php" ?>
</body>

</html>