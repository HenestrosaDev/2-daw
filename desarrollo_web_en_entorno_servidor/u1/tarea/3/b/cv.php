<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
	<title>Unidad 1 | Ejercicio 1: 3b</title>
	<?php
	require_once("../../php/get_relative.php");
	$relative = get_relative(__FILE__);
	include $relative . "/common/head.php";
	?>
</head>

<body>
	<?php include $relative . "/common/sidenav.php"; ?>

	<main 
		id="main" 
		class="main"
	>
		<header class="header">
			<h1>Tu CV</h1>
			<h3>Has introducido lo siguiente:</h3>
		</header>

		<?php
		require_once $relative . "/php/filter.php";

		if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["fullName"])) {
				$errors[] = "El nombre completo es requerido.";
			}
			if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				$errors[] = "No se ha indicado email o el formato no es correcto.";
			}
			if (!empty($_POST["phone"])) {
				$phone = $_POST["phone"];
				$phone = preg_replace("/[^0-9]/", '', $phone);
				$phone = filter($phone);
				if (strlen($phone) != 9) {
					$errors[] = "El formato del teléfono no es correcto.";
				}
			}
			if (empty($_POST["city"])) {
				$errors[] = "El pueblo/ciudad es requerido.";
			}
			if (empty($_POST["about"])) {
				$errors[] = "Tienes que escribir un poco sobre ti.";
			}
			if (empty($_POST["experience"])) {
				$errors[] = "Tienes que escribir sobre tu experiencia.";
			}
			if (empty($errors)) {
				$fullName = filter($_POST["fullName"]);
				$email = filter($_POST["email"]);
				$city = filter($_POST["city"]);
				$about = filter($_POST["about"]);
				$experience = filter($_POST["experience"]);
			}
		?>

		<div class="form__results">
			<p>
				<?php
				if (isset($errors)) {
					foreach ($errors as $error) {
						echo "$error <br>";
					}
				} else {
				?>
					Tu nombre y apellidos son <?= $fullName ?>, eres de <?= $city ?><?= ((isset($phone)) ? "," :  " y ") ?>
					tu email es <?= $email ?> <?= ((isset($phone)) ? "y tu teléfono es $phone." :  "") ?></p>
			<p>Has dicho de ti lo siguiente: "<?= $about ?>".</p>
			<p class="not-margin-bottom">
				Hablas
				<?php
					$languagesAmount = $_POST["languagesAmount"];
					for ($i = 1; $i <= $languagesAmount; $i++) {
						echo filter($_POST["language$i"]) . (($i + 1 == $languagesAmount) ? " y " : (($i == $languagesAmount) ? "; " : ", "));
					}
				?>
				tienes conocimientos en
				<?php
					$educationAmount = $_POST["educationAmount"];
					for ($i = 1; $i <= $educationAmount; $i++) {
						echo filter($_POST["education$i"]) . (($i + 1 == $educationAmount) ? " y " : (($i == $educationAmount) ? "" : ", "));
					}
				?>
				y has puesto lo siguiente sobre tu experiencia: 
				"<?= $experience ?>".
			</p>
		</div>
	<?php
					}
				}
	?>
	</main>

	<?php include $relative . "/common/footer.html"; ?>
	<?php include $relative . "/common/floating-buttons.html"; ?>
</body>

</html>