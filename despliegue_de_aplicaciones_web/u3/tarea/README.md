# TAREA Unidad 3: Instalación y administración de servidores de ficheros de alta disponibilidad y alto rendimiento

## Índice

- [¿Qué te pedimos que hagas?](#qué-te-pedimos-que-hagas)
	- [Actividad 1: Modos de funcionamiento de FTP. (RA4.d) (0.50 Puntos)](#actividad-1-modos-de-funcionamiento-de-ftp-ra4d-050-puntos)
	- [Actividad 2: Servidor FTP.](#actividad-2-servidor-ftp)
		- [Actividad 2.1: Instalación de ProFTPd. (RA4a, RA4i) (1.00 Puntos)](#actividad-21-instalación-de-proftpd-ra4a-ra4i-100-puntos)
		- [Actividad 2.2: Acceso FTP anónimo. (RA4c, RA4e, RA4h) (1.50 Puntos)](#actividad-22-acceso-ftp-anónimo-ra4c-ra4e-ra4h-150-puntos)
		- [Actividad 2.3: Creación de usuarios virtuales. (RA4.b, RA4.e, RA4.d) (2.00 Puntos)](#actividad-23-creación-de-usuarios-virtuales-ra4b-ra4e-ra4d-200-puntos)
		- [Actividad 2.4: Conexión segura con TLS. (RA4.e, RA4.f) (1.50 Puntos)](#actividad-24-conexión-segura-con-tls-ra4e-ra4f-150-puntos)
	- [Actividad 3: Cliente FTP](#actividad-3-cliente-ftp)
		- [Actividad 3.1: Instalación de Filezilla FTP Client. (RA4.e, RA4.i) (0.50 Puntos)](#actividad-31-instalación-de-filezilla-ftp-client-ra4e-ra4i-050-puntos)
		- [Actividad 3.2: Conexión con usuario anónimo. (RA4.e, RA4.c, RA4.i) (1.00 Puntos)](#actividad-32-conexión-con-usuario-anónimo-ra4e-ra4c-ra4i-100-puntos)
		- [Actividad 3.3: Conexión con usuario virtual. (RA4.b, RA4.e, RA4.i) (1.00 Puntos)](#actividad-33-conexión-con-usuario-virtual-ra4b-ra4e-ra4i-100-puntos)
		- [Actividad 3.4: Conexión segura con TLS. (RA4.e, RA4.f, RA4.i) (1.00 Puntos)](#actividad-34-conexión-segura-con-tls-ra4e-ra4f-ra4i-100-puntos)
- [Resultado](#resultado)

<br>

## ¿Qué te pedimos que hagas?

En este bloque de actividades vamos a realizar la instalación y configuración del servicio FTP tanto a nivel de servidor como de cliente, sobre un servidor Linux Ubuntu 14/16/18/20 (se admite Debian 9/10/11). A continuación enumero los distintos apartados de la práctica. Recordad que todo debe ir documentado con pantallazos con vuestra foto de perfil y explicaciones de cada una de los actividades.

### Actividad 1: Modos de funcionamiento de FTP. (RA4.d) (0.50 Puntos)

Explica cómo funcionan los dos modos de conexión del cliente FTP, indicando las similitudes, diferencias y puertos utilizados por cada uno. Puedes ayudarte de los contenidos del punto 2.4 de la unidad.

### Actividad 2: Servidor FTP.

#### Actividad 2.1: Instalación de ProFTPd. (RA4a, RA4i) (1.00 Puntos)

Realiza la instalación del servidor FTP ProFTPd en modo "standalone" en tu servidor Ubuntu desde el repositorio, comprobando su funcionamiento e
indicando cómo se inicia y cómo se para, cómo se comprueba su estado y en qué fichero podemos comprobar su configuración.

#### Actividad 2.2: Acceso FTP anónimo. (RA4c, RA4e, RA4h) (1.50 Puntos)

Configura el servidor ProFTPd para que se pueda acceder con usuario anónimo. Crea una carpeta /var/ftp/ftplibre y dentro de ella, un fichero de texto cuyo nombre será tu nombre y tu primer apellido y cuya extensión será txt. Recuerda que debes configurar adecuadamente los permisos de la carpeta para que el usuario anónimo solo pueda leer o descargar ficheros en esta carpeta. Ajusta los parámetros del servidor FTP para que solo permita 5 conexiones simultáneas de usuarios anónimos. Una vez realizado lo anterior, conéctate con el usuario anónimo y comprueba que tienes acceso al fichero, utilizando el cliente FTP incluido en Linux desde la consola de comandos y también usando un navegador web.

#### Actividad 2.3: Creación de usuarios virtuales. (RA4.b, RA4.e, RA4.d) (2.00 Puntos)

Configura el servidor ProFTPd para que tenga un **usuario virtual** con el nombre '**userXXX**' donde XXX son los 3 últimos dígitos de tu DNI. Comprueba que puedes conectarte desde la terminal de comandos. El
fichero que contiene los usuarios estará en `/etc/proftpd/ftp.daw.user`.
Los archivos y documentos se almacenarán en la carpeta `/var/ftp/ftpdaw`, por lo que deberemos configurar los permisos de esta carpeta (y del fichero de usuarios) para que los pueda gestionar el usuario ftp (grupo **nogroup**).

#### Actividad 2.4: Conexión segura con TLS. (RA4.e, RA4.f) (1.50 Puntos)

Configura el servidor FTP para que acepte conexiones seguras (**TLS**). Instala el certificado en tu servidor Ubuntu y haz las modificaciones oportunas para que el usuario creado en el apartado anterior pueda conectarse mediante esta conexión cifrada. Debes documentar adecuadamente tanto la creación del certificado como la modificación del fichero de configuración para que lo use.

### Actividad 3: Cliente FTP

Ahora que ya hemos instalado el servidor FTP vamos a
instalar y configurar un cliente gráfico FTP que acceda a los servicios desplegados en el ejercicio anterior. Para ello deberás realizar las siguientes actividades:

#### Actividad 3.1: Instalación de Filezilla FTP Client. (RA4.e, RA4.i) (0.50 Puntos)

Instala a través del gestor de paquetes de Ubuntu, el cliente gráfico de FTP Filezilla, documentando adecuadamente el proceso.

#### Actividad 3.2: Conexión con usuario anónimo. (RA4.e, RA4.c, RA4.i) (1.00 Puntos)

Configura un perfil de Filezilla para el acceso anónimo al servidor FTP que has configurado en la **actividad 2.2** y haz una prueba de conexión, comprobando que te permite acceder a la carpeta en modo lectura y que te deja abrir el fichero pero no sobreescribirlo o añadir un fichero nuevo. Documenta adecuadamente el proceso.

#### Actividad 3.3: Conexión con usuario virtual. (RA4.b, RA4.e, RA4.i) (1.00 Puntos)

Configura un perfil de Filezilla para acceder al servidor FTP con el usuario creado en la **actividad 2.3** y conéctate comprobando que tienes acceso a los recursos correspondientes y tienes los permisos adecuados. Documenta adecuadamente el proceso.

#### Actividad 3.4: Conexión segura con TLS. (RA4.e, RA4.f, RA4.i) (1.00 Puntos)

Modifica el perfil de Filezilla creado en la **actividad 3.3** para que se conecte mediante conexión segura al servidor FTP y haz una prueba de conexión con la configuración que estableciste en el **actividad 2.4** Documenta adecuadamente el proceso.

---

## Resultado

**Calificación**: 9,00 / 10,00

Calificado el martes, 3 de mayo de 2021, 16:33 por Muñoz Carmona, Francisco Javier

**Comentarios de retroalimentación**:
Buenas, José Carlos no adjuntas los ficheros de configuración, por lo que te resto un punto. Por lo demás, ha hecho un buen trabajo.

Saludos,
Javier