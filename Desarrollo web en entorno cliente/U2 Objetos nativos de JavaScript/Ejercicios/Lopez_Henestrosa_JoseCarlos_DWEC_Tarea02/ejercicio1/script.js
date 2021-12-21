"use strict";

var popup;
var interval;

const displayPopup = (width, height) => {
	// Coordenadas para centrar la ventana tras abrirse por primera vez
	const x = (screen.width / 2) - (width / 2);
	const y = (screen.height / 2) - (height / 2);
	// Declaramos el popup que se va a mover por la pantalla
	popup = window.open(
		this.href, // También se podría poner la dirección de un HTML. Ejemplo: 'popup.html'
		'popup', // Nombre de la ventana
		`toolbar=no,
		location=no,
		status=no,
		menubar=no,
		scrollbars=no,
		resizable=no,
		width=${width},
		height=${height},
		top=${y},
		left=${x}`
	);
	// Mostramos en la ventana la línea de "Ventana moviéndose"
	popup.document.write('<h3>Ventana moviéndose</h3>');
	// Establecemos el intervalo pasando como parámetros la acción a ejecutar (movimiento de la ventana) y cada cuantos milisegundos queremos que se repita la acción (3000ms = 3s) 
	interval = window.setInterval(movePopup, 3000);
}

const movePopup = () => {
	// Obtenemos posiciones aleatorias basándonos en el alto y ancho de la pantalla
	const randomWidth = Math.round(Math.random() * screen.width);
	const randomHeight = Math.round(Math.random() * screen.height);
	// Establecemos la posición de la ventana evitando que la mitad de ella salga de la pantalla
	const x = (screen.width - randomWidth) - (popup.width / 2);
	const y = (screen.height - randomHeight) - (popup.height / 2);
	popup.moveTo(randomWidth, randomHeight);
}

const stopPopup = () => {
	// Paramos el intervalo que mueve la ventana aleatoriamente
	clearInterval(interval);
	// Mostramos en la ventana la línea de "Ventana parada"
	popup.document.write('<h3>Ventana parada</h3>');
	popup.focus()
}
