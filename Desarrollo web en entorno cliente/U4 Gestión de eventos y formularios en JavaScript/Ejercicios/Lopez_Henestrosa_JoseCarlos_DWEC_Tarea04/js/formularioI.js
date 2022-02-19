/* 
 * Creamos un objeto 'inputs' con todos los 
 * inputs de nuestro HTML.
 */
const inputs = {
	fullName: document.getElementById("participant__full_name"),
	birthYear: document.getElementById("participant__birth_year"),
	username: document.getElementById("participant__username"),
	password: document.getElementById("participant__password"),
	repPassword: document.getElementById("participant__rep_password"),
}

window.addEventListener("load", () => {
	initializeRequired(inputs);
	addEvents(inputs);
});

const initializeRequired = (inputs) => {
	// Iteramos por cada propiedad del objeto
	for (const [key, input] of Object.entries(inputs)) {
		/*
		 * Definimos, con la propiedad required, 
		 * que los campos son obligatorios
		 */
		input.required = true;
	}
}

const addEvents = (i) => {
	let modal = document.getElementById("confirm__modal");

	i.fullName.addEventListener("focusout", function() { this.value = this.value.toUpperCase() });
	i.birthYear.addEventListener("input", function() { checkBirthYearValidity(this) });
	i.username.addEventListener("input", function() { checkUsernameValidity(this) });
	i.password.addEventListener("input", function() { checkPasswordsValidity(this, i.repPassword) });
	i.repPassword.addEventListener("input", function() { checkPasswordsValidity(i.password, this) });
	document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
		checkbox.addEventListener("click", function() { checkCheckboxes() });
	});

	document.getElementById("modal__close").addEventListener("click", function() { 
		modal.style.display = "none";
		document.getElementById("modal__body").innerHTML = '';
	});
	document.getElementById("modal__confirm").addEventListener("click", function () {
		window.location.reload();
	});

	document.getElementById("participant__submit").addEventListener("click", function(event) {
		event.preventDefault();
		handleSubmit(i, modal);
	});
}

// Comprobar las condiciones de los checkboxes

const checkMatch = (value) => {
	return (regex) => regex.test(value);
};

/**
 * Determina si una condición del feedback proporcionado 
 * al usuario se cumple o no. En caso de que se cumpla,
 * se tacha de la lista.
 * 
 * @param {String} id: Identificador del elemento a controlar
 * @param {Boolean} shouldStrike: Determina si se tiene que
 * añadir o no la clase
 * @param {String} classToHandle: Contiene la clase a añadir
 * o eliminar. Por defecto es 'text-decoration-line-through'
 * ya que es el valor más recurrente.
 */
const handleCondition = (id, shouldAdd, classToHandle = "text-decoration-line-through") => {
	if (shouldAdd) {
		document
			.getElementById(id)
			.classList.add(classToHandle);
	} else {
		document
			.getElementById(id)
			.classList.remove(classToHandle);
	}
}

/*
 ********************** AÑO NACIMIENTO **********************
 ************************************************************
 El año estará comprendido entre  1957 y 2003
 ************************************************************
 - ^ delimitador (comienzo de la cadena)
 - 19[6789]\d para años entre 1960 y 1999 (ambos incluidos)
 - 195[789] para años entre 1957 y 1959
 - 200[0123] para años entre el 2000 y 2003
 - $ delimitador (final de la cadena)

 // ESTE ES EL REGEX: /^(19[6789]\d|195[789]|200[0123])$/
 */
const checkBirthYearValidity = (birthYear) => {
	if (checkMatch(birthYear.value)(/^(19[6789]\d|195[789]|200[0123])$/)) {
		birthYear.classList.add("is-valid");
		birthYear.classList.remove("is-invalid");
		birthYear.style.backgroundColor = "white";
	} else {
		birthYear.classList.remove("is-valid");
		birthYear.classList.add("is-invalid");
		birthYear.style.backgroundColor = "yellow";
	}
}

/*
 ********************** NOMBRE USUARIO **********************
 Dividimos el RegExp en 2 grupos (delimitados por paréntesis)
 ************************************************************
 GRUPO 1:
 El primer carácter del nombre de usuario será una consonante
 en mayúscula.
 ************************************************************
 Regex: ^([^ -AEIOU[-ÿ])

 - El primer ^ afirma la posición al comienzo de la cadena.
 - El ^ contenido en el grupo comprueba que el nombre de
  usuario NO comienza con el patrón determinado.
 -  -A excluye los caracteres ASCII comprendidos entre 
 el índice 32 ( ) y el 65 (A).
 - EIOU son caracteres a excluir dentro del rango de 
 consonantes en mayúscula.
 - [-ÿ El carácter [ es el valor que sucede al carácter Z, 
	por lo que todos los caracteres consecuentes son 
	innecesarios. -ÿ filtra los caracteres hasta ÿ, el cual es 
	el último carácter ASCII (255).

 ************************************************************
 GRUPO 2:
 El resto de caracteres en minúsculas. 
 Letras, incluida la ñ, vocales acentuadas, números y _
 ************************************************************
 Regex: ([a-z0-9_à-úñ])

 - \w incluye el alfabeto (minúscula y mayúscula), números, _
 - À-ú para vocales acentuadas (mayúscula y minúscula).
 - ñ para incluir la letra ñ.

 ************************************************************
 Mínimo 5 y máximo 15 caracteres
 ************************************************************
 - {4,14} el número de veces que se tiene que repetir el 
 patrón, sin tener en cuenta la primera consonante mayúscula.
 
 Regex final: /^([^ -AEIOU[-ÿ])([a-z0-9_à-úÑñ]){4,14}$/
 */
