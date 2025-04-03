@extends("layouts.plantilla-productos")

@section("header")
<h1 class="text-center">Editar registros</h1>
@endsection

@section("content")
<form method="post" class="form column" action={{route('productos.update', $producto->id)}}>
	<div class="column">
		<label for="form__name">Nombre</label>
		<input id="form__name" type="text" name="nombre" value="{{$producto->nombre}}">
	</div>

	<div class="column">
		<label for="form__section">Sección</label>
		<input id="form__section" type="text" name="seccion" value="{{$producto->seccion}}">
	</div>

	<div class="column">
		<label for="form__price">Precio</label>
		<input id="form__price" type="text" name="precio" value="{{$producto->precio}}">
	</div>

	<div class="column">
		<label for="form__date">Fecha</label>
		<input id="form__date" type="text" name="fecha" value="{{$producto->fecha}}">
	</div>

	<div class="column">
		<label for="form__country">País</label>
		<input id="form__country" type="text" name="pais_origen" value="{{$producto->pais_origen}}">
	</div>

	<!-- Esta anotación es para evitar el ataque CSRF en Laravel -->
	@csrf
	@method('PUT')
	<button type="reset">Resetear</button>
	<button type="submit" name="submit" value="submit">Actualizar</button>
</form>

<form method="post" class="form column" action="/productos/{{$producto->id}}">
	@csrf
	@method('DELETE')
	<button type="submit" name="submit" value="submit">Eliminar registro</button>
</form>
@endsection

@section("footer")
@endsection