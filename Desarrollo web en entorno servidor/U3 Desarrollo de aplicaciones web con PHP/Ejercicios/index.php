<?php
$relative = ".";
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 3 | Inicio</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/nav.php" ?>

	<div 
		class="container pt-3" 
		style="max-width: 960px;"
	>
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">Bienvenido</h1>
			</div>
		</header>

		<main>
			<div class="text-center">
				<p>Las credenciales de los usuarios del ejercicio 4 y 5 son las mismas.</p>
				<p>Iniciar sesión como admin en el ejercicio 4 no otorga ningún privilegio.</p>
				<p>
					Credenciales para los ejercicios 1, 4 y 5: <strong>admin</strong>: 1234 /
					<strong>user</strong>: 1234
				</p>
				<p>
					Si has sido redireccionado aquí al cerrar sesión, vuelve a acceder a la página
					del ejercicio que desees e inicia sesión.
				</p>
			</div>
		</main>
		
		<?php include "{$relative}/common/footer.html" ?>
	</div>

	<?php include "{$relative}/common/scripts.php" ?>
</body>

</html>