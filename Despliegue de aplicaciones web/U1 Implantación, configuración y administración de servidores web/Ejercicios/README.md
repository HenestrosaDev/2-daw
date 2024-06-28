# UNIDAD 1: Implantación, configuración y administración de servidores web

## Ejercicio 1: Clasificación de las Aplicaciones web

Enumera y explica brevemente cada una de las diferentes tecnologías asociadas a las aplicaciones web que se ejecutarán tanto del lado del servidor como del cliente, especificando lo que corresponde a cada uno de los casos.

## Ejercicio 2: Arquitecturas web

Una plataforma o arquitectura web es el entorno empleado para diseñar, desarrollar y ejecutar un sitio web. Hay muchos modelos de plataformas y una de las piezas más importantes y determinantes a la hora de elegirla es el sistema operativo. Describe dos plataformas web, una basada en Linux y otra basada en Windows, indicando qué tecnologías utilizan para cada una de las capas, es decir, para cubrir aspectos como el servicio web (HTTP), el contenido dinámico, o el acceso a datos.

## Ejercicio 3: Instalando nuestro servidor web

Dispones de una máquina (o máquina virtual) que cuenta con el sistema operativo Ubuntu 14/16/18/20 recientemente actualizado, con el entorno de red configurado y conexión a Internet. Además, estás trabajando con la cuenta del usuario root. Indica cada uno de los pasos, y comandos implicados en ellos, para conseguir
hacer lo siguiente:

- Instalar el servidor web Apache desde el terminal de comandos.
- Arrancar, reiniciar, comprobar el estado y parar el servidor web Apache.
- Comprobar que está funcionando el servidor Apache desde un navegador
web.
- Cambiar el puerto por el cual está escuchando Apache pasándolo al
puerto 8088 y comprueba de nuevo desde tu navegador que está
funcionando.
- Cambiar la página web por defecto para que aparezcan tus apellidos más
un pantallazo de tu inicio del curso.

## Ejercicio 4: Haciendo las comunicaciones más seguras

Partiendo de la instalación de Apache del ejercicio anterior, instala un certificado de seguridad (SSL) en tu servidor y habilita el módulo de Apache correspondiente para que funcione correctamente. Comprueba desde tu navegador que ahora puedes
acceder al servidor usando el protocolo seguro (https).

## Ejercicio 5: Instalando un servidor de aplicaciones

Partiendo de la instalación de Apache del ejercicio 3, realiza la instalación del servidor de aplicaciones Apache Tomcat (es recomendable instalar una versión lo más reciente posible, la 9 o 10 al menos). Para ayudarte en el proceso de instalación encontrarás un foro dedicado a esta tarea, con guías y vídeos explicativos. Importante: para esta actividad solo hay que hacer la instalación y comprobar desde nuestro navegador que tenemos acceso a la página principal del servidor de aplicaciones. No hay que configurar el acceso al panel de administración ni crear usuarios.

## Ejercicio 6: Hosts virtuales

Ya sabemos que Apache permite tener más de un sitio web en un servidor, donde cada sitio puede estar asociado a un dominio diferente. Revisa el punto 5 de la documentación y explica qué es, para que se utiliza y cuál es la diferencia entre virtualhost por nombre y por IP. Pon un ejemplo de configuración de cada uno, usando las directiva 'VirtualHost', incluyendo capturas del fichero de configuración.

---

## Resultado

**Calificación**: 9,00 / 10,00

Calificado el martes, 16 de noviembre de 2021, 16:33 por Muñoz Carmona, Francisco Javier

**Comentarios de retroalimentación**:
Buenas, buena práctica!! Saludos, Javier

## Comentarios en la rúbrica

- Ejercicio 1:
	+ Enumera y explica cada una de las tecnologías asociadas a la parte servidor (0.25/0.5)
	+ Enumera y explica cada una de las tecnologías asociadas a la parte cliente (0.25/0.5)

- Ejercicio 6:
	+ Suficiente (0.5/1.0): Tienes que poner IPs y diferenciar claramente VirtualHost de nombre y de IP

---

## Corrección por mi parte

**Ejercicio 1**:

- Debería haber mencionado el resto de tecnologías que se utilizan en entorno cliente y servidor.
- Entorno cliente: Se requiere de un cliente web y una conexión a Internet para poder cargar la aplicación web alojada en el servidor. Si se ejecuta de forma local, bastará con un cliente web y un servidor como Apache. El cliente es fundamental puesto que es una aplicación que sirve para utilizar a la web. Alguno ejemplos de ellos son Chrome, Firefox o Safari. 

A partir de aquí, el comentario realizado por en el ejercicio original encajaría correctamente como segundo párrafo.

- Entorno servidor: Usualmente, se descarga un stack de aplicaciones como XAMPP para tener disponible todas las tecnologías requeridas para el desarrollo web en entorno servidor. XAMPP es un stack multiplataforma (la X de XAMPP significa cross-platform). Está compuesto por recursos open source, siendo Apache el servidor web, MySQL el gestor de base de datos y PHP/Perl los lenguaje de programación usados. 

A partir de aquí, el comentario realizado por en el ejercicio original encajaría correctamente como segundo párrafo.

**Ejercicio 6**:

- Fallo mío porque es cierto que las capturas del VirtualHost por IP y del VirtualHost por nombre son idénticas. Parece ser que dupliqué las imágenes.
