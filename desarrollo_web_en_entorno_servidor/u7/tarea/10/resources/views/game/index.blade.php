@extends('layouts.app')

@section('content')
	<div class="container mx-auto my-6 space-y-7 px-4">
		<section>
			<h2 class="mb-3 text-2xl font-bold">Desafía a un usuario</h2>
			<form
				method="POST"
				action="{{ route('game.challenge') }}"
			>
				@csrf

				<div class="mb-4 w-full space-y-4 sm:flex sm:space-x-4 sm:space-y-0">
					<div class="w-full">
						<label
							for="challenged_id"
							class="block text-gray-700"
						>
							Usuario a retar
						</label>
						<select
							id="challenged_id"
							name="challenged_id"
							class="form-select mt-1 block w-full rounded"
							required
						>
							<option value="">Elige usuario…</option>
							@foreach ($users as $user)
								@if ($user->id !== auth()->id())
									<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endif
							@endforeach
						</select>
					</div>

					<div class="w-full">
						<label
							for="choice"
							class="block text-gray-700"
						>
							Tu elección
						</label>
						<select
							id="choice"
							name="choice"
							class="form-select mt-1 block w-full rounded"
							required
						>
							<option value="rock">{{ Str::title(__('views.rock')) }}</option>
							<option value="paper">{{ Str::title(__('views.paper')) }}</option>
							<option value="scissors">{{ Str::title(__('views.scissors')) }}</option>
							<option value="lizard">{{ Str::title(__('views.lizard')) }}</option>
							<option value="spock">{{ Str::title(__('views.spock')) }}</option>
						</select>
					</div>

					<div class="sm:!mt-auto">
						<button
							type="submit"
							class="rounded bg-blue-500 px-4 py-2 text-white"
						>
							Retar
						</button>
					</div>
				</div>
			</form>
		</section>

		<section>
			<h2 class="mb-2 text-2xl font-bold">Tus estadísticas</h2>

			<div class="mb-1">
				<p>Porcentaje de victorias: {{ number_format($winPercentage, 2) }}%</p>
			</div>

			<div>
				<a
					href="{{ route('game.rankings') }}"
					class="text-blue-500"
				>
					Ver rankings
				</a>
			</div>
		</section>

		<section>
			<h2 class="mb-4 text-2xl font-bold">Partidas</h2>

			<div class="overflow-auto">
				<table class="min-w-full rounded-lg bg-white">
					<thead>
						<tr class="bg-gray-200 text-left">
							<th class="rounded-tl-lg px-4 py-2">Retador</th>
							<th class="px-4 py-2">Retado</th>
							<th class="px-4 py-2">Elección del Retador</th>
							<th class="px-4 py-2">Elección del Retado</th>
							<th class="rounded-tr-lg px-4 py-2">Resultado</th>
						</tr>
					</thead>
					<tbody class="divide-y">
						@foreach ($games as $game)
							<tr>
								<td class="px-4 py-2">{{ $game->challenger->name }}</td>
								<td class="px-4 py-2">{{ $game->challenged->name }}</td>
								<td class="px-4 py-2">
									@if ($game->result || $game->challenger->id == auth()->id())
										{{ Str::title(__("views.$game->challenger_choice")) }}
									@else
										?
									@endif
								</td>
								<td class="px-4 py-2">
									@if ($game->challenged_choice)
										{{ Str::title(__("views.$game->challenged_choice")) }}
									@elseif ($game->challenged_id == auth()->id())
										<form
											method="POST"
											action="{{ route('game.respond', $game->id) }}"
											class="flex"
										>
											@csrf

											<select
												name="choice"
												class="mr-2.5 h-fit w-full rounded px-2 py-1"
												required
											>
												<option value="rock">{{ Str::title(__('views.rock')) }}</option>
												<option value="paper">{{ Str::title(__('views.paper')) }}</option>
												<option value="scissors">{{ Str::title(__('views.scissors')) }}</option>
												<option value="lizard">{{ Str::title(__('views.lizard')) }}</option>
												<option value="spock">{{ Str::title(__('views.spock')) }}</option>
											</select>

											<button
												type="submit"
												class="rounded bg-green-500 px-2 py-1 text-white hover:bg-green-700"
											>
												Enviar
											</button>
										</form>
									@else
										{{ Str::title(__('views.pending')) }}
									@endif
								</td>
								<td class="px-4 py-2">
								{{ Str::title(__($game->result ? "views.$game->result" : 'views.pending')) }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</section>
	</div>
@endsection
