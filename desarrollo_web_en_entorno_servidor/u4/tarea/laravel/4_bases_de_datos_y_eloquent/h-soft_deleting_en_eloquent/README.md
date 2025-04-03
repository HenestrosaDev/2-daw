# h) Soft deleting en Eloquent
## ¿Qué es *soft deleting*?
Sirve para borrar archivos sin llegarlos a eliminar de la BBDD. En Laravel, si el valor de la columna `deleted_at` es `null`, significa que el registro no está borrado. En cambio, si aparece una fecha, implica que ese registro no se tenga en cuenta aún estando presente en la BBDD.

Se utiliza para varios fines pero, uno de los comunes es darle la opción al usuario de recuperar un registro "eliminado".

## Comandos
- `php artisan make:migration add_deleted_at_to_articulos --table=articulos` creamos la migración para añadir una columna que refleja si una fila está "borrada" o no a una tabla ya existente.
php artisan migrate