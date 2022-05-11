<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<x-common.head :title="$pageTitle"/>
	</head>

	<body>
		<x-common.navbar/>
		<div class="container pt-3">
			{{ $slot }}
		</div>
		<x-common.footer/>
	</body>
</html>