# b) Migraciones - Configuración de entorno
Yo estoy usando Laragon (tú también deberías ya que es mucho más simple y ofrece más funcionalidades que Homestead y XAMPP), por lo que solo hay que cambiar en los archivos `.env` y `.env.example` el valor de `DB_DATABASE` al nombre de nuestro proyecto.
En mi caso, le he puesto **pildoras**.

Tras ello, hay que ejecutar el comando `php artisan migrate` para que el modelo definido en los archivos dentro del directorio `database/factories/migrations` se inserten 
en la base de datos.

---

### NOTAS: 

- La función `timestamp()` introduce las columnas `created_at` y `updated_at` para controlar las fechas en las que una fila ha sido manipulada.
- La función `rememberToken()` crea la columna `remember_token`. Se usa para evitar el secuestro de la cookie `Remember me`. Los registros de la columna son actualizados cada vez que un usuario realiza un login y/o un logout.