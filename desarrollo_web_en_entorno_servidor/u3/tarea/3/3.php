<?php
$relative = "..";
$active = 3;
?>
<html lang="es">

<head>
	<title>Unidad 3 | Ejercicio 3: Composer</title>
	<?php include "{$relative}/common/head.php"; ?>
</head>

<body class="bg-light">
	<?php include "{$relative}/common/nav.php" ?>

	<div
		class="container pt-3"
		style="max-width: 960px"
	>
		<header>
			<div class="p-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4 fw-normal">Composer</h1>
			</div>
		</header>

		<main>
			<div>
				<h3>
					¿Qué es
					<a
						target="_blank"
						href="https://en.wikipedia.org/wiki/Composer_(software)"
						rel="noopener"
					>
						Composer
					</a>
					y qué
					<a
						target="_blank"
						href="https://getcomposer.org/doc/00-intro.md#introduction"
						rel="noopener"
					>
						no
					</a>
					es según ellos?
				</h3>

				<p>
					Es un manejador de paquetes usado en PHP que proporciona un estándar
					para administrar, descargar e instalar dependencias y librerías.
				</p>

				<p>
					Según
					<a href="https://getcomposer.org/doc/00-intro.md#introduction">
						la documentación del proyecto
					</a>, 
					<strong>Composer</strong> no es un manejador de paquetes como Yum
					o Apt. Esto se debe a que, por defecto, se encarga de administrar
					las dependencias a nivel de proyecto, no a nivel global.
				</p>
			</div>

			<div>
				<h3>
					¿Con qué
					<a
						target="_blank"
						href="https://getcomposer.org/doc/01-basic-usage.md#basic-usage"
						rel="noopener"
					>
						archivo
					</a>
					configuramos nuestro proyecto en Composer?
				</h3>

				<p>Con el archivo <code>composer.json</code></p>
			</div>

			<div>
				<h3>
					¿Qué es
					<a
						target="_blank"
						href="https://www.w3schools.com/whatis/whatis_json.asp"
						rel="noopener"
					>
						JSON
					</a>
					?
				</h3>

				<p>
					JSON (JavaScript Object Notation) es un tipo de archivo usado para
					el intercambio de datos que usa el lenguaje natural para almacenar y
					transmitir datos de objetos almacenados en arrays u organizados en
					pares de clave-valor.
				</p>
			</div>

			<div>
				<h3>
					¿Cómo
					<a
						target="_blank"
						href="https://getcomposer.org/doc/01-basic-usage.md#installing-dependencies"
						rel="noopener"
					>
						instalamos
					</a>
					nuestras dependencias en Composer y qué archivo se genera?
				</h3>

				<p>
					Usando el comando <code>composer install</code>. Al ejecutarlo, se
					comprobará si existe el archivo <code>composer.lock</code>. Si no lo
					está, <strong>Composer</strong> ejecutará automáticamente el comando
					<code>composer update</code> para crearlo.
				</p>
				
				<p>
					No obstante, también podríamos ejecutar el comando
					<code>composer update</code> ya que, automáticamente,
					<strong>Composer</strong> se encarga de ejecutar
					<code>composer install</code> para instalar las dependencias
					indicadas en <code>composer.json</code> y generar el archivo
					<code>composer.lock</code> (en caso de que no exista).
				</p>

				<p>
					En caso de que <code>composer.lock</code> exista, se instalarán las
					dependencias declaradas en ese archivo.
				</p>

				<p>
					<code>composer.lock</code> determina la versión de las dependencias
					que se usan en el paquete. Es imprescindible puesto que permite que
					las personas involucradas en un proyecto trabajen con la misma
					versión de las dependencias con el fin de evitar problemas de
					compatibilidad, entre otros.
				</p>
			</div>

			<div>
				<h3>
					¿Cómo
					<a
						target="_blank"
						href="https://getcomposer.org/doc/01-basic-usage.md#updating-dependencies-to-their-latest-versions"
						rel="noopener"
					>
						actualizamos
					</a>
					nuestras dependencias a sus últimas versiones?
				</h3>

				<p>
					Tendremos que introducir el comando <code>composer update</code>.
					Con ello, <strong>Composer</strong> comprobará el archivo
					<code>composer.json</code> y determinará la última versión de las
					dependencias declaradas para proceder con su instalación.
				</p>

				<p>
					Al determinarse las versiones, el archivo
					<code>composer.lock</code> se actualizará para reflejar las
					versiones de las dependencias que se usan en el proyecto.
				</p>

				<p>
					Si deseamos actualizar una dependencia en concreto, bastará con
					ejecutar <code>composer update [dependencia]</code> donde
					<code>[dependencia]</code> será el nombre de la dependencia que
					queramos actualizar. Un ejemplo de ello sería
					<code>composer update mpdf/mpdf</code>.
				</p>
			</div>

			<div>
				<h3>
					¿Qué es
					<a
						target="_blank"
						href="https://getcomposer.org/doc/01-basic-usage.md#packagist"
						rel="noopener"
					>
						Packagist
					</a>
					y cómo se
					<a
						target="_blank"
						href="https://packagist.org"
						rel="noopener"
					>
						usa
					</a>
					?
				</h3>

				<p>Es el repositorio principal de <strong>Composer</strong>.</p>

				<p>
					Usar <strong>Packagist</strong> es bastante sencillo. Dentro del
					archivo <code>composer.json</code>, tendremos que crear un nodo
					llamado <code>require</code> en cuyo interior se especifican los
					paquetes que queremos usar en nuestro proyecto. Por ejemplo:
				</p>

				<p>
					<samp>
						<code>
							{ "require": { "vendor/package": "1.3.2", "vendor/package2":
							"1.*", "vendor/package3": "^2.0.3" } }
						</code>
					</samp>
				</p>
			</div>

			<div>
				<h3>
					¿Cómo cargamos (específicamente
					<a
						target="_blank"
						href="https://getcomposer.org/doc/01-basic-usage.md#autoloading"
						rel="noopener"
					>
						<em>autoloading</em>
					</a>
					) nuestras dependencias en PHP?
				</h3>
				<p>
					El archivo <code>autoload.php</code> es creado por
					<strong>Composer</strong> automáticamente en la carpeta
					<code>vendor</code> y contiene el código para que las librerías se
					puedan cargar automáticamente por demanda. Es decir, según se vayan
					usando.
				</p>
				<p>
					El principal punto positivo de <em>autoload</em> es que,
					independientemente del número de dependencias, solo necesitamos
					incluir un único archivo en una página PHP del proyecto, tal que
					así: <code>require 'vendor/autoload.php'</code> (en caso de que el
					archivo se encuentre en el directorio <code>vendor</code>).
				</p>
			</div>
		</main>

		<?php include "{$relative}/common/footer.html" ?>
	</div>

	<?php include "{$relative}/common/scripts.php" ?>
</body>

</html>
