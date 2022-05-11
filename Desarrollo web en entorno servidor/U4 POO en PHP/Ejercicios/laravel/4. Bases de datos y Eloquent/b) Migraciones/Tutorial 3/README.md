# b) Migraciones - Modificación de tablas con *migrations*
## Actualización de tablas
1. Crear el archivo **migration**. Tenemos que usar el comando `php artisan make:migration [NOMBRE MIGRATION] --table:[NOMBRE TABLA]`. Ejemplo: `php artian make:migration agrega_seccion_articulos --table:articulos`

2. Configurar el archivo migration creado.
```
	public function up() {
		Schema::table('articulos', function (Blueprint $table) {
			$table->string("seccion");
		});
	}

	public function down() {
		Schema::table('articulos', function (Blueprint $table) {
			$table->dropColumn("seccion");
		});
	}
```

3. Ejecutar `php artisan migrate` para migrar los cambios a la BBDD.

---

## Refrescar y borrar tablas
- Para borrar todas las tablas de la base de datos creadas a partir de migraciones, ejecutamos `php artisan migrate:reset`.
- Para volver a crearlas, se ejecuta `php artisan migrate`.
- Para borrarlas y crearlas en un solo comando, se usa `php artisan migrate:refresh`.
- Para saber si se han migrado o no los archivos **migrations** se ejecuta `php artisan migrate:status`.