@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4">
		<div class="my-6">
			<h1 class="text-3xl font-bold">Panel de Control</h1>

			<div class="mt-4">
				<table class="min-w-full rounded-lg bg-white table-auto">
					<thead class="text-left">
						<tr class="bg-gray-200">
							<th class="px-4 py-2 rounded-tl-lg">Usuario</th>
							<th class="px-4 py-2">Hilos</th>
							<th class="px-4 py-2">Respuestas</th>
							<th class="px-4 py-2"><em>Me gusta</em> recibidos en hilos</th>
							<th class="px-4 py-2"><em>Me gusta</em> recibidos en respuestas</th>
							<th class="px-4 py-2 rounded-tr-lg"><em>Me gusta</em> recibidos en total</th>
						</tr>
					</thead>
					<tbody class="divide-y">
						@foreach ($users as $user)
							<tr>
								<td class="px-4 py-2">{{ $user->name }}</td>
								<td class="px-4 py-2">{{ $user->threads_count }}</td>
								<td class="px-4 py-2">{{ $user->replies_count }}</td>
								<td class="px-4 py-2">{{ $user->thread_likes_received }}</td>
								<td class="px-4 py-2">{{ $user->reply_likes_received }}</td>
								<td class="px-4 py-2">{{ $user->total_likes_received }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
