@extends('layouts.app') 

@section('content')
	<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
		<h2 class="text-3xl font-bold mb-4">Tienda de Videojuegos</h2>

		<p class="text-lg mb-4">
			Explora una amplia gama de videojuegos de diversos géneros y desarrolladores.
		</p>

		<p class="mb-8">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet
			erat eget lacus mollis suscipit. Integer at scelerisque libero. Cras non
			orci a lorem convallis sollicitudin.
		</p>

		<a 
			href="{{ route('games.index') }}"
			class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
		>
			Explorar juegos
		</a>
	</div>
@endsection