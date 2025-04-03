# TAREA Unidad 4: Servicios de red implicados en el despliegue

## Índice

- [¿Qué te pedimos que hagas?](#qué-te-pedimos-que-hagas)
	- [Ejercicio 1: Cuestiones de dominios e IPs](#ejercicio-1-cuestiones-de-dominios-e-ips)
		- [Actividad 1.1: (0,25 Puntos)](#actividad-11-025-puntos)
		- [Actividad 1.2: (Punto 2) (0,25 Puntos)](#actividad-12-punto-2-025-puntos)
		- [Actividad 1.3: (Punto 2.2) (0,50 Puntos)](#actividad-13-punto-22-050-puntos)
		- [Actividad 1.4: (Punto 2.1.2 y 2.6) (0.50 Puntos)](#actividad-14-punto-212-y-26-050-puntos)
	- [Ejercicio 2: Servidor DNS](#ejercicio-2-servidor-dns)
		- [Actividad 2.1: Instalación de bind9. (1.00 Punto)](#actividad-21-instalación-de-bind9-100-punto)
		- [Actividad 2.2: Configuración de zona directa e inversa. (1.50 Puntos)](#actividad-22-configuración-de-zona-directa-e-inversa-150-puntos)
		- [Actividad 2.3: Creación de registros. (2.00 Puntos)](#actividad-23-creación-de-registros-200-puntos)
		- [Actividad 2.4: Comprobación de los registros que funcionan en el DNS. (1.50 Puntos)](#actividad-24-comprobación-de-los-registros-que-funcionan-en-el-dns-150-puntos)
	- [Ejercicio 3: Servidor LDAP](#ejercicio-3-servidor-ldap)
		- [Actividad 3.1: Instalación de LDAP (1.50 Puntos)](#actividad-31-instalación-de-ldap-150-puntos)
		- [Actividad 3.2: Añadir objetos al directorio LDAP. (1.00 Puntos)](#actividad-32-añadir-objetos-al-directorio-ldap-100-puntos)
- [Notas](#notas)
- [Resultado](#resultado)

<br>

## ¿Qué te pedimos que hagas?

En este bloque de actividades vamos a realizar algunas preguntas teóricas, la instalación y configuración del servicio dns y por último la instalación de **ldap** , sobre un servidor Linux Ubuntu 14/16/18/20 (Se admite Debian 9/10/11). A continuación enumero los distintos apartados de la práctica. Recordad que todo debe ir documentado con pantallazos con vuestra foto de perfil y explicaciones de cada una de las actividades:

### Ejercicio 1: Cuestiones de dominios e IPs

Explica cómo funcionan los dos modos de conexión del cliente FTP, indicando las similitudes, diferencias y puertos utilizados por cada uno. Puedes ayudarte de los contenidos del punto 2.4 de la unidad.

#### Actividad 1.1: (0,25 Puntos)

Descubra cuál es la dirección IP de las siguientes páginas y accede
utilizando un navegador web a través de su IP: http://www.rediris.es,
http://www.google.es

#### Actividad 1.2: (Punto 2) (0,25 Puntos)

¿Qué hace que pueda accederse a la computadora conectada a Internet a través de la dirección IP a través de la URL? ¿Qué ventajas tiene este sistema?

#### Actividad 1.3: (Punto 2.2) (0,50 Puntos)

¿Puede ocurrir que tengamos conexión a internet, pudiendo utilizar servicios como el correo electrónico, y no podamos acceder a páginas web? ¿Cómo lo solucionaríamos?

#### Actividad 1.4: (Punto 2.1.2 y 2.6) (0.50 Puntos)

¿Le suena el dominio TK? ¿De dónde es? ¿Qué diferencia hay entre dominios de dos letras y dominios de tres letras? ¿Quién regula los dominios?

### Ejercicio 2: Servidor DNS

En este ejercicio realizaremos la instalación y configuración del servidor de DNS bind9 en nuestro servidor Linux Ubuntu.

#### Actividad 2.1: Instalación de bind9. (1.00 Punto)

Instale y configure un servidor DNS en la distribución Ubuntu instalada en virtualbox. El servidor DNS será **bind9** y será necesario configurarlo y comprobar que funciona correctamente. Para ello, se configura una IP fija en el fichero `/etc/netplan/00-installer-config.yaml`. Por ejemplo, una IP válida sería **192.168.1.34** (del tipo **privada**), más la máscara y toda la configuración necesaria.

#### Actividad 2.2: Configuración de zona directa e inversa. (1.50 Puntos)

Crear un dominio que se llame `[nombredelalumno].ptec.es`. En mi caso,
sería javier.ptec.es. Es necesario configurar la **zona directa e inversa** en los ficheros **ptec.db** y **ptec.rev** de forma adecuada y respectivamente.

#### Actividad 2.3: Creación de registros. (2.00 Puntos)

Es necesario que el servicio DNS resuelva de forma directa e inversa los siguientes registros:
- el registro del servidor que se llama `ftpexterno`.
- el registro de un equipo de aplicaciones llamado `uw000455`.
- el registro de un servidor de correo llamado `uwcorreoweb`.

Es necesario revisar el log para comprobar que las declaraciones realizadas son correctas.

#### Actividad 2.4: Comprobación de los registros que funcionan en el DNS. (1.50 Puntos)

Es necesario comprobar que los registros DNS declarados en el apartado
anterior funcionan correctamente. Para ello, es necesario usar los comandos `nslookup` y `dig`.

### Ejercicio 3: Servidor LDAP

#### Actividad 3.1: Instalación de LDAP (1.50 Puntos)

Hay que instalar el servidor OpenLDAP llamado **slapd**. El directorio raíz será **ptec.com**, la **password** del administrador será **admin** para todos los alumnos.

#### Actividad 3.2: Añadir objetos al directorio LDAP. (1.00 Puntos)

Hay que crear un fichero `.ldif` que contendrá una unidad organizativa llamada `empleados`. Posteriormente, hay que añadir a esta unidad organizativa el nombre de un empleado con sus características, para ello cada uno pondrá su nombre. Hay que añadir el fichero `.ldif` junto al fichero `.sh` que se ha creado para añadir los ficheros `.ldif`.

Los ficheros que hay que adjuntar son los siguientes:

- `datos.ldif`
- `ex.sh` que contendrá el comando para añadir el fichero anterior al
directorio.

---

## Notas 

En la página 3 hay dos capturas de Google que, realmente, son dos gifs que no se pueden reproducir debido a estar contenidos en un PDF. En el directorio `/archivos/1` están los archivos.

---

## Resultado

**Calificación**: 10,00 / 10,00

Calificado el martes, 3 de mayo de 2021, 16:33 por Muñoz Carmona, Francisco Javier

**Comentarios de retroalimentación**: Perfecto José Carlos!!! Saludos, Javier