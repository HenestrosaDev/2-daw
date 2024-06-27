<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1"
	>

	<title>Tienda de Videojuegos</title>

	<!-- Fonts -->
	<link
		rel="preconnect"
		href="https://fonts.bunny.net"
	>
	<link
		href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
		rel="stylesheet"
	/>

	@vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
	<!-- Navigation -->
	<nav class="bg-gray-800 p-4 text-white">
		<div class="container mx-auto flex items-center justify-between">
			<div class="flex space-x-5">
				<a
					href="/"
					class="{{ request()->route()->getName() == 'index' ? 'font-bold underline underline-offset-4 decoration-blue-500' : '' }} hover:text-gray-300"
				>
					Inicio
				</a>
				@auth
					<a
						href="{{ route('fabricantes.index') }}"
						class="{{ request()->route()->getName() == 'fabricantes.index' ? 'font-bold underline underline-offset-4 decoration-blue-500' : '' }} hover:text-gray-300"
					>
						Fabricantes
					</a>
				@endauth
			</div>

			@guest
				<div class="flex space-x-4">
					<a
						href="{{ route('login') }}"
						class="mx-2 text-white"
					>
						Iniciar Sesión
					</a>
					<a
						href="{{ route('register') }}"
						class="mx-2 text-white"
					>
						Registrarse
					</a>
				</div>
			@else
				<a
					href="{{ route('logout') }}"
					class="mx-2 text-white"
					onclick="event.preventDefault();document.getElementById('logout-form').submit();"
				>
					Cerrar Sesión
				</a>
				<form
					id="logout-form"
					action="{{ route('logout') }}"
					method="POST"
					class="hidden"
				>
					@csrf
				</form>
			@endguest
		</div>
	</nav>

	<!-- Content -->
	<main class="container mx-auto p-4">
		@yield('content')
	</main>
</body>

</html>
