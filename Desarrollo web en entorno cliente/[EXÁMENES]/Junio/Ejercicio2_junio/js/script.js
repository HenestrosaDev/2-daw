"use strict";

window.addEventListener("load", () => {
	processJson();
});

// He usado Fetch API para acceder al JSON
const processJson = () => {
	fetch("./datos.json")
		.then((response) => response.json()) // Obtenemos el JSON
		.then((json) => {
			// Al cargar la página, eliminamos el gif de carga
			const resultElement = document.getElementById("result");
			resultElement.innerHTML = "";

			// A través del objeto 'json', podemos acceder a las siguientes propiedades:
			/**
			 * restaurante: Contiene el nombre del restaurante
			 * total_recetas: Contiene el número de recetas
			 * recetas: Contiene un array de objetos con recetas, las cuales tienen un nombre y un array de ingredientes
			 */

			// Contiene el HTML que se va a añadir al DOM
			let template = `
				<p>Título: ${json.restaurante}</p>
				<p>El restaurante tiene ${json.total_recetas} platos</p>
				<hr>
			`;

			// Inicializamos la variable que va a almacenar el número de recetas que contienen cilantro
			let cilantro = 0;
			for (let i=0; i < json.recetas.length; i++) {
				template += `
					<p>Receta: ${json.recetas[i].nombre}</p>
					<ul style="list-style-type:none">
				`;

				// Añadimos los ingredientes de la receta al string
				for (let j=0; j < json.recetas[i].ingredientes.length; j++) {
					const ingredient = json.recetas[i].ingredientes[j];
					
					// Si el nombre del ingrediente es 'cilantro', aumentamos el contador relativo al ingrediente
					if (ingredient === "cilantro") {
						cilantro++;
					}
					template +=`<li>Ingrediente ${j+1}: ${ingredient}</li>`;
				}

				template += `
					</ul>
					<hr>
				`;
			}

			template += `<p>Se ha encontrado cilantro en ${cilantro} recetas</p>`

			// Adjuntamos el HTML al elemento con id 'result'.
			resultElement.insertAdjacentHTML("beforeend", template);
		});
}