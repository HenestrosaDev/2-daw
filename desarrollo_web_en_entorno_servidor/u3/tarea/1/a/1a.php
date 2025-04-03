<?php
$relative = "../..";
$active = 1;

$text_to_show;

/* 
 * ----------------------------------------------
 * ----------------- IMPORTANTE -----------------
 * ----------------------------------------------
 * $users contiene usuarios predefinidos con el 
 * fin de simplificar el propósito de la tarea. 
 * Para un desarrollo óptimo y seguro en una 
 * aplicación/sitio web, deberíamos realizar una 
 * consulta a la base de datos, seleccionar el 
 * nombre de usuario que introduce el usuario,
 * comprobar que existe y, de ser así, comprobar 
 * si el hash de nuestra contraseña coincide con 
 * el hash almacenado en la base de datos. Este
 * último punto se realizaría con el método
 * validate_pw del archivo hash.php
 */
$users = array("admin" => "1234", "user" => "1234");

if (
	!isset($_SERVER["PHP_AUTH_USER"])
	|| !isset($users[$_SERVER["PHP_AUTH_USER"]])
	|| $_SERVER["PHP_AUTH_PW"] != $users[$_SERVER["PHP_AUTH_USER"]]
) {
	request_credentials();
	// Si el usuario cancela la autentificación:
	die("No estás autentificado.");
} else {
	$text_to_show = "Tu usuario es <strong>{$_SERVER['PHP_AUTH_USER']}</strong> y tu contraseña es <strong>{$_SERVER['PHP_AUTH_PW']}</strong>.</p>";
}

function request_credentials()
{
	header("WWW-Authenticate: Basic realm='1a'");
	header("HTTP/1.1 401 Unauthorized");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 2 | Ejercicio 1a: HTTP Basic</title>
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
			<section>
				<header>
					<h3>Seguridad cuestionable</h3>
				</header>
				<div>
					<p>
						La autentificación básica no es segura puesto que las credenciales del
						usuario se envían sin encriptar, en codificación <strong>base64</strong>.
						Cualquiera que intercepte la request puede averiguar el usuario y la
						contraseña.
					</p>
				</div>
			</section>


			<section>
				<header>
					<h3>¿Cómo podría mejorarse?</h3>
				</header>

				<div>
					<p>
						Aún no siendo recomendable, solo debería de usarse bajo el protocolo HTTPS
						puesto que toda la transferencia de datos realizada bajo este protocolo es
						encriptada.
					</p>
				</div>
			</section>
		</main>
		
		<?php include "{$relative}/common/footer.html" ?>
	</div>

	<?php include "{$relative}/common/scripts.php" ?>
</body>

</html>