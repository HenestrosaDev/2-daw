<!DOCTYPE html>
<html>

<head>
	<title>Editar Libro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-8">
	<div class="max-w-lg mx-auto">
		<h1 class="text-3xl font-bold mb-6">Editar Libro</h1>

		@if ($errors->any())
			<div class="bg-red-500 text-white p-4 mb-6 rounded">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<form
			action="{{ route('books.update', $book->id) }}"
			method="POST"
			class="bg-white p-6 rounded shadow-md"
		>
			@csrf 
			@method('PUT')
			
			<div class="space-y-4 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-4 sm:gap-y-6">
				<div>
					<label
						for="ISBN"
						class="block text-gray-700"
					>
						ISBN
					</label>
					<input
						id="ISBN"
						name="ISBN"
						value="{{ $book->ISBN }}"
						type="text"
						class="w-full px-4 py-2 border rounded"
					/>
				</div>

				<div>
					<label
						for="title"
						class="block text-gray-700"
					>
						Título
					</label>
					<input
						type="text"
						name="title"
						id="title"
						class="w-full px-4 py-2 border rounded"
						value="{{ $book->title }}"
					/>
				</div>

				<div>
					<label
						for="author"
						class="block text-gray-700"
					>
						Autor
					</label>
					<input
						id="author"
						name="author"
						value="{{ $book->author }}"
						type="text"
						class="w-full px-4 py-2 border rounded"
					/>
				</div>

				<div>
					<label
						for="publisher"
						class="block text-gray-700"
					>
						Editorial
					</label>
					<input
						id="publisher"
						name="publisher"
						value="{{ $book->publisher }}"
						type="text"
						class="w-full px-4 py-2 border rounded"
					/>
				</div>

				<div>
					<label
						for="edition"
						class="block text-gray-700"
					>
						Edición
					</label>
					<input
						id="edition"
						name="edition"
						value="{{ $book->edition }}"
						type="text"
						class="w-full px-4 py-2 border rounded"
					/>
				</div>

				<div>
					<label
						for="year"
						class="block text-gray-700"
					>
						Año
					</label>
					<input
						id="year"
						name="year"
						value="{{ $book->year }}"
						type="text"
						class="w-full px-4 py-2 border rounded"
					/>
				</div>
			</div>

			<button
				type="submit"
				class="bg-blue-500 text-white px-4 py-2 rounded sm:col-span-2 w-full mt-8"
			>
				Enviar
			</button>
		</form>
	</div>
</body>


</html>