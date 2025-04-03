@extends('layouts.app')

@section('content')
	<div class="container mx-auto my-6 px-4">
		<h1 class="mb-4 text-3xl font-bold">Rankings</h1>

		<div class="space-y-7">
			<section>
				<h2 class="mb-2 text-xl font-bold">Usuarios con más victorias</h2>

				<div class="overflow-auto">
					<table class="min-w-full rounded-lg bg-white">
						<thead>
							<tr class="bg-gray-200 text-left">
								<th class="rounded-tl-lg px-4 py-2">Usuario</th>
								<th class="px-4 py-2">Victorias</th>
								<th class="rounded-tr-lg px-4 py-2">Porcentaje de victorias</th>
							</tr>
						</thead>
						<tbody class="divide-y">
							@foreach ($mostWins as $user)
								<tr>
									<td class="px-4 py-2">{{ $user->name }}</td>
									<td class="px-4 py-2">{{ $user->wins }}</td>
									<td class="px-4 py-2">
										{{ $user->games_played > 0 ? number_format(($user->wins / $user->games_played) * 100, 2) : 0 }}%
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</section>

			<section>
				<h2 class="mb-2 text-xl font-bold">Usuarios con más partidas</h2>

				<div class="overflow-auto">
					<table class="min-w-full rounded-lg bg-white">
						<thead>
							<tr class="bg-gray-200 text-left">
								<th class="rounded-tl-lg px-4 py-2">Usuario</th>
								<th class="px-4 py-2">Partidas jugadas</th>
								<th class="rounded-tr-lg px-4 py-2">Porcentaje de victorias</th>
							</tr>
						</thead>
						<tbody class="divide-y">
							@foreach ($mostGames as $user)
								<tr>
									<td class="px-4 py-2">{{ $user->name }}</td>
									<td class="px-4 py-2">{{ $user->games_played }}</td>
									<td class="px-4 py-2">
										{{ $user->games_played > 0 ? number_format(($user->wins / $user->games_played) * 100, 2) : 0 }}%
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>
@endsection
