"use strict";

// Función que se encarga de obtener lo que pide el ejercicio
const getYearsWhere6thDecIsMonday = () => {
	// Aquí uso un array para poder pasarlo al método que se encarga de imprimir
	// los resultados en el HTML, lo cual no interfiere con la funcionalidad
	// básica que pide el ejercicio.
	let matchedYears = [];

	for (let year = 2021; year <= 2100; year++) {
		const d = new Date(`December 6, ${year} 00:00:00`);

		// getDay() devuelve valores del 0 (domingo) al 6 (sábado).
		// Comprobamos si el día de la fecha indicada arriba cae en lunes (1).
		if (d.getDay() == 1) {
			matchedYears.push(d.getFullYear());

			// Con esto, ya estaría hecho lo que pide el ejercicio
			console.log(d.getFullYear());
		}
	}
	displayResults(matchedYears);
};

// Esta función creará tantos elementos como años haya en el array
const displayResults = (matchedYears) => {
	const results = document.getElementById("results");

	// Iteramos sobre los años almacenados
	for (let year of matchedYears) {
		// Creamos un párrafo para cada año y lo adjuntamos al elemento padre
		// declarado arriba
		const yearElement = document.createElement("p");
		yearElement.textContent = year;
		results.appendChild(yearElement);
	}

	// Hacemos que aparezca el elemento que contiene los resultados quitando la
	// clase con el atributo `display: none;`
	results.classList.remove("no-display");
};
