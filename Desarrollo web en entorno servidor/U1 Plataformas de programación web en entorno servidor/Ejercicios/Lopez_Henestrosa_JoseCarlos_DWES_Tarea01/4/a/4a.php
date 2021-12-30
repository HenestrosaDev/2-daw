<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
	<title>Unidad 1 | Ejercicio 1: 4a</title>
	<?php
	require_once("../../php/get_relative.php");
	$relative = get_relative(__FILE__);
	include $relative . "/common/head.php";
	?>
</head>

<body>
	<?php include $relative . "/common/sidenav.php"; ?>

	<div id="main" class="main">
		<div class="header">
			<h1>Piedra, papel, tijeras, lagarto o Spock</h1>
			<h3>Reglas</h3>
		</div>

		<img src="../img/4a-reglas.png" alt="Snippet 1" onclick="window.open(this.src)">

		<form id="form" action="#" method="post" style="display: flex; justify-content: space-around;">
			<div class="form__item">
				<label for="option">Elige una opción:</label>
				<select name="options" id="option">
					<option value="piedra">Piedra</option>
					<option value="papel">Papel</option>
					<option value="tijeras">Tijeras</option>
					<option value="lagarto">Lagarto</option>
					<option value="spock">Spock</option>
				</select>
			</div>
			<button class="form__btn form__btn--submit" name="submit" value="submit" type="submit">¡Jugar!</button>
		</form>

		<?php
		if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
			$userOption = $_POST["options"];
			$options = ["piedra", "papel", "tijeras", "lagarto", "spock"];
			$randomKey = array_rand($options);
			$cpuOption = $options[$randomKey];
			$hasWon = false;
			$result = "Has elegido <strong>$userOption</strong>. La máquina ha elegido <strong>$cpuOption</strong>.";
			if ($cpuOption != $userOption) {
				switch ($userOption) {
					case "piedra":
						if ($cpuOption == "lagarto" || $cpuOption == "tijeras") {
							$hasWon = true;
						}
						break;
					case "papel":
						if ($cpuOption == "piedra" || $cpuOption == "spock") {
							$hasWon = true;
						}
						break;
					case "tijeras":
						if ($cpuOption == "papel" || $cpuOption == "lagarto") {
							$hasWon = true;
						}
						break;
					case "lagarto":
						if ($cpuOption == "spock" || $cpuOption == "papel") {
							$hasWon = true;
						}
						break;
					case "spock":
						if ($cpuOption == "tijeras" || $cpuOption == "papel") {
							$hasWon = true;
						}
						break;
				}

				if ($hasWon) {
					$result .= " ¡Ganaste!";
					$class = "form__results--win";
				} else {
					$result .= " Has perdido :(";
					$class = "form__results--lose";
				}
			} else {
				$result .= " Empate.";
				$class = "form__results--draw";
			}
		}
		?>

		<?php if (isset($result)) { ?>
			<div>
				<p class="form__results <?= $class ?>"><?= $result; ?></p>
			</div>
		<?php } ?>
	</div>

	<?php include $relative . "/common/footer.html"; ?>
	<?php include $relative . "/common/floating-buttons.html"; ?>
</body>

</html>