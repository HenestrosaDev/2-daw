<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
	<title>Unidad 1 | Ejercicio 1: 2</title>
	<?php
	require_once("../php/get_relative.php");
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
			<h1>Tutorial instalación XAMPP</h1>
		</header>

		<article id="instalacion-xampp">
			<section id="xampp-linux">
				<h2 class="center">Instalación en Linux</h2>

				<div id="linux-paso-1">
					<h3 class="header--margin">
						Paso 1: Descargar el paquete de instalación
					</h3>

					<p>
						Para instalar XAMPP, primero tenemos que descargarnos el paquete desde la <a href="https://www.apachefriends.org/index.html">página oficial</a>.
						En este caso, seleccionaremos la versión de <strong>Linux</strong>.
					</p>

					<img src="./img/xampp-linux/step1.png" alt="Paso 1" onclick="window.open(this.src)">
				</div>

				<div id="linux-paso-2">
					<h3>Paso 2: Instalar el paquete de instalación</h3>

					<p>
						Para ejecutar el programa, debemos hacer el archivo ejecutable.
						Abre la terminal <code>Ctrl+Alt+T</code> y haz lo siguiente:
					</p>

					<ol>
						<li>
							Muévete a la carpeta donde se encuentra el paquete de instalación. Por defecto, se
							encontrará en la carpeta de <code>Downloads</code> (o Descargas). Navega a la carpeta
							con este comando: <code>cd /home/[tu_usuario]/Downloads</code>

							<img src="./img/xampp-linux/step2-1.png" alt="Paso 2-1" onclick="window.open(this.src)">
						</li>

						<li>
							Ahora convierte el archivo en ejecutable corriendo un comando <code>chmod</code>:
							<code>sudo chmod 755 [nombre_paquete]</code>. Probablemente sea algo como
							<code>xampp-linux-x64-7.4-installer-run</code>
						</li>

						<li>
							Como la terminal no da ninguna información de si la acción ha sido procesada correctamente,
							tenemos que ejecutar este comando: <code>ls –l [nombre_paquete]</code>.
						</li>
					</ol>
				</div>

				<div id="linux-paso-3">
					<h3>Paso 3: Ejecuta el wizard de instalación</h3>

					<ol>
						<li>Para ejecutarlo, usa el comando <code>sudo ./[nombre_paquete]</code></li>
						<li>
							Tras ello, debería de aparecer un wizard similar al de esta imagen:
							<img src="./img/xampp-linux/step3.png" alt="Paso 3" onclick="window.open(this.src)">
						</li>
					</ol>
				</div>

				<div id="linux-paso-4">
					<h3>Paso 4: Instalar XAMPP</h3>

					<ol>
						<li>
							Pulsa <strong>Next</strong> y en la selección de componentes, elige aquellos que quieras
							instalar. Lo recomendable es dejarlo por defecto. <img src="./img/xampp-linux/step4-1.png" alt="Paso 4-1" onclick="window.open(this.src)">
						</li>
						<li>
							Después de seleccionar los componentes, nos aparecerá la ruta en la que se instalará el
							software. Para proceder, pulsa <strong>Next</strong>. <img src="./img/xampp-linux/step4-2.png" alt="Paso 4-2" onclick="window.open(this.src)">
						</li>
						<li>
							Tras ello, saldá una ventana sobre <strong>Bitnami</strong>. Es un paquete que incluye
							Wordpress, Joomla, Drupal... Puedes denegar su instalación si quieres.
						</li>
						<li>
							A continuación, el wizard notificará que XAMPP está listo para ser instalado en tu sistema.
							Pulsa <strong>Next</strong> para empezar.
						</li>
						<li>
							Esto ejecutará el proceso de instalación. Debería de aparecer algo así:
							<img src="./img/xampp-linux/step4-3.png" alt="Paso 4-3" onclick="window.open(this.src)">
						</li>
						<li>
							El diálogo final debería de notificar que XAMPP se ha instalado correctamente. Nos da la
							opción de abrir XAMPP tras finalizar el proceso, lo cual es opcional.
						</li>
					</ol>
				</div>
			</section>

			<section id="xampp-windows">
				<h2 class="center">Instalación en Windows</h2>

				<div id="windows-paso-1">
					<h3 class="header--margin">Paso 1: Descargar el paquete de instalación</h3>

					<p>
						Para instalar XAMPP, primero tenemos que descargarnos el paquete desde la <a href="https://www.apachefriends.org/index.html">página oficial</a>.
						En este caso, seleccionaremos la versión de <strong>Windows</strong>.
					</p>

					<img src="./img/xampp-linux/step1.png" alt="Paso 1" onclick="window.open(this.src)">
				</div>

				<div id="windows-paso-2">
					<h3>Paso 2: Abre el ejecutable</h3>

					<ol>
						<li>
							Haz doble click sobre el archivo ejecutable <code>(.exe)</code> descargado de la página
							y pulsa <strong>Next</strong>.
						</li>
						<li>
							Dentro de la lista de componentes, selecciona aquellos que quieras instalar. Lo
							recomendable es no tocar nada y dejarlo por defecto.
							<img src="./img/xampp-windows/step2-1.jpg" alt="Paso 2-1" onclick="window.open(this.src)">
						</li>
						<li>
							Tras ello, tendrás la opción de cambiar la ruta de instalación del programa.
							<img src="./img/xampp-windows/step2-2.jpg" alt="Paso 2-2" onclick="window.open(this.src)">
						</li>
						<li>
							Tras ello, saldá una ventana sobre <strong>Bitnami</strong>. Es un paquete que incluye
							Wordpress, Joomla, Drupal... Puedes denegar su instalación si quieres.
							<img src="./img/xampp-windows/step2-3.jpg" alt="Paso 2-3" onclick="window.open(this.src)">
						</li>
						<li>Permite el acceso de Windows Firewall en caso de que se despliegue la alerta.</li>
						<li>Pulsa el botón <strong>Finish</strong></li>
					</ol>
				</div>
			</section>

			<section id="php-basico">
				<div class="header">
					<h1>Ejecución PHP puro y embebido en HTML</h1>
				</div>

				<div id="php-puro">
					<h2 class="header--margin center">PHP puro</h2>

					<p>
						Se crea un fichero dedicado al código PHP, el cual es interpretado por el servidor. Devuelve código
						HTML para que los clientes web puedan interpretarlo. No hay código HTML.
						<img src="./img/php-tutorial/snippet1.png" alt="Snippet 1" onclick="window.open(this.src)">
					</p>
					
					<h2 class="header--margin center">PHP embebido</h2>

					<p>
						Para ejecutar código embebido, tendremos que hacer uso de la etiquetas <code>&lt;?php ?&gt;</code>.
						Se usa bastante para procesar formularios. La extensión del archivo ha de ser <code>.php</code>
					</p>

					<figure class="wide-margin-bottom">
						<img src="./img/php-tutorial/snippet2.png" alt="Snippet 1" onclick="window.open(this.src)">
						<figcaption>Código HTML con el método <code>get</code></figcaption>
					</figure>

					<figure>
						<img src="./img/php-tutorial/snippet3.png" alt="Snippet 3" onclick="window.open(this.src)">
						<figcaption><code>procesa.php</code></figcaption>
					</figure>
				</div>
			</section>
		</article>
	</main>

	<?php include $relative . "/common/footer.html"; ?>
	<?php include $relative . "/common/floating-buttons.html"; ?>
</body>

</html>