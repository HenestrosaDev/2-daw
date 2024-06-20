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

				<p class="fs-5 text-muted">
					Has realizado el examen <?= $_SESSION["attempt_no"] ?> <?= ($_SESSION["attempt_no"] == 1 ? "vez" : "veces") ?>. 
					Recuerda que solo dispones de 3 intentos.
				</p>

				<?php if ($_SESSION["attempt_no"] == 3) { ?>
					<div 
						class="alert alert-danger text-center mt-4" 
						role="alert"
					>
						Has llegado al número máximo de intentos, no puedes enviar más tests.
					</div>
				<?php } ?>
			</div>
		</header>

		<?php if ($_SESSION["attempt_no"] < 3) { ?>
			<main>
				<form 
					method="post" 
					action="./php/test_submit.php"
				>
					<?php foreach ($questions as $question) { ?>
						<div class="my-3 question__container">
							<header>
								<h4 id="question__title--<?= $question["id"] ?>" class="mb-3"><?= $question["content"] ?></h4>
							</header>
							
							<?php
							$i = 1;
							foreach ($question_answers as $question_answer) {
								if ($question_answer["question_id"] === $question["id"]) { 
							?>
									<div class="form-check">
										<input id="question_answer--<?= $question["id"] ?>-<?= $question_answer["id"] ?>" name="answer_for_question_<?= $question["id"] ?>" value="<?= $question_answer["id"] ?>" type="<?= ($question["kind"] === 'R' ? "radio" : "checkbox") ?>" class="form-check-input" <?= ($question["kind"] === 'R' ? "required" : '') ?>>
										<label class="form-check-label" for="question_answer--<?= $question["id"] ?>-<?= $question_answer["id"] ?>"><?= $question_answer["content"] ?></label>
									</div>
							<?php
								}
							} 
							?>
						</div>
					<?php } ?>

					<button 
						name="test_submit" 
						value="test_submit" 
						class="w-100 btn btn-primary btn-lg mt-3" 
						type="submit"
					>
						Enviar
					</button>
				</form>
			</main>
		<?php } ?>
	</div>

	<?php include "{$relative}/common/footer.html" ?>

	<?php include "{$relative}/common/scripts.php" ?>
</body>

</html>