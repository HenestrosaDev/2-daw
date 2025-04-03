<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Plantilla productos</title>

	<style>
		.header__logo {
			position: absolute;
			right: 0;
			max-width: 100%;
			height: 5vw;
		}

		.header {
			font-size: x-large;
			font-family: Tahoma, Geneva, Verdana, sans-serif;
			margin-bottom: 2rem;
			color: green;
		}

		.form {
			width: 33%;
			margin: 0 auto;
		}

		.column {
			display: flex;
			flex-direction: column;
		}

		.text-center {
			text-align: center;
		}

		input {
			margin-bottom: 1rem !important;
		}

		footer {
			position: fixed;
			bottom: 0;
			width: 100%;
			font-size: small;
			margin-bottom: 1rem;
		}
	</style>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="header">
		@yield('header')
		<img src="{{asset('/img/logo.png')}}" alt="logo" class="header__logo">
	</div>

	<main>
		@yield('content')
	</main>

	<footer class="text-center">
		@yield('footer')
		<p>Hola, soy el footer</p>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>