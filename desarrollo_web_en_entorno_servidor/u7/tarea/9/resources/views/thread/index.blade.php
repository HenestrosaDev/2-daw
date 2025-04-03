@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4">
		<div class="mb-4 mt-6 flex items-center justify-between">
			<h1 class="text-3xl font-bold">Hilos</h1>
			@auth
				<a
					href="{{ route('thread.create') }}"
					class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
				>
					Crear hilo
				</a>
			@endauth
		</div>

		@if (session('status'))
			<div class="mb-4 rounded bg-green-500 px-4 py-2 text-white shadow-md">
				{{ session('status') }}
			</div>
		@endif

		@forelse ($threads as $thread)
			<div class="mb-4 rounded-lg bg-white p-6 shadow-md">
				<h2 class="text-2xl font-bold">
					<a
						href="{{ route('thread.show', $thread) }}"
						class="text-blue-600 hover:underline"
					>
						{{ $thread->title }}
					</a>
				</h2>
				<p class="mt-1 text-gray-700">{{ Str::limit($thread->body, 150) }}</p>
				<p class="mt-2 text-sm text-gray-500">
					Publicado por <span class="font-semibold">{{ $thread->user->name }}</span>
					el {{ $thread->created_at->format('d M, Y') }}
				</p>
				<div class="mt-4 flex items-center justify-between">
					<div>
						<span class="text-gray-600">
							{{ $thread->repliesCount }}
							{{ Str::plural('respuesta', $thread->repliesCount) }}
						</span>
						<span class="ml-4 text-gray-600">
							{{ $thread->likesCount }}
							{{ Str::plural('me gusta', $thread->likesCount) }}
						</span>
					</div>
					@auth
						<div class="flex space-x-4">
							@if ($thread->user_id == auth()->id() || Auth::user()->isAdmin())
								<div>
									<form
										action="{{ route('thread.destroy', $thread) }}"
										method="POST"
									>
										@csrf
										@method('DELETE')

										<button
											type="submit"
											class="text-red-500"
										>
											Eliminar hilo
										</button>
									</form>
								</div>
							@endif

							@if ($thread->getLikeByUser())
								<form
									action="{{ route('thread.unlike', $thread) }}"
									method="POST"
									class="inline"
								>
									@csrf
									@method('DELETE')

									<button
										type="submit"
										class="text-red-500"
									>
										Ya no me gusta
									</button>
								</form>
							@else
								<form
									action="{{ route('thread.like', $thread) }}"
									method="POST"
									class="inline"
								>
									@csrf

									<button
										type="submit"
										class="text-blue-500"
									>
										Me gusta
									</button>
								</form>
							@endif
						</div>

					@endauth
				</div>
			</div>
		@empty
			<p class="mt-2">No hay hilos creados. ¡Sé el primero en crear uno!</p>
		@endforelse

		{{ $threads->links() }}
	</div>
@endsection
