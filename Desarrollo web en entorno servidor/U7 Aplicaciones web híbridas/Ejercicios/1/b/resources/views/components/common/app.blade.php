@props(['pageTitle'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<x-common.head :title="$pageTitle"/>
	</head>

	<body class="">
		<x-common.navbar />
		<div class="container mx-auto pt-3">
			{{ $slot }}
		</div>
		<x-common.footer />
	</body>
</html>