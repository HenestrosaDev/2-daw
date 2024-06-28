<!DOCTYPE html>
<html>

<head>
	<title>Libros</title>
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	>
	@vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-8">
	<div class="container mx-auto">
		<h1 class="mb-6 text-3xl font-bold">Libros</h1>

		@if ($message = Session::get('success'))
			<div class="mt-4 rounded bg-green-500 p-4 text-white">
				{{ $message }}
			</div>
		@endif
		<div class="overflow-auto">
			<table class="my-6 min-w-full rounded bg-white shadow-md">
				<thead>
					<tr>
						<th class="border-b px-4 py-2">ID</th>
						<th class="border-b px-4 py-2">ISBN</th>
						<th class="border-b px-4 py-2">Título</th>
						<th class="border-b px-4 py-2">Autor</th>
						<th class="border-b px-4 py-2">Editorial</th>
						<th class="border-b px-4 py-2">Edición</th>
						<th class="border-b px-4 py-2">Año</th>
						<th class="border-b px-4 py-2">Acción</th>
					</tr>
				</thead>
				<tbody class="text-center">
					@foreach ($books as $book)
						<tr>
							<td class="border-b px-4 py-2">{{ $book->id }}</td>
							<td class="border-b px-4 py-2">{{ $book->ISBN }}</td>
							<td class="border-b px-4 py-2">{{ $book->title }}</td>
							<td class="border-b px-4 py-2">{{ $book->author }}</td>
							<td class="border-b px-4 py-2">{{ $book->publisher }}</td>
							<td class="border-b px-4 py-2">{{ $book->edition }}</td>
							<td class="border-b px-4 py-2">{{ $book->year }}</td>
							<td class="space-x-2 border-b px-4 py-2">
								<a
									href="{{ route('books.show', $book->id) }}"
									class="rounded bg-green-500 px-2 py-1 text-white"
								>
									Ver
								</a>
								<a
									href="{{ route('books.edit', $book->id) }}"
									class="rounded bg-yellow-500 px-2 py-1 text-white"
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
										class="rounded bg-red-500 px-2 py-1 text-white"
									>
										Eliminar
									</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<a
			href="{{ route('books.create') }}"
			class="rounded bg-blue-500 px-4 py-2 text-white"
		>
			Crear Nuevo Libro
		</a>
	</div>
</body>

</html>
