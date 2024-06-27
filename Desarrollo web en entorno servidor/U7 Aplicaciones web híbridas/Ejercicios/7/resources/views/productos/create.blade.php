@extends('layouts.app')

@section('content')
	<div class="mx-auto mb-4 max-w-2xl px-8 pb-8 pt-6">
		<h1 class="mb-6 text-center text-3xl font-bold">Nuevo Producto</h1>

		<form
			action="{{ route('productos.store') }}"
			method="POST"
			class="rounded bg-white p-6 shadow-md"
		>
			@csrf

			<div class="space-y-4">
				<div>
					<label
						for="codigo_fabricante"
						class="mb-2 block text-sm font-bold text-gray-700"
					>
						Fabricante
					</label>

					<select
						id="codigo_fabricante"
						name="codigo_fabricante"
						class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
						required
					>
						@foreach ($fabricantes as $fabricante)
							<option value="{{ $fabricante->codigo }}">
								{{ $fabricante->nombre }}
							</option>
						@endforeach
					</select>

					@error('codigo_fabricante')
						<p class="text-xs italic text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label
						for="nombre"
						class="mb-2 block text-sm font-bold text-gray-700"
					>
						Nombre
					</label>

					<input
						id="nombre"
						name="nombre"
						type="text"
						class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
						required
					/>

					@error('nombre')
						<p class="text-xs italic text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label
						for="precio"
						class="mb-2 block text-sm font-bold text-gray-700"
					>
						Precio
					</label>

					<input
						id="precio"
						name="precio"
						type="number"
						step="0.01"
						class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
						required
					/>

					@error('precio')
						<p class="text-xs italic text-red-500">{{ $message }}</p>
					@enderror
				</div>
			</div>

			<div class="mt-6 flex items-center justify-between">
				<button
					type="submit"
					class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none"
				>
					Guardar
				</button>

				<a
					href="{{ url()->previous() }}"
					class="inline-block align-baseline text-sm font-bold text-red-500 hover:text-red-800"
				>
					Cancelar
				</a>
			</div>
		</form>
	</div>
@endsection
