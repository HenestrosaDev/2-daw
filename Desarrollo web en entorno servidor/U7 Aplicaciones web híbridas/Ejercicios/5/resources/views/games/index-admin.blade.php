@extends('layouts.app')

@section('content')
	<div class="mb-4 px-8 pb-8 pt-6">
		<h2 class="mb-6 text-center text-3xl font-bold">Admin</h2>

		<div class="my-6 overflow-auto rounded bg-white shadow-md">
			<table class="w-full min-w-max table-auto">
				<thead>
					<tr class="bg-gray-200 text-sm uppercase leading-normal text-gray-600">
						<th class="px-6 py-3 text-left">ISAN</th>
						<th class="px-6 py-3 text-left">Título</th>
						<th class="px-6 py-3 text-left">Desarrolladora</th>
						<th class="px-6 py-3 text-left">Distribuidora</th>
						<th class="px-6 py-3 text-left">Género</th>
						<th class="px-6 py-3 text-center">Año</th>
						<th class="px-6 py-3 text-center">Acciones</th>
					</tr>
				</thead>
				<tbody class="text-sm text-gray-600">
					@foreach ($games as $game)
						<tr class="border-b border-gray-200 hover:bg-gray-100">
							<td class="whitespace-nowrap px-6 py-3 text-left">{{ $game->isan }}</td>
							<td class="px-6 py-3 text-left">{{ $game->title }}</td>
							<td class="px-6 py-3 text-left">{{ $game->developer }}</td>
							<td class="px-6 py-3 text-left">{{ $game->distributor }}</td>
							<td class="px-6 py-3 text-left">{{ $game->genre }}</td>
							<td class="px-6 py-3 text-center">{{ $game->year }}</td>
							<td class="px-6 py-3 text-center">
								<div class="item-center flex justify-center space-x-2">
									<a
										href="{{ route('games.edit', $game->id) }}"
										class="rounded bg-yellow-500 px-2 py-1 text-white"
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
											class="rounded bg-red-500 px-2 py-1 text-white"
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
