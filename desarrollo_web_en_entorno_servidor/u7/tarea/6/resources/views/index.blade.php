@extends('layouts.app')

@section('content')
	<div class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-md">
		<h2 class="mb-4 text-3xl font-bold">Tienda de Videojuegos</h2>

		<p class="mb-4 text-lg">
			Explora una amplia gama de videojuegos de diversos géneros y desarrolladores.
		</p>

		<p class="mb-8">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet
			erat eget lacus mollis suscipit. Integer at scelerisque libero. Cras non
			orci a lorem convallis sollicitudin.
		</p>

		<a
			href="{{ route('games.index') }}"
			class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none"
		>
			Explorar juegos
		</a>
	</div>
@endsection
