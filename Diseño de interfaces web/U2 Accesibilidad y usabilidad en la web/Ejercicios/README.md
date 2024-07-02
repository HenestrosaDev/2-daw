<p align="center">
	<img 
		width="49%" 
		src="./docs/index.png"
		alt="Índice"
		title="Índice"
	>
	&nbsp;
	<img 
		width="49%" 
		src="./docs/menus-navidad.png"
		alt="Menús Navidad"
		title="Menús Navidad"
	>
</p>

# UNIDAD 2: Accesibilidad y usabilidad en la web

## ¿Qué te pedimos que hagas? 

En esta tarea vamos a utilizar dos páginas web. La página principal de nuestro desarrollo (`index.html`) y una nueva página que describiremos en apartados posteriores: `menusNavidad.html`.

En caso de no disponer de página principal (`index.html`) por no haber realizado las tareas anteriores (o querer realizar una nueva página), indicar que ésta debe tener como mínimo los siguientes elementos:

- **Zona de identificación**: Debe contener logotipo y nombre de la empresa.
- **Zona de navegación**: En el ejercicio 1 se describirá la funcionalidad del menú que irá en esta zona.
- **Zona de contenido**: Incluir la información que se desee.
- **Pie de página**: Incluir el contenido que se desee.

De la página `index.html` solo se evaluará la zona de navegación.

## Ejercicio 1: Navegación

En este ejercicio vamos a desarrollar diferentes elementos que nos permitirán navegar por nuestra página web.

### **a) Menú Principal**

El menú que tendremos que implementar debe tener dos niveles.

