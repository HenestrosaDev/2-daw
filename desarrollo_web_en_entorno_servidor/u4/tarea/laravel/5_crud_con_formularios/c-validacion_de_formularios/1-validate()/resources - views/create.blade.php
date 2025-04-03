@extends("layouts.plantilla-productos")

@section("header")
<h1 class="text-center">Insertar registros</h1>
@endsection

@section("content")
<form method="post" class="form column" action="{{url('/productos')}}">
	<div class="column">
		<label for="form__name">Nombre</label>
		<input id="form__name" type="text" name="nombre">
	</div>

	<div class="column">
		<label for="form__section">Sección</label>
		<input id="form__section" type="text" name="seccion">
	</div>

	<div class="column">
		<label for="form__price">Precio</label>
		<input id="form__price" type="text" name="precio">
	</div>

	<div class="column">
		<label for="form__date">Fecha</label>
		<input id="form__date" type="text" name="fecha">
	</div>

	<div class="column">
		<label for="form__country">País</label>
		<input id="form__country" type="text" name="pais_origen">
	</div>

	<!-- Esta anotación es para evitar el ataque CSRF en Laravel -->
	@csrf
	<button type="reset">Borrar</button>
	<button type="submit" name="submit" value="submit">Enviar</button>
</form>

@if($errors->any())
	@foreach($errors->all() as $error)
		<p class="text-center">{{$error}}</p>
	@endforeach
@endif

@endsection

@section("footer")
@endsection