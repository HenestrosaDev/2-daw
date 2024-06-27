@extends('layouts.app')

@section('content')
	<div class="mx-auto mb-4 max-w-2xl px-8 pb-8 pt-6">
		<h1 class="mb-6 text-center text-3xl font-bold">Nueva Asignatura</h1>

		@if (session('success'))
			<div class="mb-4 rounded bg-green-200 p-3 text-green-800">
				{{ session('success') }}
			</div>
		@endif

		<form
			action="{{ route('asignatura.store') }}"
			method="POST"
			class="rounded bg-white p-6 shadow-md"
		>
			@csrf

			<div class="space-y-4">
				<div>
					<label
						for="profesor_id"
						class="mb-2 block text-sm font-bold text-gray-700"
					>
						Profesor
					</label>

					<select
						id="profesor_id"
						name="profesor_id"
						class="w-full rounded border-slate-200 bg-slate-50 text-slate-500 shadow-none"
						required
						onmousedown="event.preventDefault()"
					>
						<option
							value="{{ Auth::user()->id }}"
							selected="selected"
						>
							{{ Auth::user()->nombre }}
						</option>
					</select>

					@error('profesor_id')
						<p class="text-xs italic text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label
						for="nombre"
						class="mb-2 block text-sm font-bold text-gray-700"
					>
						Nombre
					</label>

					<input
						id="nombre"
						name="nombre"
						type="text"
						placeholder="Introduce el nombre"
						class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
						required
					>

					@error('nombre')
						<p class="text-xs italic text-red-500">{{ $message }}</p>
					@enderror
				</div>
			</div>

			<div class="mt-6 flex items-center justify-between">
				<button
					type="submit"
					class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none"
				>
					Añadir
				</button>

				<a
					href="{{ route('asignatura.index.profesor') }}"
					class="inline-block align-baseline text-sm font-bold text-red-500 hover:text-red-800"
				>
					Cancelar
				</a>
			</div>
		</form>
	</div>
@endsection
