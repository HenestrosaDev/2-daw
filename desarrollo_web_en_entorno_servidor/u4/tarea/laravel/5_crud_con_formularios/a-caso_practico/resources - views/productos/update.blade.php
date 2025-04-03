@extends("../layouts.plantilla-productos")

@section("cabecera")

@section("contenido")
<form method="post">
	<input type="text" name="nombre">
	<button type="submit" name="submit" value="submit">Enviar</button>
</form>