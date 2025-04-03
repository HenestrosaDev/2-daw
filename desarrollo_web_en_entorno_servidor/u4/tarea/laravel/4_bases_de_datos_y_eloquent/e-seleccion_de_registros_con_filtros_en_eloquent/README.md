# d) Selección de registros con filtros en Eloquent
Todo ello se realiza gracias a los [query builders](https://laravel.com/docs/9.x/queries).

Ejemplos: 
```
$users = DB::table('users')->get(); // obtiene todos los usuarios de la tabla users.
---
$email = DB::table('users')->where('name', 'John')->value('email'); // almacena el valor del email del usuario con nombre John de la tabla users.
---
$user = DB::table('users')->find(3); // devuelve el usuario con ID 3.
---
// chunk se usa para iterar sobre los registros de tablas que contienen miles de filas.
DB::table('users')->orderBy('id')->chunk(100, function ($users) {
	foreach ($users as $user) {
		 …
	}
});
```