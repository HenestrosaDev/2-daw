# b) Migraciones - Creación de tablas con *migrations*
Para ello, se tiene que introducir el comando `php artisan make:migration create_articulos_table --create="articulos"`.
El nombre de la tabla es `articulos` y `create_articulos_table` es el nombre del archivo.

Para deshacer la creación de la última acción realizada con *migration*, hay que ejecutar `php artisan migrate:rollback`.

