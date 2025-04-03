@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4 py-8">
		<h2 class="mb-4 text-3xl font-bold">Detalle de la Asignatura</h2>

		<div class="mb-6 rounded-lg bg-white p-6 shadow-md">
			<h3 class="text-xl font-semibold">{{ $asignatura->nombre }}</h3>
			<p class="text-gray-700">Profesor: {{ $asignatura->profesor->nombreCompleto }}</p>
		</div>

		<h3 class="mb-4 text-xl font-semibold">Alumnos Inscritos</h3>

		@if ($asignatura->alumnos->isEmpty())
			<p>No hay alumnos inscritos en esta asignatura.</p>
		@else
			<div class="overflow-auto rounded-lg bg-white p-6 shadow-md">
				<table class="min-w-full bg-white">
					<thead>
						<tr>
							<th class="py-2">ID</th>
							<th class="py-2">Nombre</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($asignatura->alumnos as $alumno)
							<tr>
								<td class="border px-4 py-2">{{ $alumno->id }}</td>
								<td class="border px-4 py-2">{{ $alumno->nombreCompleto }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif
	</div>
@endsection