Nota: Todas aquellas opciones huérfanas (que no se haya indicado enlace o no tengan más opciones) deben apuntar [aquí](https://www.w3.org/WAI/fundamentals/accessibility-intro/es)

Opciones del menú: 

- **Nosotros**: Sin opciones.
- **Platos**: Sin opciones.
- **Promociones**
- **Especial Navidad**:
	- **Menús**: Desde esta opción iremos a la página `menusNavidad.html`
	- **Horarios**
- **Reservas**: Sin opciones.

El menú debe adaptarse para dispositivos de menos de 768px. Para esta adaptación (menos de 768px) puede utilizarse un menú tipo hamburguesa, utilizando javascript si se quiere (comentar el código).

### **b) Ubicación en la que nos encontramos**

Se debe implementar un mecanismo que informe al usuario el lugar en que se encuentra en cada momento dentro de nuestra web (migas de pan).

---

## Ejercicio 2: Desarrollo (usable y accesible)

En este ejercicio vamos a desarrollar una página web donde se valorará el diseño, la usabilidad y la accesibilidad de la misma.

Debe crearse una página web relacionada con las comidas de Navidad que se celebrarán próximamente, denominada `menusNavidad.html`, y que se accederá desde el menú principal desde la opción **Especial Navidad → Menús**.

La página contendrá una zona de identificación, una zona de navegación, un pie de página (ya se ha indicado lo que debe contener cada uno de estos elementos) y una zona (o zonas) donde se tendrá que mostrar la siguiente información:

- **Imagen**: debe ser una imagen del salón de un restaurante decorado con motivos navideños.
- **Tabla con los diferentes menús**: Para cada menú (mínimo 3 menús) se mostrará la siguiente información.
	- Nombre del menú
	- Platos que incluye.
	- Precio.
	- Número mínimo de comensales.
- **Formulario para solicitar información sobre reservas para Navidad**

Descripción de los campos y restricciones que tendrá nuestro formulario:

- **Datos personales del solicitante**
	- **Nombre**: Máximo 15 caracteres – Obligatorio.
	- **Apellidos**: Máximo 30 caracteres – Obligatorio.
	- **Correo electrónico**: Máximo 20 caracteres - Obligatorio.
	- **Teléfono de contacto**: 9 caracteres – Numérico – Obligatorio – Debe empezar por 6,8,7 o 9.
	- **Desea recibir información si hay nuevos menús**: Valores Si o No. Valor por defecto: No - Obligatorio.
- **Menús** (campos opcionales)
	- **Seleccione el menú o menús que le interesan**: Añade un campo por cada menú incluido en la tabla anterior.
	- **Indique el tipo de comida**: Se debe seleccionar un valor y los posibles valores deben estar agrupados en tres tipos: familiar, amigos y trabajo. A continuación se describen los posibles valores:
		- **Familiar**:
			- Íntima (2-4 personas).
			- Reducida (5-11 personas).
			- Amplia (más de 12 personas).
		- **Amigos**:
			- Cercanos (2-8 personas).
			- Media (9-19 personas).
			- Multitudinaria (más de 20 personas).
		- **Trabajo**:
			- Autónomo. (2-4 personas).
			- PYME. (5-11 personas).
			- Gran empresa (más de 12 personas).
			
			(<u>Ayuda</u>: Utilizar el control `select` con el elemento `optgroup`).

- **Valoración**: Valore de 1 a 10 la experiencia de la última vez que fue a nuestro restaurante.
- **Botones**: Enviar y Cancelar.

Requisitos que debe cumplir la página:

- La página debe implementarse utilizando la tecnología grid y/o flex y debe existir un diseño diferente cuando la resolución del dispositivo sea inferior a 768px.
- La tabla tiene que cumplir con los requisitos de accesibilidad, tal que sea leía de forma correcta por un lector de pantalla.
- El formulario tiene que ser lo más usable y accesible posible. Para ello debes:
	- Utilizar los nuevos tipos de campos INPUT que proporciona HTML5. Como sabrás dependiendo de la naturaleza de la información que se va a introducir, podremos utilizar un tipo u otro de campo INPUT. El no utilizarlos penalizará.
	- En cada uno de los campos descritos anteriormente se indican las características que debe tener, número de caracteres, obligatorio, valores, etc.
	- Es obligatorio aplicar un estilo a los campos para saber cuándo son o no válidos. Intentar que sea lo más accesible posible.
	- Puedes aplicar los estilos que consideres necesarios al formulario.

Como siempre el desarrollo debe estar comentado y los recursos utilizados deben organizarse correctamente en carpetas.

En el documento de la tarea (`Tarea_02.pdf`) puedes incluir todos los comentarios y aclaraciones que consideres oportunos, recuerda que el desarrollo debe ser lo más usable posible.

---

## Ejercicio 3: Análisis de la accesibilidad

En el documento pdf  `Tarea_02.pdf` debes dar respuesta las siguientes cuestiones:

<ol type="a">
	<li>Justifica las tres decisiones más importantes que has realizado en el desarrollo relacionadas con la accesibilidad.</li>
	<li>Evaluación de la accesibilidad mediante una herramienta automática.</li>
</ol>

Realiza un **análisis de accesibilidad** de la página `menusNavidad.html`. Para ello accede utilizaremos la herramienta online [Examinator](http://examinator.net/).

Debes:

- Adjuntar captura de pantalla del informe (donde se vea claramente la puntuación que se te ha asignado) y de los resultados obtenidos (apartados Excelente, Mal, Muy Mal y Tablero). 
- Analizar la información obtenida.
- Realizar y explicar, al menos, tres tipos de mejoras de la accesibilidad de nuestra web. Indica con qué criterios de éxito están relacionadas las mejoras.
- Volver a analizar la página con las modificaciones realizadas y comprobar que la accesibilidad ha mejorado. Adjunta captura de pantalla del nuevo resultado, donde se pueda ver claramente la nueva puntuación así como los apartados Excelente, Mal, Muy Mal y Tablero.

**IMPORTANTE**: Si tienes varios problemas de un mismo tipo, corregir todos esos problemas se considera como solucionar un tipo de problema de accesibilidad.

En caso de que no hubiera que realizar ninguna mejora en la página `menusNavidad.html`, inténtalo con la página `index.html`. Si aún sigue sin haber que realizar ninguna mejora, ponte en contacto con el profesor.

**Si no se adjuntan las capturas de pantalla y/o no se razonan los cambios realizados, no se dará por válido este apartado.**

Existen otros tipos de validadores que realizan el análisis indicando la URL de nuestra web, pero para ello la página debe estar alojada en un hosting. Uno de estos validadores es **TAW**, por si quieres puedes utilizarlo en lugar de eXaminator.

---

## Ejercicio 4: Análisis de usabilidad

En el documento `Tarea_02.pdf` debes dar respuesta las siguientes cuestiones:

<ol type="a">
	<li>Justifica las tres decisiones más importantes que has realizado en el desarrollo relacionadas con la usabilidad.</li>
	<li>
		Evalúa la usabilidad de diferentes sitios web. A continuación se proponen los siguientes sitios web:
		<ul>
			<li>https://www.dipalme.org/</li>
			<li>https://www.is4k.es/</li>
			<li>https://www.incibe.es/</li>
			<li>https://www.juntadeandalucia.es/educacion/portals/web/formacion-profesional-andaluza/home</li>
		</ul>
		Debes analizar como mínimo dos (pueden ser más) de estos sitios y encontrar al menos 4 fallos (en total) de usabilidad distintos. El mismo fallo en distintas web contará como un único fallo. **NO** se calificará un análisis de un sitio web distinto de los propuestos.
		<br><br>
		Para cada apartado deben completarse los siguientes puntos:
		<ul>
			<li><strong>URL</strong>: Debes asegurarte que pones la dirección exacta donde has encontrado el fallo, en caso de que no se llegue de forma directa a dicha página debes indicar los pasos que hay que dar para llegar a ella. Si no se pone la ubicación exacta no se tendrá en cuenta el apartado.</li>
			<li><strong>Captura de pantalla.</strong></li>
			<li><strong>Pregunta</strong>: Texto de la pregunta para las que has respondido que NO al analizar si era usable.</li>
			<li><strong>Origen de la pregunta</strong>: Debe indicarse de forma clara el origen de donde se ha obtenido dicha pregunta, en caso de que no se indique el origen no se tendrá en cuenta el apartado. Si se utiliza la guía de evaluación sugerida debe indicarse de forma explícita y si es una distinta a ésta, debe facilitarse dicha guía o la dirección web donde se encuentra y la información necesaria para localizar la pregunta dentro de la nueva guía.</li>
			<li><strong>Justificación</strong>: Explicación de por qué contestaste que NO, por qué consideras que no cumple ese requisito de usabilidad. Si no se ha justificado correctamente el por qué no se cumple el criterio indicado, NO se dará por válido el apartado. </li>
		</ul>
		<br>
		Recuerda:
		<ul>
			<li>Debes indicar la URL exacta donde se encuentra el fallo, para ello se recomienda que una vez que hayas puesto la URL compruebes que accedes de forma directa al lugar donde has detectado el fallo. En caso de que no se acceda de forma directa, indica los pasos que hay que dar para acceder.</li>
			<li>Con respecto a la pregunta debes indicar la guía o documento utilizado para realizar el análisis de usabilidad. En caso contrario no se tendrá en cuenta el fallo.</li>
		</ul>
	</li>
	<br>
	<li>Velocidad de carga
		<br>
		Muy relacionado con la usabilidad hay un aspecto muy importante es la velocidad de carga de una página web. Existe la herramienta https://gtmetrix.com/ que nos da información sobre este aspecto y que nos puede ayudar a optimizarlo.
		<br><br>
		Con las mismas webs del apartado anterior (b) debes realizar lo siguiente:
		<ul>
			<li>Realizar el test e insertar la información en el documento de texto.</li>
			<li>Comentar las principales deficiencias detectadas.</li>
		</ul>
	</li>
</ol>

---

## Resultado

**Calificación**: 8,50 / 10,00

Calificado el martes, 27 de enero de 2022, 11:09 por Muñoz Carmona, Francisco Javier

**Comentarios de retroalimentación**: 

Buenas José Carlos! 

Has realizado una tarea muy buena aunque tiene algunos fallos. 

El principal que has tenido ha sido no incluir una tabla para descripción de los menús.  

El resto de deficiencias las puedes comprobar en la rúbrica.

Enhorabuena!

**Rúbrica**:

- E1: Ubicación. Implementa un mecanismo para que el usuario sepa en cada momento en que lugar (0.25/0.5)
- E2: Tabla. La tabla incluye la información solicitada. (0.125/0.25)
- E2: Tabla (accesibilidad). La tabla cumple con los requisitos de accesibilidad. (0/1)	
- E1 y E2: Organización y comentarios. Los diferentes elementos del proyecto web están bien organizados y el código desarrollado está comentado. (0.125/0.25)	