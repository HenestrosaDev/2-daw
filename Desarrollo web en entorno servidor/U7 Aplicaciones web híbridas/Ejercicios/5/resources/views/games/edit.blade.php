@extends('layouts.app')

@section('content')
	<div class="mx-auto mb-4 max-w-2xl px-8 pb-8 pt-6">
		<h2 class="mb-6 text-center text-3xl font-bold">Editar Juego</h2>

		<form
			action="{{ route('games.update', $game->id) }}"
			method="POST"
			class="rounded bg-white p-6 shadow-md"
		>
			@csrf
			@method('PUT')

			<div class="space-y-4 sm:grid sm:grid-cols-2 sm:gap-4 sm:space-y-0">
				<div>
					<label
						for="isan"
						class="mb-2 block text-sm font-bold text-gray-700"
					>
						ISAN
					</label>

					<input
						id="isan"
						name="isan"
						value="{{ old('isan', $game->isan) }}"
						type="text"
						placeholder="Introduce el ISAN"
						class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
					/>

					@error('isan')
						<p class="text-xs italic text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label
						for="title"
						class="mb-2 block text-sm font-bold text-gray-700"
					>
						Título
					</label>

					<input
						id="title"
						name="title"
						value="{{ old('title', $game->title) }}"
						type="text"
						placeholder="Introduce el título"
						class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
					/>

					@error('title')
						<p class="text-xs italic text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label
						for="developer"
						class="mb-2 block text-sm font-bold text-gray-700"
					>
						Desarrolladora
					</label>

					<input
						id="developer"
						name="developer"
						value="{{ old('developer', $game->developer) }}"
						type="text"
						placeholder="Introduce la desarrolladora"
						class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
					/>

					@error('developer')
						<p class="text-xs italic text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label
						for="distributor"
						class="mb-2 block text-sm font-bold text-gray-700"
					>
						Distribuidora
					</label>

					<input
						id="distributor"
						name="distributor"
						value="{{ old('distributor', $game->distributor) }}"
						type="text"
						placeholder="Introduce la distribuidora"
						class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
					/>

					@error('distributor')
						<p class="text-xs italic text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label
						for="genre"
						class="mb-2 block text-sm font-bold text-gray-700"
					>
						Género
					</label>

					<input
						id="genre"
						name="genre"
						value="{{ old('genre', $game->genre) }}"
						type="text"
						placeholder="Introduce el género"
						class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
					/>

					@error('genre')
						<p class="text-xs italic text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label
						for="year"
						class="mb-2 block text-sm font-bold text-gray-700"
					>
						Año
					</label>

					<input
						id="year"
						name="year"
						value="{{ old('year', $game->year) }}"
						type="number"
						placeholder="Introduce el año"
						class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
					/>

					@error('year')
						<p class="text-xs italic text-red-500">{{ $message }}</p>
					@enderror
				</div>
			</div>

			<div class="mt-6 flex items-center justify-between">
				<button
					type="submit"
					class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none"
				>
					Actualizar
				</button>

				<a
					href="{{ route('games.admin.index') }}"
					class="inline-block align-baseline text-sm font-bold text-red-500 hover:text-red-800"
				>
					Cancelar
				</a>
			</div>
		</form>
	</div>
@endsection
