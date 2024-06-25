@extends('layouts.app')

@section('content')
	<div class="px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto">
		<h1 class="text-3xl font-bold mb-6 text-center">Nuevo Producto</h1>

		<form
			action="{{ route('productos.store') }}"
			method="POST"
			class="rounded shadow-md bg-white p-6"
		>
			@csrf

			<div class="space-y-4">
				<div>
					<label 
						for="codigo_fabricante"
						class="block text-gray-700 text-sm font-bold mb-2"
					>
						Fabricante
					</label>

					<select
						id="codigo_fabricante"
						name="codigo_fabricante"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						required
					>
						@foreach ($fabricantes as $fabricante)
							<option value="{{ $fabricante->codigo }}">
								{{ $fabricante->nombre }}
							</option>
						@endforeach
					</select>

					@error('codigo_fabricante')
						<p class="text-red-500 text-xs italic">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label 
						for="nombre"
						class="block text-gray-700 text-sm font-bold mb-2"
					>	
						Nombre
					</label>

					<input
						id="nombre"
						name="nombre"
						type="text"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						required
					/>

					@error('nombre')
						<p class="text-red-500 text-xs italic">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label 
						for="precio"
						class="block text-gray-700 text-sm font-bold mb-2"
					>
						Precio
					</label>

					<input
						id="precio"
						name="precio"
						type="number"
						step="0.01"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						required
					/>

					@error('precio')
						<p class="text-red-500 text-xs italic">{{ $message }}</p>
					@enderror
				</div>
			</div>

			<div class="flex items-center justify-between mt-6">
				<button
					type="submit"
					class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
				>
					Guardar
				</button>
				
				<a
					href="{{ url()->previous() }}"
					class="inline-block align-baseline font-bold text-sm text-red-500 hover:text-red-800"
				>
					Cancelar
				</a>
			</div>
		</form>
	</div>
@endsection