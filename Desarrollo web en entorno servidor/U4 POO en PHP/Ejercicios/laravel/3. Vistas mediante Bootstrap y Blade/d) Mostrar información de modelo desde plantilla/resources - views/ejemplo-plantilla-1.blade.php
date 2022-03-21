@extends("layouts.plantilla")

@section("header")
<h1>Ejemplo plantilla 1</h1>
@endsection

@section("main")
<p>Soy un párrafo dentro del contenido principal y estoy escrito en el archivo ejemplo-plantilla-1.blade.php.</p>
@if(count($alumnos))
	<table width="50%" border="1">
		@foreach($alumnos as $alumno) 
			<tr>
				<td>{{$alumno}}</td>
			</tr>
		@endforeach
	</table>
@else 
	<p>Sin alumnos</p>
@endif
@endsection

@section("footer")
@endsection