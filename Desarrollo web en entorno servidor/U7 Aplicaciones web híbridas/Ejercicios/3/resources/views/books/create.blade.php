<!DOCTYPE html>
<html>

<head>
	<title>Crear Libro</title>
	@vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-8">
	<div class="mx-auto max-w-lg">
		<h1 class="mb-6 text-3xl font-bold">Crear Libro</h1>

		@if ($errors->any())
			<div class="mb-6 rounded bg-red-500 p-4 text-white">
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
			class="rounded bg-white p-6 shadow-md"
		>
			@csrf

			<div class="space-y-4 sm:grid sm:grid-cols-2 sm:gap-x-4 sm:gap-y-6 sm:space-y-0">
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
						class="w-full rounded border px-4 py-2"
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
						id="title"
						type="text"
						name="title"
						class="w-full rounded border px-4 py-2"
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
						class="w-full rounded border px-4 py-2"
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
						class="w-full rounded border px-4 py-2"
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
						type="text"
						name="edition"
						class="w-full rounded border px-4 py-2"
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
						class="w-full rounded border px-4 py-2"
					/>
				</div>
			</div>

			<button
				type="submit"
				class="mt-8 w-full rounded bg-blue-500 px-4 py-2 text-white sm:col-span-2"
			>
				Enviar
			</button>
		</form>
	</div>
</body>

</html>
