window.addEventListener("load", () => {
	// Cuando la página cargue, el título tendrá el foco
	document.getElementById("lecture__title").focus();
	// Cuando se envíe, comprobamos la validez de los valores
	document.getElementById("lecture__submit").addEventListener("click", (e) => {
		e.preventDefault();
		if (areInputsValid()) {
			// Limpiamos los valores anteriores
			document.getElementById("form__feedback").innerHTML = "";
			// Añadimos los elementos al padre con los valores actuales
			showResult();
		}
	});
});

/**
 * Comprobación de los valores de los inputs
 * @returns true si está todo en orden, false si hay algún campo no válido.
 */
const areInputsValid = () => {
	const category = document.getElementById("lecture__category");
	if (category.value === "default") {
		category.classList.add("is-invalid");
		return false;
	} else {
		category.classList.remove("is-invalid");
	}

	for (const el of document
		.getElementById("lecture__form")
		.querySelectorAll("[required]")) {
		if (!el.checkValidity()) {
			el.reportValidity();
			return false;
		}
	}
	return true;
};

const appendElement = (key, value) => {
	const node = document.createElement("p");
	node.innerHTML = `<strong>${key}</strong>: ${value}`;
	document.getElementById("form__feedback").appendChild(node);
};

/**
 * Muestra el resultado en el div con id "form__feedback" de los inputs
 * rellenados del formulario.
 */
const showResult = () => {
	appendElement("Resultados", "");
	for (const el of document
		.getElementById("lecture__form")
		.querySelectorAll("input")) {
		appendElement(el.labels[0].innerText, el.value);
	}
	// Como <textarea> no es un elemento <input>, tenemos que mostrarlo fuera del
	// bucle
	appendElement(
		document.getElementById("lecture__description").labels[0].innerText,
		document.getElementById("lecture__description").value
	);
	// Como <select> no es un elemento <input>, tenemos que mostrarlo fuera del
	// bucle
	appendElement(
		document.getElementById("lecture__category").getAttribute("aria-label"),
		document.getElementById("lecture__category").value
	);

	// Quitamos el display:none del CSS y mostramos el div con los elementos p
	// añadidos
	document.getElementById("form__feedback").classList.remove("d-none");
};
