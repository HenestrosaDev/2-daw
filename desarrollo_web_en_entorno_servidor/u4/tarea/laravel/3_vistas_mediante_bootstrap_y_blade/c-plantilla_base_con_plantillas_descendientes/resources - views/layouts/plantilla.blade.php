<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Plantilla</title>

	<style>
		.container {
			background-color: red;
			text-align: center;
		}

		.main {
			background-color: blue;
			color: white;
		}

		.footer {
			background-color: yellow;
			margin: 5rem 0;
		}
	</style>
</head>

<body>

	<div class="container">
		@yield("header")
	</div>

	<main class="main">
		@yield("main")
	</main>

	<footer class="footer">
		@yield("footer")
		<p>Soy un párrafo dentro del footer y estoy escrito en la plantilla.blade.php</p>
	</footer>

</body>

</html>