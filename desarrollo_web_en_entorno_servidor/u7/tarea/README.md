# TAREA Unidad 7: Aplicaciones web híbridas

## Índice

- [¿Qué te pedimos que hagas?](#qué-te-pedimos-que-hagas)
	- [Ejercicios de iniciación](#ejercicios-de-iniciación)
		- [Ejercicio 1](#ejercicio-1)
		- [Ejercicio 2](#ejercicio-2)
		- [Ejercicio 3](#ejercicio-3)
		- [Ejercicio 4](#ejercicio-4)
	- [Actividades de desarrollo](#actividades-de-desarrollo)
		- [Ejercicio 5](#ejercicio-5)
		- [Ejercicio 6](#ejercicio-6)
		- [Ejercicio 7](#ejercicio-7)
		- [Ejercicio 8](#ejercicio-8)
	- [Actividades de desarrollo final de curso](#actividades-de-desarrollo-final-de-curso)
		- [Ejercicio 9](#ejercicio-9)
		- [Ejercicio 10](#ejercicio-10)
- [Material complementario](#material-complementario)
- [Formato de entrega](#formato-de-entrega)
- [Actividad extra propuesta por el profesorado (10 %)](#actividad-extra-propuesta-por-el-profesorado-10-)
- [Resultado](#resultado)

<br>

## ¿Qué te pedimos que hagas? 

### Ejercicios de iniciación

#### Ejercicio 1

Realiza tres sitios web:

- Uno que salude con ¡Hola, mundo!
- Otro profesional con cuatro pestañas: Inicio, Portfolio, CV y Sobre mí.
- Uno que use [Leaflet](https://github.com/Leaflet/Leaflet) con Open Street Maps y/o Google Maps y crear así una aplicación web híbrida de tipo (mashup)[https://en.wikipedia.org/wiki/Mashup_(web_application_hybrid)]; para ello, ayúdate de este [tutorial](https://www.latirus.com/blog/2021/06/11/instalar-google-maps-y-leaflet-js-en-laravel/) ([vídeo](https://www.youtube.com/watch?v=_ieQavKU4AY)).

#### Ejercicio 2

Crea el siguiente [formulario](https://milq.github.io/cursos/dwes/ud/7/formulario.png) y que dichos datos se recojan, se validen de forma segura en servidor y se muestren en otra vista.

#### Ejercicio 3

Crea una aplicación web [CRUD](http://en.wikipedia.org/wiki/create,_read,_update_and_delete) sencilla sobre libros (id, ISBN, título, autor, editorial, edición, año). Ayúdate de este [tutorial](https://milq.github.io/cursos/dwes/ud/3/laravel).

#### Ejercicio 4

Crea un informe de salud personal. Habrá que registrarse como usuario y después iniciar sesión. Una vez iniciado, el usuario introducirá su sexo, edad, altura y peso y al pulsar en *Calcular* se validarán los datos y se generará un informe de salud con el [IMC](https://es.wikipedia.org/wiki/%C3%8Dndice_de_masa_corporal) y el metabolismo basal según la [fórmula](https://es.wikipedia.org/wiki/Metabolismo_basal#C%C3%A1lculo_de_calor%C3%ADas_necesarias) de la OMS.

### Actividades de desarrollo

#### Ejercicio 5

Crea una tienda [CRUD](http://en.wikipedia.org/wiki/create,_read,_update_and_delete) de videojuegos (*ISAN*, título, desarrolladora, distribuidora, género, año) con las pestañas **Inicio** (presentación de la tienda), **Juegos** (juegos almacenados en la tienda), **Sobre nosotros** (descripción de la tienda), **Contacto** (datos de contacto y localización) y **Admin**. Ésta última con tres subpestañas: **Añadir** (inserción de un videojuego), **Editar** (modificación de los campos de un videojuego) y **Borrar** (eliminación de un videojuego).

#### Ejercicio 6

Repite la actividad anterior con las pestañas **Registrar** (como usuario cliente) e **Iniciar sesión** (como usuario cliente o administrador). Si no se ha iniciado sesión, se podrá acceder a *Inicio*, *Sobre nosotros* y *Contacto*. Si se ha iniciado sesión como cliente, se podrá acceder a *Juegos* y si es como administrador, se podrá gestionar los videojuegos en *Admin*.

#### Ejercicio 7

Crea un inventario sencillo de productos con este [modelo](https://milq.github.io/cursos/dwes/ud/7/modelo_inventario.png) (relación [uno a varios](https://laravel.com/docs/eloquent-relationships#one-to-many)). Puedes registrarte como usuario cliente pero no como usuario administrador. El administrador, una vez iniciado sesión correctamente, introducirá, mediante formularios, una serie de fabricantes y una serie de productos asociados a dichos fabricantes. El cliente, una vez iniciado sesión correctamente, podrá visualizar los fabricantes y los productos de cada fabricante.

#### Ejercicio 8

Crea un curso sencillo con este [modelo](https://milq.github.io/cursos/dwes/ud/7/modelo_curso.png) (relaciones [uno a varios](https://laravel.com/docs/eloquent-relationships#one-to-many) y [varios a varios](https://laravel.com/docs/eloquent-relationships#many-to-many)). Puedes registrarte como alumno, como profesor (*1234* como clave para poder registrarte como profesor) pero no como administrador. El profesor, una vez iniciado sesión correctamente, introducirá, mediante formularios, las asignaturas que imparte. El alumno, una vez iniciado sesión correctamente, podrá inscribirse en las diferentes asignaturas. El administrador visualizará todo.

### Actividades de desarrollo final de curso

#### Ejercicio 9

Elige y realiza en Laravel [uno](https://milq.github.io/cursos/dwes/ud/2/index.html#a) o [uno](https://milq.github.io/cursos/dwes/ud/4/index.html#b) del que más te guste y que no hayas hecho anteriormente.

#### Ejercicio 10

Crea el juego de piedra, papel, tijeras, lagarto o Spock entre usuarios. El usuario retará a otro usuario y elegirá una de esas cinco opciones. El usuario retado verá una petición de reto, elegirá una de esas cinco opciones y se producirá un resultado para el retador y el retado. Cada usuario puede ver su historial de partidas jugadas así como su porcentaje de victorias. También podrá ver dos clasificaciones: usuarios más ganadores y usuarios con más partidas; ambas clasificaciones acompañadas de nombre de usuario y porcentaje de victoria.

## Material complementario

El material complementario se puede encontrar en la [Unidad 7](https://milq.github.io/cursos/dwes/ud/7/) de DWES de la web de Manuel Ignacio López Quintero.

## Formato de entrega

1. La estructura de archivos y carpetas debe quedar [así](https://milq.github.io/cursos/dwes/ud/7/estructura.txt).
2. La base de datos se identificarán como *to7_1*, *to7_2*, *to7_3*, etc.
3. Antes de comprimir borra las carpetas vendor y node_modules. Si aún no cumples el máximo permitido, borra imágenes que ocupen mucho.
4. El profesor ejecutará: composer install && php artisan migrate:fresh && php artisan serve.

## Actividad extra propuesta por el profesorado (10 %)

Realiza más opciones de la actividad 9 o profundiza con [Leaflet](https://github.com/Leaflet/Leaflet) en Laravel para interactuar con Open Street Maps y/o Google Maps.

---

## Resultado

**Calificación**: 10,00 / 10,00

Calificado el lunes, 6 de junio de 2022, 20:01 por López Quintero, Manuel Ignacio
