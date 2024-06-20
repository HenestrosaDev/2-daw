<p align="center">
	<img 
		width="49%" 
		src="https://github.com/HenestrosaDev/2-daw/blob/main/Desarrollo%20web%20en%20entorno%20servidor/U2%20Trabajar%20con%20BBDD%20en%20PHP/Ejercicios/docs/screenshot-test.png" 
		alt="Test page"
		title="Test page"
	>
	&nbsp;
	<img 
		width="49%" 
		src="https://github.com/HenestrosaDev/2-daw/blob/main/Desarrollo%20web%20en%20entorno%20servidor/U2%20Trabajar%20con%20BBDD%20en%20PHP/Ejercicios/docs/screenshot-car-renting.png"
		alt="Car renting page"
		title="Car renting page"
	>
</p> 

# UNIDAD 2: Trabajar con BBDD en PHP

## ¿Qué te pedimos que hagas? 

Crea una, dos o tres aplicaciones web en XHTML, CSS (o Bootstrap), PHP y MariaDB (o PosgreSQL) que mediante conexiones a una base de datos MariaDB (o PosgreSQL) proporcione un servicio tanto para el usuario como para el administrador y que genere un informe.

Las características de las aplicaciones web son las siguientes:
- Incluir una página de registro o alta como usuario nuevo.
- Inicio de sesión tanto para el rol de usuario como para el rol de administrador.
- Una vez iniciada la sesión como usuario, proporcionar un servicio al cliente.
- Una vez iniciada la sesión como administrador, proporcionar un servicio al
empresario.
- Generar un informe recogiendo la información de una base de datos (PosgreSQL
o MariaDB).
- Cerrar sesión tanto como usuario como administrador.
- La recogida de datos de los formularios debe ser segura (validación, filtración,
saneamiento, etc.).
- <u>Opcional</u>: 
	- Todos los documentos tienen que estar validados en XHTML 5.2, CSS3 y WCAG 2.0 AAA.
	- Subir las tres aplicaciones a la plataforma [Heroku](http://heroku.com/) (para evaluar el funcionamiento) y a [GitHub](https://github.com/) (para evaluar el código).


**1. Sistema de test online**

El usuario iniciará sesión y realizará una prueba online tipo test sobre PHP (mínimo 10 preguntas). El test tendrá un máximo de 3 intentos. Tiene que haber preguntas con respuestas únicas (radio) o múltiples (checkbox). El profesor, con rol administrador, iniciará sesión y podrá comprobar las respuestas y la nota de cada alumno y podrá generar un informe. Dicho informe mostrará las notas de cada alumno y estadísticas como nota media, moda, varianza, desviación típica, pregunta con más aciertos, pregunta con más fallos, etc.

**2. Reservas online de coches**

El usuario (cliente) iniciará sesión y realizará una reserva online de un coche desde y hasta una fecha determinada a partir de un catálogo de 10 coches diferentes. El usuario no podrá reservar un coche determinado desde y hasta una fecha determinada si se encuentra reservado algún momento entre esas fechas. El administrador (empresario) iniciará sesión y podrá comprobar todas las reservas de sus clientes y podrá generar un informe. Dicho informe mostrará las reservas de cada cliente y estadísticas como número de veces que ha reservado, cuántos días ha reservado, qué coche ha reservado más veces, etc.

**3. Pizzería online**

El usuario (cliente) iniciará sesión y realizará un pedido online de una o varias pizzas y podrá elegir hasta 10 ingredientes o hasta 5 especialidades diferentes. El usuario podrá añadir/eliminar ingredientes/pizzas y vaciar la cesta de la compra para empezar de nuevo. El administrador (empresario) iniciará sesión y podrá comprobar todos los pedidos de sus clientes y podrá generar un informe. Dicho informe mostrará los pedidos de cada cliente y estadísticas como precio medio del pedido, el ingrediente más y menos solicitado, la especialidad más y menos solicitada, etc.

## Material complementario 
El material complementario se puede encontrar en la [Unidad 2](https://milq.github.io/cursos/dwes/ud/2/) de DWES de la web de Manuel Ignacio López Quintero. 

## Formato de entrega

- La estructura de archivos y carpetas debe quedar [así](https://milq.github.io/cursos/dwes/ud/2/estructura.txt). 
El script [inicio.sql](https://milq.github.io/cursos/dwes/ud/2/inicio.sql) creará las tres bases de datos con sus tablas, inserciones y restricciones necesarias.
- La página inicio.html permitirá acceder a todas las actividades.
- El profesor descomprimirá el ZIP en htdocs, iniciará XAMPP, entrará en
PhpMyAdmin, ejecutará/importará el script inicio.sql y abrirá inicio.html desde localhost.

El no cumplimiento del formato de entrega conllevará una calificación de cero en la presente tarea.

---

## Resultado

**Calificación**:	10,00 / 10,00

Calificado el domingo, 26 de diciembre de 2021, 18:18 por López Quintero, Manuel Ignacio.

**Comentarios de retroalimentación**: Modelo: 2 Sesiones: 2 Usuario: 2 Admin: 2 Diseño: 2 Nota: 10 Comentario: La pizzería no está completa, pero las otras dos aplicaciones están perfectas y permite compensar para alcanzar el 10. Excelentísimo trabajo, por pedir sigue mejorando los principios de una aplicación web, en este caso diseño gráfico. Va las dos aplicaciones en Heroku. Con este esfuerzo tendrás éxito profesional, te lo aseguro. Por favor, sigue así.