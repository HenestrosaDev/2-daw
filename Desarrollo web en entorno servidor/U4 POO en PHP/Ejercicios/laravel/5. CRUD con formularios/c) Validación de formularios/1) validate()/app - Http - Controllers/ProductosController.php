<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
 		// unique:productos significa que el valor del campo 'nombre' tiene que ser
		// único en la tabla 'productos'. 'max' determina el n�mero m�ximo de
		// carácteres.
		'nombre' => 'required|unique:productos|max:255'		
	]);

	// En caso de que no se cumpla la condición, Laravel almacena el error en la
	// variable global $errors gracias al middleware ShareErrorsFromSession.
	// También se almacena en los mensajes flash de la sesión, permitiéndonos
	// mostrarle al usuario sobre el error en la validación del formulario. En el
	// archivo .blade.php contenido en el subdirectorio 'resources - views' está
	// el código necesario para mostrarle el error al usuario. 
	
	// También se pueden traducir los mensajes de error, los cuales se encuentran
	// en 'lang/en/validation.php'.

	// Alternativamente, podemos hacer uso de la clase 'Validator' de la siguiente
	// forma:
	/*
	$validator = Validator::make($request->all(), [ 'nombre' =>
	  'required|unique:productos|max:255',
	]);

	if ($validator->fails()) {
		return redirect('post/create'); // ruta de ejemplo
			->withErrors($validator) // flashea el mensaje de error a la sesión, seteando la variable $errors con el error pertinente.
			->withInput(); // rellena el formulario con los campos que se habían intentado enviar
	}
	*/

	// Podemos usar la regla 'bail' dentro del valor de la validación
	// ('required|unique:productos|max:255') para detener la validación de reglas
	// en caso de que una no se cumpla. Por ejemplo, si tenemos 'nombre' =>
	// 'bail|required|unique:posts|max:255' y 'unique:posts' no se cumple, la
	// regla 'max:255' no se comprobará, lo cual nos ahorarrá tiempo de ejecución.

        $producto = new Producto;
        $producto->nombre = $validated->nombre;
        $producto->seccion = $request->seccion;
        $producto->precio = $request->precio;
        $producto->fecha = $request->fecha;
        $producto->pais_origen = $request->pais_origen;
        $producto->save();
    }
}

// Más información en https://laravel.com/docs/9.x/validation