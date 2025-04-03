<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1"
	>
	<meta
		name="csrf-token"
		content="{{ csrf_token() }}"
	>

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link
		rel="preconnect"
		href="https://fonts.bunny.net"
	>
	<link
		href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
		rel="stylesheet"
	/>

	<!-- Scripts -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
	<div class="min-h-screen bg-gray-100">
		@include('layouts.navigation')

		<!-- Page Heading -->
		@isset($header)
			<header class="bg-white shadow">
				<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
					{{ $header }}
				</div>
			</header>
		@endisset

		<!-- Page Content -->
		<main class="grid min-h-[75vh] place-items-center">
			{{ $slot }}
		</main>
	</div>
</body>

</html>
