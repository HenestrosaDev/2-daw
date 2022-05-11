# a) Caso práctico
## Creación de proyecto
Dependiendo del software que uses para desplegar tu proyecto de Laravel, tendrás que seguir una serie determinada de pasos. En mi caso, estoy usando Laragon y bastaría con ir a `Menú > Creación rápida de sitio web` y seleccionar `Laravel`.

## Anotaciones
Los archivos presentes en la raíz de este directorio tienen el fin de ser reemplazados o añadidos a las rutas indicadas en las carpetas de un proyecto nuevo. 

---

## Comandos
**Vídeo 34**: 
- `php artisan make:migration create_productos_table --create="productos"`
- `php artisan migrate`

**Vídeo 35**
- `php artisan make:controller --resource ProductosController`

**Vídeo 36**
- `php artisan make:model Producto`