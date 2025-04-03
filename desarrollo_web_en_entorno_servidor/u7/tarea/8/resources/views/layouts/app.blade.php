<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1"
	>

	<title>{{ config('app.name', 'Laravel') }}</title>

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
				@if (Auth::user()?->isAlumno())
					<a
						href="{{ route('asignatura.index.alumno') }}"
						class="{{ request()->route()->getName() == 'asignatura.index.alumno' ? 'font-bold underline underline-offset-4 decoration-blue-500' : '' }} hover:text-gray-300"
					>
						Asignaturas
					</a>
				@elseif (Auth::user()?->isProfesor())
					<a
						href="{{ route('asignatura.index.profesor') }}"
						class="{{ request()->route()->getName() == 'asignatura.index.profesor' ? 'font-bold underline underline-offset-4 decoration-blue-500' : '' }} hover:text-gray-300"
					>
						Asignaturas
					</a>
				@elseif (Auth::user()?->isAdmin())
					<a
						href="{{ route('asignatura.index.admin') }}"
						class="{{ request()->route()->getName() == 'asignatura.index.admin' ? 'font-bold underline underline-offset-4 decoration-blue-500' : '' }} hover:text-gray-300"
					>
						Asignaturas
					</a>
					<a
						href="{{ route('profesores.index') }}"
						class="{{ request()->route()->getName() == 'profesores.index' ? 'font-bold underline underline-offset-4 decoration-blue-500' : '' }} hover:text-gray-300"
					>
						Profesores
					</a>
					<a
						href="{{ route('alumnos.index') }}"
						class="{{ request()->route()->getName() == 'alumnos.index' ? 'font-bold underline underline-offset-4 decoration-blue-500' : '' }} hover:text-gray-300"
					>
						Alumnos
					</a>
				@endif
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
				<div class="flex items-center justify-center space-x-4">
					<p>{{ Auth::user()->nombre }}</p>

					<a
						href="{{ route('logout') }}"
						class="mx-2 text-white rounded border border-red-500 px-2 py-1 hover:bg-red-500"
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
				</div>
			@endguest
		</div>
	</nav>

	<!-- Content -->
	<main class="container mx-auto p-4">
		@yield('content')
	</main>
</body>

</html>
