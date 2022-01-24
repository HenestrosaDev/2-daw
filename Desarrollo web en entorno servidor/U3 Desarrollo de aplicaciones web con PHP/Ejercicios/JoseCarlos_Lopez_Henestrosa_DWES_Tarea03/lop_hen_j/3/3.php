<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 2 | Ejercicio 3: Composer</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/nav.php" ?>

	<div class="container pt-3" style="max-width: 960px;">
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">HTTP autentificación básica</h1>
			</div>
		</header>

		<main>
			<p class="text-center text-danger"><?= $text_to_show ?></p>
			<p>La autentificación básica no es segura puesto que las credenciales del usuario se envían sin encriptar, en codificación <strong>base64</strong>. Cualquiera que intercepte la request puede averiguar el usuario y la contraseña.</p>
			<p>Aún no siendo recomendable, solo debería de usarse bajo el protocolo HTTPS puesto que toda la transferencia de datos realizada bajo este protocolo es encriptada.</p>
		</main>
	</div>

	<?php include "{$relative}/common/footer.html" ?>

	<?php include "{$relative}/common/scripts.php" ?>
</body>

</html>