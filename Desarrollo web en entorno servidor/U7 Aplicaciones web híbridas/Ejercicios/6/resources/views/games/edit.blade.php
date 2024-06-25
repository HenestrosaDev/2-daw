@extends('layouts.app')

@section('content')
	<div class="px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto">
		<h2 class="text-3xl font-bold mb-6 text-center">Editar Juego</h2>

		<form
			action="{{ route('games.update', $game->id) }}"
			method="POST"
			class="rounded shadow-md bg-white p-6"
		>
			@csrf 
			@method('PUT')

			<div class="space-y-4 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-4">
				<div>
					<label
						for="isan"
						class="block text-gray-700 text-sm font-bold mb-2"
					>
						ISAN
					</label>

					<input
						id="isan"
						name="isan"
						value="{{ old('isan', $game->isan) }}"
						type="text"
						placeholder="Introduce el ISAN"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					/>

					@error('isan')
						<p class="text-red-500 text-xs italic">{{ $message }}</p>
					@enderror
				</div>

				<div >
					<label
						for="title"
						class="block text-gray-700 text-sm font-bold mb-2"
					>
						Título
					</label>

					<input
						id="title"
						name="title"
						value="{{ old('title', $game->title) }}"
						type="text"
						placeholder="Introduce el título"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					/>

					@error('title')
						<p class="text-red-500 text-xs italic">{{ $message }}</p>
					@enderror
				</div>

				<div >
					<label
						for="developer"
						class="block text-gray-700 text-sm font-bold mb-2"
					>
						Desarrolladora
					</label>

					<input
						id="developer"
						name="developer"
						value="{{ old('developer', $game->developer) }}"
						type="text"
						placeholder="Introduce la desarrolladora"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					/>

					@error('developer')
						<p class="text-red-500 text-xs italic">{{ $message }}</p>
					@enderror
				</div>

				<div >
					<label
						for="distributor"
						class="block text-gray-700 text-sm font-bold mb-2"
					>
						Distribuidora
					</label>

					<input
						id="distributor"
						name="distributor"
						value="{{ old('distributor', $game->distributor) }}"
						type="text"
						placeholder="Introduce la distribuidora"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					/>

					@error('distributor')
						<p class="text-red-500 text-xs italic">{{ $message }}</p>
					@enderror
				</div>

				<div >
					<label
						for="genre"
						class="block text-gray-700 text-sm font-bold mb-2"
					>
						Género
					</label>

					<input
						id="genre"
						name="genre"
						value="{{ old('genre', $game->genre) }}"
						type="text"
						placeholder="Introduce el género"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					/>

					@error('genre')
						<p class="text-red-500 text-xs italic">{{ $message }}</p>
					@enderror
				</div>

				<div >
					<label
						for="year"
						class="block text-gray-700 text-sm font-bold mb-2"
					>
						Año
					</label>

					<input
						id="year"
						name="year"
						value="{{ old('year', $game->year) }}"
						type="number"
						placeholder="Introduce el año"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					/>

					@error('year')
						<p class="text-red-500 text-xs italic">{{ $message }}</p>
					@enderror
				</div>
			</div>

			<div class="flex items-center justify-between mt-6">
				<button
					type="submit"
					class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
				>
					Actualizar
				</button>

				<a
					href="{{ route('games.admin.index') }}"
					class="inline-block align-baseline font-bold text-sm text-red-500 hover:text-red-800"
				>
					Cancelar
				</a>
			</div>
		</form>
	</div>
@endsection