"use strict";

window.addEventListener("load", function () {
	document.getElementById("start").addEventListener("click", function () {
		startGame(this);
	});
});

/**
 * Método que genera un número entero comprendido entre un intervalo
 *
 * @param {Int} min   Número mínimo incluido
 * @param {Int} max   Número máximo incluido
 * @returns
 */
const randomIntFromInterval = (min, max) => {
	return Math.floor(Math.random() * (max - min + 1) + min);
};

/**
 * Closure que almacenará la puntuación de cada turno
 *
 * @returns {Objet} Objeto con los getters/setters de la puntuación
 */
const scoreClosure = () => {
	let score = 0;
	let initialScore = 0;
	return {
		setScore: (value) => {
			score = value;
		},
		getScore: () => score,
		setInitialScore: (value) => {
			initialScore = value;
		},
		getInitialScore: () => initialScore,
	};
};
const turnScore = scoreClosure();

/**
 * Función que procesa la inicialización del juego
 *
 * @param {Element} startButton  Elemento que pulsamos para comenzar el juego
 */
const startGame = (startButton) => {
	startButton.setAttribute("disabled", "");

	const startingPlayer = randomIntFromInterval(1, 2);
	const otherPlayer = startingPlayer === 1 ? 2 : 1;

	// Creamos las bolas
	for (let i = 1; i < 3; i++) {
		createElement(
			"img",
			{
				id: `ball-${i}`,
				src: "./img/bowling-ball.png",
				className: `md:row-start-${i + 1} ${
					otherPlayer === i ? "hidden" : ""
				} cursor-pointer`,
				height: 42,
				width: 42,
			},
			"balls"
		);
	}

	// Marcamos el jugador que tiene el turno activo
	changeTurn(startingPlayer);

	// Limpiamos el div de los bolos y creamos los bolos
	document.getElementById("pins").replaceChildren();
	createElement(
		"img",
		{
			className: "mt-12 md:mt-6",
			src: "./img/bowling-pin.png",
		},
		"pins",
		10
	);

	// Añadimos los eventos a las bolas para ejecutar la tirada
	document
		.getElementById(`ball-${startingPlayer}`)
		.addEventListener("click", function () {
			executeThrow(startingPlayer);
		});

	document
		.getElementById(`ball-${otherPlayer}`)
		.addEventListener("click", function () {
			executeThrow(otherPlayer);
		});
};

/**
 * Modifica las clases y la visibilidad de la pelota.
 * Almacena la puntuación del comienzo del turno.
 *
 * @param {Int} playerTurn  Jugador que ahora tiene el turno
 */
const changeTurn = (playerTurn) => {
	// Old
	const oldPlayerTurn = playerTurn === 1 ? 2 : 1;
	const oldTurnElements = document.querySelectorAll(
		`[id$='-${oldPlayerTurn}']`
	);
	if (oldTurnElements.length > 0) {
		oldTurnElements.forEach((el) => {
			if (el.id.indexOf("ball") > -1) {
				el.classList.add("hidden");
				return;
			}

			el.classList.remove("text-white", "bg-blue-500");
		});
	}

	// New
	document.querySelectorAll(`[id$='-${playerTurn}']`).forEach((el) => {
		if (el.id.indexOf("ball") > -1) {
			el.classList.remove("hidden");
			return;
		}

		el.classList.add("text-white", "bg-blue-500");
	});

	turnScore.setInitialScore(
		parseInt(document.getElementById(`score-${playerTurn}`).textContent, 10)
	);
};

/**
 * Evento que ocurre cuando el usuario pulsa sobre la bola para ejecutar el
 * lanzamiento
 *
 * param {Number} player   El jugador que va a ejecutar el lanzamiento
 */
const executeThrow = (player) => {
	// Si hay elementos con la clase scale-75 significa que hay bolos derribados
	const pinsKnocked = document.querySelectorAll(".scale-75").length;
	let isStrike = false;
	let pinsToKnock = 0;

	if (pinsKnocked == 0) {
		pinsToKnock = randomIntFromInterval(0, 10);
		turnScore.setScore(pinsToKnock);
		if (pinsToKnock == 10) {
			isStrike = true;
		}
	} else {
		pinsToKnock = randomIntFromInterval(0, 10 - pinsKnocked);
		turnScore.setScore(pinsToKnock + turnScore.getScore());
	}

	// Derribamos los bolos gráficamente
	if (pinsToKnock > 0) {
		knockPins(pinsToKnock);
	}

	// Sumamos la puntuación obtenida al marcador
	const scoreElement = document.getElementById(`score-${player}`);
	scoreElement.textContent =
		parseInt(scoreElement.textContent, 10) + pinsToKnock;

	// Actualizamos el número de tiradas del jugador
	const throwsElement = document.getElementById(`throws-${player}`);
	let throwsInt = parseInt(throwsElement.textContent, 10) - 1;

	// Strike
	if (isStrike) {
		throwsInt += 2;
		turnScore.setScore(0);
		resetPins();
	}
	throwsElement.textContent = throwsInt;

	const dialogTitle = `Puntuación del turno: ${
		parseInt(scoreElement.textContent, 10) - turnScore.getInitialScore()
	}`;
	const dialogText = `Bolos derribados en esta tirada: ${pinsToKnock}`;

	// Si ya no quedan más lanzamientos disponibles
	if (throwsInt == 0) {
		// Comprobamos si el último lanzamiento ha sido un spare
		if (turnScore.getScore() == 10) {
			promptDialog(dialogTitle, dialogText);
			throwsElement.textContent = 1;
			turnScore.setScore(0);
			resetPins();
			return;
		}

		const turnsLeftElement = document.getElementById(`turns-${player}`);
		turnsLeftElement.textContent =
			parseInt(turnsLeftElement.textContent, 10) - 1;
			
		// Si no hay más turnos disponibles, quitamos la pelota del DOM
		if (turnsLeftElement.textContent == "0") {
			removeElement(`ball-${player}`);
		} else {
			// Reiniciamos el número de turnos
			throwsElement.textContent = 2;
		}

		// Si el otro jugador sigue teniendo turnos disponibles
		if (
			document.getElementById(`turns-${player === 1 ? 2 : 1}`).textContent > 0
		) {
			Swal.fire({
				heightAuto: false,
				allowOutsideClick: false,
				title: dialogTitle,
				text: dialogText,
			}).then((result) => {
				if (result.isConfirmed) {
					turnScore.setScore(0);
					changeTurn(player == 1 ? 2 : 1);
					resetPins();
				}
			});
		} else {
			showWinner();
		}
	} else {
		promptDialog(dialogTitle, dialogText);
	}
};

/**
 *
 * @param {*} title
 */
const promptDialog = (title, text) => {
	Swal.fire({
		heightAuto: false,
		title: title,
		text: text,
	});
};

/**
 * Añade las clases necesarias a los bolos derribados programáticamente para
 * cambiar su vista en la pantalla
 *
 * @param {Int} amount Cantidad de bolos a derribar
 */
const knockPins = (amount) => {
	let i = 0;

	for (
		let child = document.getElementById("pins").firstChild;
		child != null;
		child = child.nextSibling
	) {
		if (child.classList.contains("scale-75")) continue;
		child.classList.add("scale-75", "rotate-[60deg]");
		if (++i === amount) break;
	}
};

/**
 * Reinicia la inclinación y la escalada de los bolos derribados.
 */
const resetPins = () => {
	for (
		let child = document.getElementById("pins").firstChild;
		child != null;
		child = child.nextSibling
	) {
		child.classList.remove("scale-75", "rotate-[60deg]");
	}
};

/**
 * Determina el ganador y muestra su nombre y puntuación a través de un diálogo
 */
const showWinner = () => {
	const score1 = parseInt(document.getElementById("score-1").textContent, 10);
	const score2 = parseInt(document.getElementById("score-2").textContent, 10);

	const player1 = document.getElementById("player-1").textContent;
	const player2 = document.getElementById("player-2").textContent;

	let title = "¡Ha ganado ";

	if (score1 > score2) {
		title += `${player1} con ${score1} puntos!`;
	} else if (score1 == score2) {
		title = `¡Empate a ${score1} puntos!`;
	} else {
		title += `${player2} con ${score2} puntos!`;
	}

	Swal.fire({
		heightAuto: false,
		title: title,
	});
};

/**
 * Método genérico para anexionar un elemento hijo a un padre en el DOM
 *
 * @param {String} type Tipo de elemento HTML
 * @param {String} attributes  Atributos del elemento
 * @param {String} parentId   Id del padre al que se le va a vincular el
 * elemento
 * @param {String} iterations   La cantidad de hijos que se van a generar.
 * Por defecto, una sola vez.
 */
const createElement = (type, attributes, parentId, iterations = 1) => {
	for (let i = 0; i < iterations; i++) {
		const el = document.createElement(type);
		Object.assign(el, attributes);
		document.getElementById(parentId).appendChild(el);
	}
};

/**
 * Método genérico para eliminar un elemento del DOM
 *
 * @param {*} id del elemento a eliminar
 */
const removeElement = (id) => {
	document.getElementById(id).remove();
};
