@extends('layouts.app')

@section('content')
	<div class="container">
		<h1 class="mb-4 mt-6 text-3xl font-bold">Crear Hilo</h1>
		<form
			action="{{ route('thread.store') }}"
			method="POST"
		>
			@csrf

			<div class="mt-4 mb-6 space-y-4">
				<div>
					<label
						for="title"
						class="mb-2 block font-bold text-gray-700"
					>
						Título	
					</label>

					<input
						id="title"
						type="text"
						name="title"
						class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
						required
					>
				</div>

				<div>
					<label
						for="body"
						class="mb-2 block font-bold text-gray-700"
					>
						Mensaje
					</label>

					<textarea
					 id="body"
					 name="body"
					 rows="5"
					 class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
					 required
					></textarea>
				</div>

			</div>
			
			<button
				type="submit"
				class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
			>
				Crear hilo
			</button>
		</form>
	</div>
@endsection
