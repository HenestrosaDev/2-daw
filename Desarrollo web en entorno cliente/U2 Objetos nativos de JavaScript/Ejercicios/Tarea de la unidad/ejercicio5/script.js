"use strict";

// Cargamos los enunciados y resultados cuando la ventana cargue el contenido.
window.onload = () => loadStatements();

const sentence = "JavaScript es un lenguaje scripting";

// Mostramos los resultados de los enunciados por pantalla
const loadStatements = () => {
	const statements = [
		"Longitud de la frase",
		"Posición en la que empieza la palabra <strong>scripting</strong>",
		"Palabra <strong>lenguaje</strong> extraída en una variable",
		"Primera posición de la letra <strong>p</strong>",
		"Última posición de la letra <strong>p</strong>",
		"Frase en mayúsculas",
		"Frase en minúsculas",
		"Palabra <strong>scripting</strong> reemplazada por <strong>en entorno cliente</strong>",
		"Espacios en blanco eliminados de la oración",
		"Todas las <strong>e</strong> eliminadas, tanto minúsculas y mayúsculas",
		"Redondeo al número más cercano a 50.49",
		"Número aleatorio entre 225 y 550",
		"Número más pequeño de (34, 56, -3, -24)",
	];

	const statementsDiv = document.getElementById("statements");

	// Cargamos cada apartado en un div, el cual contiene un label y un input.
	for (let i = 0; i < statements.length; i++) {
		const statementDiv = document.createElement("div");
		const statementLabel = document.createElement("label");
		let statementInput = document.createElement("input");
		statementInput.classList.add("form__item");
		statementInput.disabled = true;

		statementDiv.id = `statement__${i + 1}`;
		statementLabel.htmlFor = `${statementDiv.id}__input`;
		statementLabel.innerHTML = `${statements[i]}:`;
		statementInput.id = statementLabel.htmlFor;

		statementInput.value = setText(i);
		console.log(
			i + 1 + ". " + statementLabel.textContent + " " + statementInput.value
		);

		statementDiv.append(statementLabel, statementInput);
		statementsDiv.appendChild(statementDiv);
	}
};

// Dependiendo del número del enunciado, ejecutaremos un método u otro
const setText = (statementNumber) => {
	switch (statementNumber) {
		case 0:
			return stringLength();
		case 1:
			return scriptingPosition();
		case 2:
			return extractLenguaje();
		case 3:
			return firstPositionOfP();
		case 4:
			return lastPositionOfP();
		case 5:
			return uppercaseSentence();
		case 6:
			return lowercaseSentence();
		case 7:
			return swapWords();
		case 8:
			return removeWhitespace();
		case 9:
			return removeLetterE();
		case 10:
			return roundNumber();
		case 11:
			return getRandom();
		case 12:
			return getMin();
	}
};

// Toda la lógica de los métodos llamados en `setText`
const stringLength = () => sentence.length;
const scriptingPosition = () => sentence.indexOf("scripting");
const extractLenguaje = () => {
	const lenguaje = sentence.match(/lenguaje/i)[0];
	return lenguaje;
};
const firstPositionOfP = () => sentence.indexOf("p");
const lastPositionOfP = () => sentence.lastIndexOf("p");
const uppercaseSentence = () => sentence.toUpperCase();
const lowercaseSentence = () => sentence.toLowerCase();
const swapWords = () => sentence.replace("scripting", "en entorno cliente");
const removeWhitespace = () => sentence.replace(/\s/g, "");
const removeLetterE = () => sentence.replace(/e/gi, "");
const roundNumber = () => Math.round(50.49);
const getRandom = () => Math.round(Math.random() * (550 - 225) + 225);
const getMin = () => Math.min(34, 56, -3, -24);
