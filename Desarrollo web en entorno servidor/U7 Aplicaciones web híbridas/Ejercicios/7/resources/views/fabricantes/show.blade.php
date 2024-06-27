@extends('layouts.app')

@section('content')
	<div class="container mx-auto py-6">
		<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
			<div class="border-b border-gray-200 bg-white p-6">
				<h1 class="mb-4 text-3xl font-semibold">{{ $fabricante->nombre }}</h1>

				<div class="mb-4">
					<h2 class="text-2xl font-medium text-gray-700">Productos</h2>

					@if ($fabricante->productos->isEmpty())
						<p class="text-gray-500">
							Este fabricante no tiene productos asociados.
						</p>
					@else
						<ul class="divide-y divide-gray-200">
							@foreach ($fabricante->productos as $producto)
								<li class="flex items-center justify-between py-3">
									<div>
										<p class="text-lg font-semibold text-gray-700">
											{{ $producto->nombre }}
										</p>
										<p class="text-sm text-gray-500">
											Precio: {{ number_format($producto->precio, 2) }}€
										</p>
									</div>

									@if (Auth::user()->isAdmin())
										<div class="flex items-center justify-center space-x-4">
											<a
												href="{{ route('productos.edit', $producto) }}"
												class="text-sm text-blue-500 hover:text-blue-700"
											>
												Editar
											</a>

											<form
												action="{{ route('productos.destroy', $producto) }}"
												method="POST"
											>
												@csrf
												@method('DELETE')

												<button
													type="submit"
													class="text-sm text-red-500 hover:text-red-700 focus:outline-none"
												>
													Eliminar
												</button>
											</form>
										</div>
									@endif
								</li>
							@endforeach
						</ul>
					@endif
				</div>

				@if (Auth::user()->isAdmin())
					<div class="mt-6">
						<a
							href="{{ route('productos.create', ['fabricante_id' => $fabricante->id]) }}"
							class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
						>
							Añadir Producto
						</a>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection
