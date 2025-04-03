@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4 py-8">
		<h2 class="mb-4 text-3xl font-bold">Mis Asignaturas</h2>

		@if (session('success'))
			<div class="mb-4 rounded bg-green-200 p-3 text-green-800">
				{{ session('success') }}
			</div>
		@endif

		@if ($asignaturas->isEmpty())
			<p>No has creado ninguna asignatura.</p>
		@else
			<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
				@foreach ($asignaturas as $asignatura)
					<div class="rounded-lg bg-white p-4 shadow-md">
						<h3 class="mb-2 text-lg font-semibold">{{ $asignatura->nombre }}</h3>
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

		<a
			href="{{ route('asignatura.create') }}"
			class="inline-block text-white hover:text-gray-300 bg-blue-500 py-2 px-3 rounded font-bold mt-6"
		>
			Añadir asignatura
		</a>
	</div>
@endsection
