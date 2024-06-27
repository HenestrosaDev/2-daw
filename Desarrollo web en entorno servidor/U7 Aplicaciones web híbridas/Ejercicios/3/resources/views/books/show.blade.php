<!DOCTYPE html>
<html>

<head>
	<title>Ver Libro</title>
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	>
	@vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-8">
	<div class="mx-auto max-w-lg">
		<h1 class="mb-6 text-3xl font-bold">Detalles del Libro</h1>
		<div class="rounded bg-white p-6 shadow-md">
			<div class="mb-6 space-y-2">
				<div><strong>ID:</strong> {{ $book->id }}</div>
				<div><strong>ISBN:</strong> {{ $book->ISBN }}</div>
				<div><strong>Título:</strong> {{ $book->title }}</div>
				<div><strong>Autor:</strong> {{ $book->author }}</div>
				<div><strong>Editorial:</strong> {{ $book->publisher }}</div>
				<div><strong>Edición:</strong> {{ $book->edition }}</div>
				<div><strong>Año:</strong> {{ $book->year }}</div>
			</div>

			<a
				href="{{ route('books.index') }}"
				class="block w-full rounded bg-blue-500 px-4 py-2 text-center text-white"
			>
				Atrás
			</a>
		</div>
	</div>
</body>

</html>
