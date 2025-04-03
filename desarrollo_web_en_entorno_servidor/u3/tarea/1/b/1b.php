<?php
$relative = "../..";
$active = 1;

require_once("./php/auth_digest.php");
$text_to_show = auth_digest();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Unidad 2 | Ejercicio 1b: HTTP Digest</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/nav.php" ?>

	<div class="container pt-3" style="max-width: 960px">
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">HTTP autentificación básica</h1>
			</div>
		</header>

		<main>
			<p class="text-center text-danger"><?= $text_to_show ?></p>
			<section id="hash">
				<header>
					<h3>¿Qué es una función hash?</h3>
				</header>
				<div>
					<p>
						Es una función que convierte un valor en otro, siguiendo un
						procedimiento determinado por el algoritmo empleado. Es usado en
						criptografía, indexamiento de datos, compresión y generación de
						checksums.
					</p>

					<p>
						Existen distintos algoritmos de hasheo, siendo
						<abbr title="Message Digest 5">MD5</abbr> o
						<abbr title="Secure Hash Algorithm">SHA</abbr> algunos ejemplos. Su
						objetivo es producir un valor único y de longitud definida.
					</p>

					<p>
						Cabe destacar que el valor hash (hash value) y mensaje digest (message
						digest) son conceptos sinónimos.
					</p>
				</div>
			</section>

			<section id="importance-of-hash">
				<header>
					<h3>La importancia de esta función</h3>
				</header>
				<div>
					<p>
						El hashing proporciona un método más seguro y ajustable de obtener datos
						comparado con cualquier otro tipo de estructura de datos. Podemos
						determinar si los datos hasheados han sido modificados o no ya que
						cualquier cambio en el valor hasheado generará un hash computado
						diferente, por lo que podemos determinar fácilmente la corrupción de
						cualquier tipo de dato.
					</p>
				</div>
			</section>

			<section id="safest-http-auth">
				<header>
					<h3>Autentificación HTTP más segura</h3>
				</header>
				<div>
					<p>
						La autentificación con Digest junto SSL y la encriptación de las
						contraseñas es, sin duda, la opción más segura.
					</p>
					<p>
						Cabe destacar que la mejor forma de proteger las contraseñas es mediante
						el uso de la función de derivación de clave Argon2id. Tiene mayor
						resistencia al cracking que funciones conocidas como Bcrypt y Scrypt (bajo
						las mismas condiciones de hardware).
					</p>
				</div>
			</section>

		</main>
		
		<?php include "{$relative}/common/footer.html" ?>
	</div>

	<?php include "{$relative}/common/scripts.php" ?>
</body>

</html>