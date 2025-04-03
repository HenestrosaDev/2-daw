@extends("layouts.plantilla-productos")

@section("header")
<h1 class="text-center">Leer registro específico</h1>
@endsection

@section("content")
<p>{{$producto->nombre}}</p>
@endsection

@section("footer")
@endsection