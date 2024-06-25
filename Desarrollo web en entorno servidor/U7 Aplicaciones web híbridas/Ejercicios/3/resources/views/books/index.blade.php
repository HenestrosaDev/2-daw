<!DOCTYPE html>
<html>

<head>
	<title>Libros</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-8">
	<div class="container mx-auto">
		<h1 class="text-3xl font-bold mb-6">Libros</h1>
		
		@if ($message = Session::get('success'))
			<div class="bg-green-500 text-white p-4 mt-4 rounded">
				{{ $message }}
			</div>
		@endif
		<table class="min-w-full bg-white shadow-md rounded my-6">
			<thead>
				<tr>
					<th class="py-2 px-4 border-b">ID</th>
					<th class="py-2 px-4 border-b">ISBN</th>
					<th class="py-2 px-4 border-b">Título</th>
					<th class="py-2 px-4 border-b">Autor</th>
					<th class="py-2 px-4 border-b">Editorial</th>
					<th class="py-2 px-4 border-b">Edición</th>
					<th class="py-2 px-4 border-b">Año</th>
					<th class="py-2 px-4 border-b">Acción</th>
				</tr>
			</thead>
			<tbody class="text-center">
				@foreach ($books as $book)
				<tr>
					<td class="py-2 px-4 border-b">{{ $book->id }}</td>
					<td class="py-2 px-4 border-b">{{ $book->ISBN }}</td>
					<td class="py-2 px-4 border-b">{{ $book->title }}</td>
					<td class="py-2 px-4 border-b">{{ $book->author }}</td>
					<td class="py-2 px-4 border-b">{{ $book->publisher }}</td>
					<td class="py-2 px-4 border-b">{{ $book->edition }}</td>
					<td class="py-2 px-4 border-b">{{ $book->year }}</td>
					<td class="py-2 px-4 border-b space-x-2">
						<a 
							href="{{ route('books.show', $book->id) }}" 
							class="bg-green-500 text-white px-2 py-1 rounded"
						>
							Ver
						</a>
						<a 
							href="{{ route('books.edit', $book->id) }}" 
							class="bg-yellow-500 text-white px-2 py-1 rounded"
						>
							Editar
						</a>
						<form 
							action="{{ route('books.destroy', $book->id) }}" 
							method="POST" 
							class="inline-block"
						>
							@csrf
							@method('DELETE')
							
							<button 
								type="submit" 
								class="bg-red-500 text-white px-2 py-1 rounded"
							>
								Eliminar
							</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<a 
			href="{{ route('books.create') }}" 
			class="bg-blue-500 text-white px-4 py-2 rounded"
		>
			Crear Nuevo Libro
		</a>
	</div>
</body>

</html>