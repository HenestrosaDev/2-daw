@extends("layouts.plantilla-productos")

@section("header")
<h1 class="text-center">Leer registros</h1>
@endsection

@section("content")
<ul>
	@foreach($productos as $producto)
		<li><a href="{{route('productos.edit', $producto->id)}}"> {{$producto->nombre}} | {{$producto->seccion}} | {{$producto->precio}} | {{$producto->fecha}} | {{$producto->pais_origen}} | <img src="/img/{{$producto->img_path}}" width="150"/></a></li>
	@endforeach
</ul>
@endsection

@section("footer")
@endsection