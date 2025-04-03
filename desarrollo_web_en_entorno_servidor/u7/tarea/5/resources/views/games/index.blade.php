@extends('layouts.app')

@section('content')
	<div class="mb-4 px-8 pb-8 pt-6">
		<h2 class="mb-6 text-center text-3xl font-bold">Juegos</h2>

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
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