const checkUsernameValidity = (username) => {
	if (checkMatch(username.value)(/^([^ -AEIOU[-ÿ])([a-z0-9_à-úÑñ]){4,14}$/)) {
		username.classList.add("is-valid");
		username.classList.remove("is-invalid");
		username.style.backgroundColor = "white";
	} else {
		username.classList.remove("is-valid");
		username.classList.add("is-invalid");
		username.style.backgroundColor = "yellow";
		checkUsernameMatches(username.value);
	}
}

const checkUsernameMatches = (value) => {
	const checkMatchOfValue = checkMatch(value);
	
	checkMatchOfValue(/^([^ -AEIOU[-ÿ])/)
		? handleCondition("username__start", true)
		: handleCondition("username__start", false);

	checkMatchOfValue(/([a-z0-9_à-úÑñ])/)
		? handleCondition("username__lowercase", true)
		: handleCondition("username__lowercase", false)

	checkMatchOfValue(/^[ -~]{5,15}$/)
		? handleCondition("username__length", true)
		: handleCondition("username__length", false)
}

/*
 ************************ CONTRASEÑA ************************
 ************************************************************
 Debe tener, al menos, un número par.
 ************************************************************
 (?=.*[02468])

 ************************************************************
 Debe tener, al menos, un carácter $&@#
 ************************************************************
 (?=.*[$&@#])

 ************************************************************
 Debe tener al menos un carácter alfabético en mayúscula.
 ************************************************************
 (?=.*[A-ZÑ])

 ************************************************************
 No puede contener la palabra 'pass'
 ************************************************************
 (?!.*pass)

 ************************************************************
 Al menos 8 caracteres y 20 máximo
 ************************************************************
 {8,20}

 // REGEX: ^(?!.*pass)(?=.*[02468])(?=.*[$&@#]).{8,20}$
 */
const checkPasswordsValidity = (password, repPassword) => {
	const regexPassword = /^(?!.*pass)(?=.*[02468])(?=.*[$&@#])(?=.*[A-ZÑ]).{8,20}$/;

	if (checkMatch(password.value)(regexPassword) && password.value === repPassword.value) {
		password.classList.add("is-valid");
		password.classList.remove("is-invalid");
		password.style.backgroundColor = "white";
		repPassword.classList.add("is-valid");
		repPassword.classList.remove("is-invalid");
		repPassword.style.backgroundColor = "white";
	} else if (!checkMatch(password.value)(regexPassword)) {
		password.classList.remove("is-valid");
		password.classList.add("is-invalid");
		password.style.backgroundColor = "yellow";
		checkPasswordMatches(password.value);
		repPassword.classList.remove("is-valid");
		repPassword.classList.remove("is-invalid");
		repPassword.style.backgroundColor = "white";
	} else { // password y repPassword no coinciden
		password.classList.add("is-valid");
		password.classList.remove("is-invalid");
		password.style.backgroundColor = "white";
		repPassword.classList.remove("is-valid");
		repPassword.classList.add("is-invalid");
		repPassword.style.backgroundColor = "yellow";
	}
}

const checkPasswordMatches = (value) => {
	const checkMatchOfValue = checkMatch(value);
	
	checkMatchOfValue(/(?=.*[02468])/)  
		? handleCondition("password__even_number", true)
		: handleCondition("password__even_number", false)

	checkMatchOfValue(/(?=.*[$&@#])/)
		? handleCondition("password__special_char", true)
		: handleCondition("password__special_char", false)

	checkMatchOfValue(/(?=.*[A-ZÑ])/)
		? handleCondition("password__uppercase", true)
		: handleCondition("password__uppercase", false)

	checkMatchOfValue(/^[ -~]{8,20}$/)
		? handleCondition("password__length", true)
		: handleCondition("password__length", false)
}


/*
 ************************ CHECKBOXES ************************
 ************************************************************
	Como mínimo, se podrá elegir 1 opción y como máximo 3.
	************************************************************
 */
const checkCheckboxes = () => {
	const checkedLength = document.querySelectorAll('input[type="checkbox"]:checked').length;
	if (checkedLength >= 1 && checkedLength <= 3) {
		handleCondition("checkbox__feedback", true, "d-none");
		handleCondition("checkbox__feedback", false, "is-invalid");
	} else {
		handleCondition("checkbox__feedback", false, "d-none");
		handleCondition("checkbox__feedback", true, "is-invalid");
	}
}

/*
 ************************** SUBMIT **************************
 ************************************************************
 Al pulsar este botón se comprobará que todos los datos son 
 requeridos y que los datos son correctos según lo 
 establecido en las expresiones regulares y en las 
 especificaciones del ejercicio.
 ************************************************************
 El aviso de datos incorrectos se realizarán en el span 
 correspondiente al dato y se cambiará el fondo de la caja 
 de texto al color amarillo. 
 ************************************************************
 Si todos los datos son correctos, mostrarlos en una ventana 
 modal y pedir confirmación de envío. 
 */
const handleSubmit = (inputs, modal) => {
	console.log(Object.values(inputs).every(i => i !== null && i !== ''));
	if (
		document.getElementsByClassName("is-invalid").length === 0 
		// Comprobación de que ningún elemento es nulo o vacío
		&& Object.values(inputs).every(i => i.value !== null && i.value !== '')
	) {
		modal.style.display = "block"; // Despliega el modal
		handleCondition("form__feedback", true, "d-none");
		// Rellenar cuerpo del modal
		for (const [key, element] of Object.entries(inputs)) {
			const node = document.createElement("p");
			node.innerHTML = `<strong>${element.labels[0].innerText}</strong>: ${element.value}`;
			document.getElementById("modal__body").appendChild(node);
		}
	} else {
		handleCondition("form__feedback", false, "d-none");
	}
}