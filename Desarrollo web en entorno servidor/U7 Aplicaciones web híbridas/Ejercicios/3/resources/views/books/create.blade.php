<!DOCTYPE html>
<html>

<head>
	<title>Crear Libro</title>
	@vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-8">
	<div class="max-w-lg mx-auto">
		<h1 class="text-3xl font-bold mb-6">Crear Libro</h1>
		
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
			action="{{ route('books.store') }}" 
			method="POST"
			class="bg-white p-6 rounded shadow-md"
		>
			@csrf

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
						value="{{ old('ISBN') }}"
						type="text" 
						class="w-full px-4 py-2 border rounded" 
					>
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
						value="{{ old('title') }}"
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
						value="{{ old('author') }}"
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
						value="{{ old('publisher') }}"
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
						type="text"
						name="edition"
						id="edition"
						class="w-full px-4 py-2 border rounded"
						value="{{ old('edition') }}"
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
						value="{{ old('year') }}"
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