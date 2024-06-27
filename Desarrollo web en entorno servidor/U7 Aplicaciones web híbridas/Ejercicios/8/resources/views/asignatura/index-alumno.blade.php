@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4 py-8">
		<h2 class="mb-4 text-3xl font-bold">Asignaturas</h2>

		@if (session('success'))
			<div class="mb-4 rounded bg-green-200 p-3 text-green-800">
				{{ session('success') }}
			</div>
		@endif

		<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
			@forelse ($asignaturas as $asignatura)
				<div class="rounded-lg bg-white p-4 shadow-md">
					<h3 class="mb-2 text-lg font-semibold">{{ $asignatura->nombre }}</h3>
					<p class="mb-4 text-gray-600">
						Profesor: {{ $asignatura->profesor->nombreCompleto }}
					</p>

					@if (!$asignatura->isEnrolled(Auth::id()))
						<form
							action="{{ route('asignatura.enroll', $asignatura->id) }}"
							method="POST"
						>
							@csrf
							<button
								type="submit"
								class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
							>
								Inscribirse
							</button>
						</form>
					@else
						<span
							type="submit"
							class="rounded border border-blue-500 px-4 py-2 font-bold"
						>
							¡Ya estás inscrito!
						</span>
					@endif
				</div>
			@empty
				<p>No hay asignaturas disponibles.</p>
			@endforelse
		</div>
	</div>
@endsection
