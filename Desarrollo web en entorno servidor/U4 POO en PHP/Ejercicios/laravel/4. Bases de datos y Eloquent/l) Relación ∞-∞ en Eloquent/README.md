# l) Relación ∞-∞ en Eloquent
## ¿Qué tipo de relación es?
Es un tipo de cardinalidad que relaciona una tabla con otra en calidad de relación ∞-∞. Por ejemplo, la relación establecida entre los modelos `Estudiante` y `Clase` es de ∞-∞ ya que un estudiante tiene muchas clases, y viceversa.

## Detalles
Si dos modelos tienen una relación **de muchos a muchos**, se necesita crear una tabla **pivot**. Por ejemplo:

Imaginemos que tenemos una tabla `users` y  otra llamada `roles`. Para relacionar ambas tablas, se necesita crear una tabla pivot llamada `roles_users`. 

Para saber cuál de las dos tablas tenemos que poner primero en el nombre de la tabla pivot, nos guiaremos por el **orden alfabético**. Si tuviéramos una tabla `z` y otra `a`, el nombre de la tabla pivot sería `a_z`.

Adicionalmente, la tabla pivot tendrá que tener las columnas que actúan como clave primaria en ambas tablas. Es decir, si la clave primaria de la tabla `user` es `id`, el nombre de la columna en la tabla pivot que referencia a la clave primaria de la tabla `user` será  `user_id`.

---

## Comandos
- `php artisan make:model Perfil -m` para crear el modelo del perfil. -m crea el archivo migration del modelo
- `php artisan make:migration create_clientes_perfils_table --create=cliente_perfil` para crear la tabla pivot
- `php artisan migrate` para añadir las migraciones creadas