# 4.5 Tinker
## ¿Qué es?
Es una consola de pruebas que permite multitud de operaciones. Entre ellas, interactuar con las BBDDs utilizando Eloquent, hacer operaciones CRUD, crear objetos nuevos, comprobar relaciones…

Para su ejecución, hay que introducir el comando `php artisan tinker`.

Para salir de tinker, hay que ejecutar el comando `exit;`.

## Comandos de ejemplo
- Para insertar un registro en la tabla `clientes`:
`$cliente=App\Models\Cliente::create(["nombre"=>"Antonio", "apellidos"=>"Fernández"])`
- Para crear objetos que posteriormente serán almacenados en la BBDD:
	```
	$cliente1 = new App\Models\Cliente
	$cliente1->nombre = "Jennifer"
	$cliente1->apellidos= "Martín"
	$cliente1 // imprimirá los datos del objeto
	$cliente1->save() // almacena el registro en la BBDD
	```

- Para actualizar registros:
	```
	$cliente=App\Models\Cliente::find(3)
	$cliente->apellidos="Martínez"
	$cliente->save()
	```

- Para eliminar registros:
	```
	$cliente=App\Models\Cliente::find(5)
	$cliente->delete()
	```

Se pueden hacer muchas más cosas con Tinker. En la [documentación](https://laravel.com/docs/9.x/artisan) aparecen más comandos. Además, [esta guía](https://beyondco.de/blog/the-ultimate-guide-to-php-artisan-tinker) puede resultar también de utilidad.