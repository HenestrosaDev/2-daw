@extends('layouts.app')

@section('content')
	<div class="container my-6 rounded bg-white p-6 shadow-md">
		<div>
			<h1 class="text-3xl font-bold text-blue-600">{{ $thread->title }}</h1>
			<p class="mt-2 whitespace-pre-wrap text-lg">{{ $thread->body }}</p>
			<p class="mt-3 text-sm text-gray-500">
				Publicado por {{ $thread->user->name }} el
				{{ $thread->created_at->format('d M, Y') }}
			</p>
		</div>

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

					@if ($thread->likes()->where('user_id', auth()->id())->exists())
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

		<hr class="my-6">

		<div class="replies">
			<h2 class="text-xl font-bold">Respuestas</h2>

			@if (!$thread->is_empty)
				<div class="divide-y">

					@forelse ($thread->replies as $reply)
						<div class="reply mt-2 pt-3">
							<p class="text-sm text-gray-500">
								Respuesta de {{ $reply->user->name }} publicada
								el {{ $reply->created_at->format('d M, Y') }}
							</p>
							<p class="whitespace-pre-wrap">{{ $reply->body }}</p>

							<div class="mt-2.5 flex items-center space-x-3">
								<span class="text-gray-600">
									{{ $reply->likesCount }}
									{{ Str::plural('me gusta', $reply->likesCount) }}
								</span>
								@auth
									@if ($reply->user_id == auth()->id() || Auth::user()->isAdmin())
										<form
											action="{{ route('reply.destroy', [$thread, $reply]) }}"
											method="POST"
											class="inline"
										>
											@csrf
											@method('DELETE')
											<button
												type="submit"
												class="text-red-500"
											>
												Eliminar
											</button>
										</form>
									@endif

									@if ($reply->getLikeByUser())
										<form
											action="{{ route('reply.unlike', $reply) }}"
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
											action="{{ route('reply.like', $reply) }}"
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
								@endauth
							</div>
						</div>
					@empty
						<p class="mt-2">No hay respuestas para este hilo. ¡Sé el primero en comentar!</p>
					@endforelse
				</div>
		</div>
		@endif

		@auth
			<div class="mt-6">
				<form
					action="{{ route('reply.store', $thread) }}"
					method="POST"
				>
					@csrf
					<div class="mb-2">
						<label
							for="body"
							class="mb-2 block font-bold text-gray-700"
						>
							Escribe tu respuesta
						</label>
						<textarea
						 id="body"
						 name="body"
						 rows="5"
						 class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
						 required
						></textarea>
					</div>
					<div>
						<button
							type="submit"
							class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
						>
							Publicar respuesta
						</button>
					</div>
				</form>
			</div>
		@endauth
	</div>
@endsection
