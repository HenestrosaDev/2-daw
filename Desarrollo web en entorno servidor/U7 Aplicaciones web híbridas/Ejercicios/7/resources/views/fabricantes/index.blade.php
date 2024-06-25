@extends('layouts.app')

@section('content')
	<div class="container mx-auto py-6">
		<h1 class="text-3xl font-bold mb-6 text-center">Fabricantes</h1>

		<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
			<ul class="divide-y divide-gray-200">
				@forelse ($fabricantes as $fabricante)
					<li class="px-4 py-3">
						<div class="flex items-center justify-between">
							<div>
								<a 
									href="{{ route('fabricantes.show', $fabricante) }}"
									class="underline"
								>
									{{ $fabricante->nombre }}
								</a>
							</div>

							@if (Auth::user()->isAdmin())
								<div class="ml-4 flex justify-center items-center space-x-4">
									<a
										href="{{ route('fabricantes.edit', $fabricante) }}"
										class="text-sm text-gray-500 hover:text-gray-700"
									>
										Editar
									</a>

									<form
										action="{{ route('fabricantes.destroy', $fabricante) }}"
										method="POST"
									>
										@csrf 
										@method('DELETE')

										<button
											type="submit"
											class="text-sm text-red-500 hover:text-red-700 focus:outline-none"
											onclick="return confirm('¿Estás seguro de querer eliminar este fabricante?')"
										>
											Eliminar
										</button>
									</form>
								</div>
							@endif
						</div>
					</li>
				@empty
					<li class="px-4 py-3">
						<p class="text-gray-500">No hay fabricantes registrados.</p>
					</li>
				@endforelse
			</ul>
		</div>

		@if (Auth::user()->isAdmin())
			<a
				href="{{ route('fabricantes.create') }}"
				class="inline-block text-white hover:text-gray-300 bg-blue-500 py-2 px-3 rounded font-bold mt-6"
			>
				Añadir fabricante
			</a>
		@endif
	</div>
@endsection