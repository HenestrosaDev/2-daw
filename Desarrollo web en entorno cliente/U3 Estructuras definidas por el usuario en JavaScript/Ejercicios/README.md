![](https://github.com/HenestrosaDev/2-daw/blob/main/Desarrollo%20web%20en%20entorno%20cliente/U3%20Estructuras%20definidas%20por%20el%20usuario%20en%20JavaScript/Ejercicios/docs/screenshot.png)

# UNIDAD 3: Estructuras definidas por el usuario en JavaScript
## <p align="center">¿Qué te pedimos que hagas?</p>

## Campeonato de baloncesto
Con la siguientes clases se pretende que seamos capaces de organizar un campeonato de baloncesto, restringido en características.

- **Participante**.
	- `Constructor(nombre, provincia)`. Incluye todas las propiedades/atributos.
	- **nombre**. `String`. No menos de 5 caracteres. Debe estar almacenado todo en mayúsculas.
	- **provincia**. `String`. Debe estar almacenado todas las letras en mayúsculas. No puede estar vacío. Si tiene menos de 5 caracteres, debe añadirse  "..."
	- **toString()**
	- Sus setters y getters de los atributos.

- **Jugador**. Hereda de `Participante` y añade las siguientes propiedades y métodos:
	- `Constructor(nombre, provincia, fechaNac, dorsal, posicion)`
 	- **fechaNac**. `Date`. La fecha debe estar comprendida entre el **01 Jan 1979** al **31 Dec 2011**.
	- **dorsal**. `Number`. Debe estar comprendido entre 1-25. Si se introduce un dato fuera del rango se guardará como 25.
	- **posicion**. Solo se acepta estos posibles valores "**a**"lero, "**p**"ivot, "**b**"ase, "**e**"escolta, "ap"alero-pivot
	- `toString()`
	- setters y getters de los atributos.

- Arbitro. Hereda de `Participante` y añade las siguientes propiedades y métodos:
	- `Constructor(nombre, provincia, anioFederado)`
	- **anioFederado**. El año será `Number`. No podrá estar vacío y no será mayor a 2021.
	- **toString()**
	- setters y getters de los atributos controlados.

- **Equipo**. Es la clase que va a guardar datos del equipo
	- `Constructor(nombreEquipo, ciudad, escudo, entrenador)`
	- **nombreEquipo**. `String`.  No puede estar en blanco. Todo en mayúsculas.
	- **ciudad**. `String`. No puede estar en blanco. La primera letra de la palabra tiene que estar en mayúscula y el resto en minúsculas.
	- **aJugadores**. Será un array donde se guardarán los jugadores de ese equipo. Solo puede contener objetos de tipo `Jugador`.
	- **escudo**. `String`. Si no termina en `.jpg` o `.png`, se debe poner una imagen por defecto.
	- **entrenador**. El nombre del entrenador. `String`. No puede ser inferior a 4 caracteres y no puede estar vacío.
	- `altaJugador(objeto Jugador)`. Método que introduce al jugador si no existe. Devuelve `true` si se ha podido dar de alta y `false` si no ha sido posible.
	- `eliminarJugador(string)`. Busca el jugador y lo elimina si existe. Devuelve `true` si se ha podido eliminar y `false` si no ha sido posible. 
	- `ordenaJugDorsal()`. Ordena el array de jugadores por el dorsal
	- `toString()`
	- Las propiedades deben tener sus respectivos getters y setters.

- **Campeonato**. Es la clase que va a guardar datos del campeonato
	- `Constructor(nombre, ciudad, descripcion)`
	- **nombre**. `String`. No puede estar en blanco.
	- **ciudad**. `String`. No puede estar en blanco. Por defecto, Córdoba.
	- **descripcion**. `String`. Una descripción del campeonato. No puede ser superior a 100 caracteres.
	- **_participantes**. `Array` donde se almacenarán los equipos participantes y los árbitros
	- **anadirParticipantes()**. Añade un equipo o un árbitro. Si es equipo, irá a la fila 1 del array y, si es árbitro, lo hará en la 0
	- **toString()**. Muestra todos los datos y la foto en una tabla. 
	- Las propiedades deben tener sus respectivos getters y setters controlados.

## Importante

- Para implementar las clases y objetos se usará la sintaxis ES6.
- Cada clase se implementará en un módulo independiente.
- En las clases no podrá usarse `document.write()` ni `alert()`.
- Cree al menos 1 campeonato, 4 equipos con 5 jugadores y 3 árbitros, 
- La comprobación de atributos deben realizarse en el método setter del atributo. Si no se cumplen las condiciones, el objeto no se creará. Para ello, se manejará una excepción que no permita crear el objeto, informando del problema.
- Cree y use un campeonato, 4 equipos con 5 jugadores y 3 árbitros, utilizando sus métodos, añadiendo y eliminando jugadores, equipos y árbitros. Los jugadores se mostrarán ordenados por dorsal.

--- 

## Resultado

**Calificación**: 9,60 / 10,00

Calificado el jueves, 20 de enero de 2022, 23:46 por Sánchez Rubio, Mª Luz