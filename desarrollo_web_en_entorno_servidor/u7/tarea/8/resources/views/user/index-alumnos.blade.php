@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4 py-8">
		<h2 class="mb-4 text-3xl font-bold">Lista de Alumnos</h2>

		@if ($alumnos->isEmpty())
			<p>No hay alumnos registrados.</p>
		@else
			<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
				@foreach ($alumnos as $alumno)
					<div class="rounded-lg bg-white p-4 shadow-md">
						<h3 class="mb-2 text-lg font-semibold">{{ $alumno->nombreCompleto }}</h3>
						<p>Email: {{ $alumno->email }}</p>
					</div>
				@endforeach
			</div>
		@endif
	</div>
@endsection
