@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4 py-8">
		<h2 class="mb-4 text-3xl font-bold">Todas las Asignaturas</h2>

		@if ($asignaturas->isEmpty())
			<p>No hay asignaturas disponibles.</p>
		@else
			<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
				@foreach ($asignaturas as $asignatura)
					<div class="rounded-lg bg-white p-4 shadow-md">
						<h3 class="mb-2 text-lg font-semibold">{{ $asignatura->nombre }}</h3>
						<p>Profesor: {{ $asignatura->profesor->nombreCompleto }}</p>
						<a
							href="{{ route('asignatura.show', $asignatura->id) }}"
							class="text-blue-500 hover:underline"
						>
							Ver detalles
						</a>
					</div>
				@endforeach
			</div>
		@endif
	</div>
@endsection
