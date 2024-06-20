<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
	<title>Unidad 1 | Ejercicio 1: 1</title>
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
			<h1>Teoría de XHTML, CSS y PHP</h1>
		</header>

		<article>
			<section id="a">
				<h2 class="header--margin">
					a) Explica las diferencias entre un desarrollador
					<em>front-end</em>,
					<em>back-end</em>
					y
					<em>full-stack</em>.
				</h2>

				<p>
					Un desarrollador <em>back-end</em> se encarga de manejar el servidor web, la base de datos y la
					aplicación web, mientras que un desarrollador <em>front-end</em> se encarga de darle estilo y
					funcionalidad a la página de cara al cliente.
				</p>

				<p>
					Un desarrollador <em>full-stack</em> se encarga de manejar el apartado <em>back-end</em> y
					<em>front-end</em> de un sitio o aplicación web.
				</p>
			</section>

			<section id="b">
				<h2 class="header--margin">
					b) ¿Qué es un <em>framework CSS</em>? ¿Qué es <em>Bootstrap</em>? ¿Cuántos más
					frameworks CSS existen y cuáles son?
				</h2>

				<p>
					Un <em>framework CSS</em> es un paquete compuesto por una estructura de archivos y carpetas
					estandarizadas.
				</p>

				<p>
					<em>Bootstrap</em> es un framework CSS para desarrollar sitios web responsivos y <em>mobile-first</em>,
					lo cual quiere decir que se tiene que empezar a diseñar una página web desde el formato de pantalla
					más pequeño.
				</p>

				<p>Hay muchos frameworks CSS, pero estos son algunos de los principales:</p>

				<ul>
					<li>Bootstrap</li>
					<li>Foundation</li>
					<li>Bulma</li>
					<li>Susy</li>
					<li>Materialize</li>
				</ul>
			</section>

			<section id="c">
				<h2 class="header--margin">
					c) ¿Qué es WCAG? ¿Por qué es tan importante validar en XHTML, CSS y WCAG 2.1 AAA?
				</h2>

				<p>
					<abbr title="World Wide Web Consortium">WCAG</abbr> es parte de unas pautas publicadas por Web
					Accessibility Initiative of the World Wide Web Consortium, la organización internacional de la Internet.
				</p>

				<p>
					Es importante validar para mejorar la usabilidad y la funcionalidad de una página para que la web esté
					bien estructurada y no genere fallos de compatibilidad o de visualización de sus elementos.
					<abbr title="World Wide Web Consortium">WCAG</abbr> 2.1 AAA además facilita la accesibilidad a personas
					con alguna discapacidad.
				</p>
			</section>
		</article>
	</main>

	<?php include $relative . "/common/footer.html"; ?>
	<?php include $relative . "/common/floating-buttons.html"; ?>
</body>

</html>