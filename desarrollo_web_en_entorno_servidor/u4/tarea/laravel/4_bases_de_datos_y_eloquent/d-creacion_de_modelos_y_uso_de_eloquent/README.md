# d) Creación de modelos y uso de Eloquent
Para crear modelos, utilizamos el comando `php artisan make:model [NOMBRE]`. Por ejemplo: `php artisan make:model Articulo`.

Si el nombre del modelo no coincide con el nombre de la tabla,
tenemos que declarar la siguiente variable de clase dentro del 
modelo: `protected $table = "nombreTabla";`.

Por defecto, el modelo toma como clave primaria al campo `id`.
Si la tabla no tiene como clave primaria al `id`, tenemos que 
declarar la variable de clase `protected $primaryKey = "nombreClavePrimaria";` dentro del modelo.