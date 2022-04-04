
# Índice

### Sesión 07 (02/11/2021): Bases de datos y su uso en PHP (1 de 3)
[Link](https://drive.google.com/file/d/1AT7PVfuWeu8CpMD-ToAVvj8iSHLQKJXX/view?usp=sharing)

<details>
  <summary markdown="span">Detalles</summary>
	Ejercicios a realizar:

- Hacer los ejercicios 3, 4 y 5 exhaustivamente de la sesión 6.
- Crear usuario en PhpMyAdmin (ver Anexo abajo).
- Saber crear una BBDD en PhpMyAdmin tanto en SQL como por interfaz (ver Anexo abajo).
- Saber implementar un modelo de datos en SQL (ver ejemplo básico abajo).
- Ejecutar la implementación realizada en PhPMyAdmin, para ello:
	- Entrar en http://localhost/phpmyadmin/
	- Pulsar la pestaña SQL
	- Ejecutar el script SQL de implementación de un modelo de datos (el anterior punto) 
- Comprobar que está implementada:
	- Mirando primero en la pestaña `Databases`
	- Después seleccionando dicha BBDD
	- Comprobamos las tablas, etc.
	- Podemos ver finalmente las tablas y sus relaciones en la pestaña `Designer`.
- Creamos una aplicación web y nos conectamos a la BBDD mediante PHP. Ejemplo [aquí](https://github.com/milq/milq/tree/master/learn/php/2_crud).
- Leer las diferencias de estos dos cotejamientos más utilizados: [link](https://espaciogt.wordpress.com/2018/10/08/cual-es-la-diferencia-entre-utf8_general_ci-y-utf8_unicode_ci/)
- Empezar a pensar los modelos de datos de la Tarea 2.
- Si has avanzado hasta aquí, enhorabuena, vas bien.

Para conocer y estudiar algunos de los puntos podéis consultar el [material complementario](milq.github.io/cursos/dwes/ud/2) así como vídeos y otros recursos que encontréis.

--- 

<p>Crear usuario en PhpMyAdmin:</p>

<ol>
	<li>Iniciar XAMPP y después PhpMyAdmin (http://localhost/phpmyadmin/).</li>
	<li>
		Crear un usuario con todos los permisos:
		<ul>
			<li>Username: uno sin espacios (puede usarse _) ni caracteres raros.</li>
			<li>Host name (Local): localhost</li>
			<li>Password: el que queráis</li>
			<li>Re-type: el que queráis</li>
		</ul>
	</li>
	<li>Activamos la casilla Global privileges (Check all).</li>
	<li>Pulsar botón Go.</li>
</ol>

Recordad, que una vez creado el usuario, no hace falta crearlo más veces (excepto si lo borramos, claro).

---

<p>Saber crear una BBDD en PhpMyAdmin tanto ejecutando SQL como por interfaz:</p>

Hay dos opciones:

- Por interfaz se hace desde la pestaña Databases.
- Por SQL (desde la pestaña SQL):

		DROP DATABASE IF EXISTS nombre_bbdd;
		CREATE DATABASE nombre_bbdd;
		USE nombre_bbdd; -- Lo usaremos más adelante para usar dicha BBDD

---
Ejemplo básico de implementar un modelo de datos en SQL:
```
DROP DATABASE IF EXISTS ejemplo_clase_7;
CREATE DATABASE ejemplo_clase_7;
USE ejemplo_clase_7;
DROP TABLE IF EXISTS mensajes;
DROP TABLE IF EXISTS usuarios;

-- Implementación en SQL del modelo de base de datos

CREATE TABLE usuarios (
	id INT AUTO_INCREMENT,
	username VARCHAR(50),
	password VARCHAR(100),
	CONSTRAINT PK_usuario PRIMARY KEY (id)
);

CREATE TABLE mensajes (
	id INT NOT NULL AUTO_INCREMENT,
	asunto VARCHAR (100),
	cuerpo VARCHAR (100),
	fecha DATE,
	id_usuario INT,
	CONSTRAINT PK_mensaje PRIMARY KEY (id),
	CONSTRAINT FK_mensaje_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- Tenemos que saber también añadir ejemplos

INSERT INTO usuarios VALUES
('1', 'pepe', '1234'),
('2', 'luis', '4321'),
('3', 'juan', '1122'),
('4', 'pedro', '2211'),
('5', 'pablo', '3344');

INSERT INTO mensajes(asunto, cuerpo, fecha, id_usuario) VALUES
('a', 'Texto.', '2021-04-24', '1'),
('b', 'Texto.', '2020-03-23', '2'),
('c', 'Texto.', '2021-05-22', '1'),
('d', 'Texto.', '2020-02-21', '4'),
('e', 'Texto.', '2021-06-19', '3'),
('f', 'Texto.', '2020-01-18', '1'),
('g', 'Texto.', '2021-07-17', '1'),
('h', 'Texto.', '2020-09-16', '5'),
('i', 'Texto.', '2021-08-15', '3'),
('j', 'Texto.', '2020-09-20', '3');
```
</details>

---

### Sesión 08 (09/11/2021): Bases de datos y su uso en PHP (2 de 3)
[Link](https://drive.google.com/file/d/1FhYKkXmsACKa41nKJ9zI5uTkxK4QIHJz/view?usp=sharing)

<details>
  <summary markdown="span">Detalles</summary>
	Ejercicios a realizar:

- Hacer todos los ejercicios de la sesión 6 y 7.
- Hacer una aplicación web que se conecte a una base de datos (con filas insertadas de ejemplo) e interactuar mediante PHP con ella.
- Crear formularios en la aplicación web anterior, recoger dichos datos e interactuar con la BBDD: añadir y borrar.
- Hacer consultas SELECT en la aplicación web anterior (punto 3) y mostrar los resultados en listas y tablas. Hacer consultas tanto específicas (un solo campo de una sola fila) como más generales (un subconjunto de filas de todas la fila de una tabla).
- Practicar implementando por sí mismo y sin mirar, un CRUD sencillo (ejemplo, no copiar: https://github.com/milq/milq/tree/master/learn/php/2_crud).
- Empezar la Tarea Online 2 (mirad las recomendaciones más abajo).

---

Recomendación para hacer la Tarea Online 2:

<ol>
	<li>
		Crear el modelo de datos e implementarlo finalmente en SQL:
		<ol>
			<li>Diseñar el modelo de datos y representadlo en Esquema E-R.</li>
			<li>Transformar a un modelo de base de datos normalizado (en este caso, modelo relacional).</li>
			<li>Implementar el modelo relacional normalizado en SQL.</li>
		</ol>
	</li>
	<li>
		Interactuar con nuestra base de datos en SQL:
		<ol>
			<li>Añadimos (preguntas/respuestas)/reservas/pedidos (INSERT INTO).</li>
			<li>Mostramos (preguntas/respuestas)/reservas/pedidos (SELECT).</li>
			<li>Borramos/actualizamos (preguntas/respuestas)/reservas/pedidos (DELETE FROM, UPDATE).</li>
		</ol>
	</li>
	<li>Hacer un bosquejo de la navegabilidad en nuestras páginas y formularios:</li>
	<li>Implementar la aplicación web en HTML/Bootstrap/PHP.</li>
</ol>

---

Clientes recomendados

- PgAdmin 4.
- PhpMyAdmin.
- SQLFiddle (online).
- DB Fiddle (online).
</details>

---

### Sesión 09 (16/11/2021): Bases de datos y su uso en PHP (3 de 3)
[Link](https://drive.google.com/file/d/1bEBaT1vd3gvfNdc_2FWv7zyRJ0t5uVWu/view?usp=sharing)

<details>
	<summary markdown="span">Detalles</summary>
	Ejercicios a realizar:

- Hacer todos los ejercicios de la sesión 6, 7 y 8.
- Implementar un modelo de datos en SQL con datos de ejemplo y crear una aplicación web con HTML, Bootstrap (o similar) y PHP que interactúe con dicho modelo de datos (mostrando, insertando, borrando y editando datos).
- Practicar creando aplicaciones web persistentes (PHP/MariaDB) a partir de los ejercicios de la Tarea 1.
- Seguir con la Tarea Online 2 (mirad las recomendaciones indicadas en la sesión anterior).
- Empezad a estudiar sesiones en PHP:
	- https://www.php.net/manual/en/book.session.php
	- https://www.w3schools.com/php/php_sessions.asp
</details>

---

### Sesión 10 (24/11/2021): Sesiones en PHP (1 de 2)
[Link](https://drive.google.com/file/d/12EXsXVJUykXri-z9gLS-wqICW0BNyLrY/view?usp=sharing)

<details>
	<summary markdown="span">Detalles</summary>
- Hacer todos los ejercicios de la sesión 6, 7, 8 y 9.
- Estudiar sesiones en PHP:
	- https://www.php.net/manual/en/book.session.php
	- https://www.w3schools.com/php/php_sessions.asp
	- https://www.tutorialspoint.com/php/php_sessions.htm
	- https://diego.com.es/sesiones-en-php 
- Estudiar detenidamente la variable $_SESSION: https://www.php.net/manual/en/reserved.variables.session.php.
- Ejecutar [ejemplo](https://www.php.net/manual/en/session.examples.basic.php).
- Recrear paso a paso la aplicación web de sesiones de esta clase online.
- Seguir con la Tarea Online 2.
</details>

---

### Sesión 11 (30/11/2021): Sesiones en PHP (2 de 2)
[Link](https://drive.google.com/file/d/1ZgWyJTPW2jPcgF21KT0qohL2r7bg-hQ9/view?usp=sharing)

<details>
	<summary markdown="span">Detalles</summary>
	Ejercicios a realizar:

- Hacer todos los ejercicios de la sesión 6, 7, 8, 9 y 10.
- Recrear paso a paso la aplicación web de sesiones con BBDD de esta clase online.
- Dedicar trabajo y esfuerzo a la Tarea Online 2.
</details>

---

### Sesión 12 (29/11/2021): Heroku
[Link](https://drive.google.com/file/d/1O6mt4HQ-CB0VlohT3DM0NSTGo14Z8SWk/view?usp=sharing)

<details>
	<summary markdown="span">Detalles</summary>
	Ejercicios a realizar:

- Registrarse en Heroku.
- Subir una aplicación web simple con PHP recreando paso a paso lo realizado esta clase online.
- Subir una aplicación web con BBDD recreando paso a paso lo realizado esta clase online.
- Subir la Tarea 1 a Heroku según las indicaciones mostradas más abajo. 
- Subir la Tarea 2 a Heroku según las indicaciones mostradas más abajo.

---

**Actividad propuesta por el profesorado (10 % de nota):**

Como se indica en el vídeo, para las Unidades 1 y 2, el 10 % de la actividad propuesta por el profesorado consistirá en:

- Unidad 1: subir a Heroku la aplicación web Tarea 1.
- Unidad 2: subir a Heroku la aplicación web Tarea 2.

Para ello, en la entrega de la Tarea 2 tiene que haber un fichero de texto denominado Heroku.txt que contenga 2 líneas de texto:
- wxyz_tarea1.herokuapp.com
- wxyz_tarea2.herokuapp.com

Donde w es la 1ª letra de vuestro 1er apellido, la x es la 1ª letra de vuestro 2º apellido, la y es la 1ª letra de vuestro 1er nombre y la z es la 1ª letra de vuestro 2º nombre si lo tenéis.

Si está cogido la URL, pues poned una alt al final (por ejemplo, wxyz_tarea2alt.herokuapp.com)

**Importante**: si lo subís a Heroku, se evaluará la Tarea 2 todo excepto el código (que lo veré en vuestro `.zip`).
</details>