@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4 py-8">
		<h2 class="mb-4 text-3xl font-bold">Lista de Profesores</h2>

		@if ($profesores->isEmpty())
			<p>No hay profesores registrados.</p>
		@else
			<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
				@foreach ($profesores as $profesor)
					<div class="rounded-lg bg-white p-4 shadow-md">
						<h3 class="mb-2 text-lg font-semibold">{{ $profesor->nombreCompleto }}</h3>
						<p>Email: {{ $profesor->email }}</p>
					</div>
				@endforeach
			</div>
		@endif
	</div>
@endsection
