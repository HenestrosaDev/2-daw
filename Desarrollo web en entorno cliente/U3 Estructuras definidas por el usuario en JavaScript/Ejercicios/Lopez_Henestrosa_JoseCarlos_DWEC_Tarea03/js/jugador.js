"use strict";

import { printMessage, Participante } from "./index.js";

export class Jugador extends Participante {
	_isDateWithinRange = (from, to, date) => {
		date = new Date(date);
		/*
		 * Creamos la variable c para evitar que un valor que esté en mitad del día
		 * final del rango sea excluido. Por ejemplo, si la fecha final es el 2 de
		 * enero, nos aseguramos de que el 2 de enero a las 17:49 sea  incluido ya
		 * que JavaScript, por defecto, introduce la hora como las 00:00.
		 */
		const c = new Date(to.getTime());
		/*
		 * Añadimos un día al día final del rango (siguiendo con el ejemplo de
		 * arriba, el 2 de enero a las 00:00 pasa a ser el 3 de enero a las 00:00)
		 */
		c.setDate(c.getDate() + 1);
		return date >= from && date < c; // excluimos del rango al día final
	};

	_checkFechaNac = (fechaNac) => {
		const isDate = fechaNac instanceof Date && fechaNac.getTime(); // Date.getTime() inválido produce NaN

		const from = new Date(1979, 0, 1);
		const to = new Date(2011, 11, 31);

		if (!isDate && !this._isDateWithinRange(from, to, fechaNac)) {
			const message =
				"La fecha de nacimiento tiene que estar comprendida entre el 01/01/1979 y el 31/12/2011.";
			printMessage(message);
			throw RangeError(message);
		}
	};

	_filterDorsal = (dorsal) => {
		if (typeof dorsal !== "number") {
			const message =
				"El dorsal tiene que ser de tipo 'number'. Asegúrate de que no va entre comillas.";
			printMessage(message);
			throw TypeError(message);
		}
		if (dorsal > 25 || dorsal < 1) {
			dorsal = 25;
		}
		return dorsal;
	};

	_checkPosicion = (posicion) => {
		const possiblePositions = ["a", "p", "b", "e", "ap"];
		if (typeof posicion !== "string") {
			const message = `La posición tiene que ser de tipo 'string' y ser uno de estos valores: ${possiblePositions.join(
				", "
			)}`;
			printMessage(message);
			throw TypeError(message);
		} else if (!possiblePositions.includes(posicion)) {
			const message = `El valor de la posición tiene que ser uno de estos valores: ${possiblePositions.join(
				", "
			)}`;
			printMessage(message);
			throw RangeError(message);
		}
	};

	constructor(nombre, provincia, fechaNac, dorsal, posicion) {
		super(nombre, provincia);
		this._checkFechaNac(fechaNac);
		this._fechaNac = fechaNac;
		this._dorsal = this._filterDorsal(dorsal);
		this._checkPosicion(posicion);
		this._posicion = posicion;
	}

	get fechaNac() {
		return this._fechaNac;
	}
	set fechaNac(fechaNac) {
		this._checkFechaNac(fechaNac);
		this._fechaNac = fechaNac;
	}

	get dorsal() {
		return this._dorsal;
	}
	set dorsal(dorsal) {
		this._dorsal = this._filterDorsal(dorsal);
	}

	get posicion() {
		return this._posicion;
	}
	set posicion(posicion) {
		this._checkPosicion(posicion);
		this._posicion = posicion;
	}

	toString() {
		const stringsToShow = [
			`<p><strong>Nombre jugador</strong>: ${this._nombre}</p>`,
			`<p><strong>Provincia</strong>: ${this._provincia}</p>`,
			`<p><strong>Fecha nacimiento</strong>: ${this._fechaNac}</p>`,
			`<p><strong>Dorsal</strong>: ${this._dorsal}</p>`,
			`<p><strong>Posición</strong>: ${this._posicion}</p>`,
			`<hr>`,
		].join("");
		printMessage(stringsToShow, false);
	}
}
