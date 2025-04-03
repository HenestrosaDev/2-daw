# f) Insertar y actualizar registros en Eloquent
## ¿Qué son los *seeders*?
Son archivos que pueblan de registros a una BBDD, sin necesidad de ejecutar código SQL.

Es importante mencionar que desde *Tinker* podemos emular lo que hacen los seeders ya que se crean objetos con unos parámetros determinados para hacer operaciones CRUD con ellos. Lo bueno
es que con seeders se pueden introducir multitud de registros a la vez con el comando `php artisan db:seed`.

## ¿Qué son las *factories*?
Crea objetos de modelos con valores de propiedades falsos con el fin de hacer pruebas con la BBDD.

Esto facilita inmensamente la tarea ya que no tendremos que crear a mano un número determinado de registros ya que entre las factories y los seeders podremos crear miles de registros en cuestión de segundos.

---
## Nota
Las carpetas `factories` y `seeders` van dentro del directorio `database`.