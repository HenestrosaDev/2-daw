<!DOCTYPE html>
<html>

<head>
	<title>Ver Libro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-8">
	<div class="max-w-lg mx-auto">
		<h1 class="text-3xl font-bold mb-6">Detalles del Libro</h1>
		<div class="bg-white p-6 rounded shadow-md">
			<div class="space-y-2 mb-6">
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
				class="bg-blue-500 text-white px-4 py-2 rounded w-full block text-center"
			>
				Atrás
			</a>
		</div>
	</div>
</body>


</html>