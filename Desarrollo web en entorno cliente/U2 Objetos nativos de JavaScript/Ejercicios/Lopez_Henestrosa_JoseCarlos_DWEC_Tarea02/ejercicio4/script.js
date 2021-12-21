"use strict";

// Le pedimos al usuario que introduzca la medida de los catetos
const inputLegs = () => {
	const rawLegs = showPrompt();
	/* Eliminamos aquellos caracteres que no sean números o ";",
	el cual será el caracter que indique la separación entre las medidas */
	const legs = rawLegs.replace(/[^0-9;]+/g, '').split(";");
	// Comprobamos si solo hay dos catetos y sus valores no están vacíos
	if (legs.length === 2 && (legs[0] !== "" && legs[1] !== "")) {
		confirmInput(legs);
	} else {
		// Usamos recursividad para que el usuario vuelva a introducir las medidas
		inputLegs();
	}
}

const showPrompt = () => prompt("Introduce los dos catetos en este formato: 'X; Y' donde 'X' será el primer cateto e 'Y' el segundo.");

// Aseguramos que el usuario quiere introducir los valores indicados
const confirmInput = (legs) => {
	if (confirm(`El primer cateto es ${legs[0]} y el segundo es ${legs[1]}. ¿Deseas continuar?`)) {
		printResults(legs);
	} else {
		// Volvemos a pedir al usuario que introduzca las medidas
		inputLegs();
	}
}

const printResults = (legs) => {
	const results = document.getElementById("results");
	// Creamos el elemento que muestre el valor de la hipotenusa
	const result = document.createElement("p");
	result.textContent = `La hipotenusa del cateto1 = ${legs[0]} y el cateto2 = ${legs[1]} es ${calculateHypotenuse(legs).toFixed(2)}`;
	console.log(result.textContent);
	// Adjuntamos los elementos creados al elemento que contiene los resultados
	results.append(result);
	/* Hacemos que aparezca el elemento que contiene los
	resultados quitando la clase con el atributo display: none; */
	results.classList.remove("no-display");
}

const calculateHypotenuse = (legs) => Math.sqrt((legs[0] ** 2) + (legs[1] ** 2));