@extends('layouts.app')

@section('content')
	<div class="px-8 pt-6 pb-8 mb-4">
		<h2 class="text-3xl font-bold mb-6 text-center">Admin</h2>

		<div class="bg-white shadow-md rounded my-6">
			<table class="min-w-max w-full table-auto">
				<thead>
					<tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
						<th class="py-3 px-6 text-left">ISAN</th>
						<th class="py-3 px-6 text-left">Título</th>
						<th class="py-3 px-6 text-left">Desarrolladora</th>
						<th class="py-3 px-6 text-left">Distribuidora</th>
						<th class="py-3 px-6 text-left">Género</th>
						<th class="py-3 px-6 text-center">Año</th>
						<th class="py-3 px-6 text-center">Acciones</th>
					</tr>
				</thead>
				<tbody class="text-gray-600 text-sm">
					@foreach ($games as $game)
						<tr class="border-b border-gray-200 hover:bg-gray-100">
							<td class="py-3 px-6 text-left whitespace-nowrap">{{ $game->isan }}</td>
							<td class="py-3 px-6 text-left">{{ $game->title }}</td>
							<td class="py-3 px-6 text-left">{{ $game->developer }}</td>
							<td class="py-3 px-6 text-left">{{ $game->distributor }}</td>
							<td class="py-3 px-6 text-left">{{ $game->genre }}</td>
							<td class="py-3 px-6 text-center">{{ $game->year }}</td>
							<td class="py-3 px-6 text-center">
								<div class="flex item-center justify-center space-x-2">
									<a
										href="{{ route('games.edit', $game->id) }}"
										class="bg-yellow-500 text-white px-2 py-1 rounded"
									>
										Editar
									</a>
									<form
										action="{{ route('games.destroy', $game->id) }}"
										method="POST"
									>
										@csrf @method('DELETE')
										<button
											type="submit"
											class="bg-red-500 text-white px-2 py-1 rounded"
										>
											Eliminar
										</button>
									</form>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection