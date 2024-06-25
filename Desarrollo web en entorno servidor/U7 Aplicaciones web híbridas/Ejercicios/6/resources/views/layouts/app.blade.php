<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Tienda de Videojuegos</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

	@vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
	<!-- Navigation -->
	<nav class="bg-gray-800 text-white p-4">
		<div class="container mx-auto flex justify-between items-center">
			<div class="flex space-x-5">
				<a
					href="/"
					class="{{ (request()->route()->getName() == "index" ? "font-bold underline underline-offset-4 decoration-blue-500" : "") }} hover:text-gray-300"
				>
					Inicio
				</a>
				<a
					href="/about"
					class="{{ (request()->route()->getName() == "about" ? "font-bold underline underline-offset-4 decoration-blue-500" : "") }} hover:text-gray-300"
				>
					Sobre Nosotros
				</a>
				<a
					href="/contact"
					class="{{ (request()->route()->getName() == "contact" ? "font-bold underline underline-offset-4 decoration-blue-500" : "") }} hover:text-gray-300"
				>
					Contacto
				</a>
				@auth
					@if (Auth::user()->isClient())
						<a
							href="{{ route('games.index') }}"
							class="{{ (request()->route()->getName() == "games.index" ? "font-bold underline underline-offset-4 decoration-blue-500" : "") }} hover:text-gray-300"
						>
							Juegos
						</a>
					@endif
					@if (Auth::user()->isAdmin())
						<a
							href="/admin/games"
							class="{{ (request()->route()->getName() == "games.admin.index" ? "font-bold underline underline-offset-4 decoration-blue-500" : "") }} hover:text-gray-300"
						>
							Admin
						</a>
					@endif
				@endauth
			</div>

			@guest
				<div class="flex space-x-4">
					<a 
						href="{{ route('login') }}" 
						class="text-white mx-2"
					>
						Iniciar Sesión
					</a>
					<a 
						href="{{ route('register') }}" 
						class="text-white mx-2"
					>
						Registrarse
					</a>
				</div>
			@else
				<a 
					href="{{ route('logout') }}" 
					class="text-white mx-2"
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
