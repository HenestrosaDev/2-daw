"use strict"

import { printMessage, Participante } from "./index.js";

export class Arbitro extends Participante {
	_checkAnioFederado = function(anioFederado) {
		if (!anioFederado || typeof anioFederado !== "number") {
			const message = "El año de federación tiene que ser de tipo 'number'. No puede estar vacío.";
			printMessage(message);
			throw TypeError(message);
		} else if (anioFederado > 2021) {
			const message = "El año de federación no puede ser posterior a 2021.";
			printMessage(message);
			throw RangeError(message);
		}
	}

	constructor(nombre, provincia, anioFederado) {
		super(nombre, provincia);
		this._checkAnioFederado(anioFederado);
		this._anioFederado = anioFederado;
	}

	get anioFederado() {
		return this._anioFederado;
	}
	set anioFederado(anioFederado) {
		this._checkAnioFederado(anioFederado);
		this._anioFederado = anioFederado;
	}

	toString() {
		const stringsToShow = [
			`<p><strong>Nombre árbitro</strong>: ${this._nombre}</p>`,
			`<p><strong>Provincia</strong>: ${this._provincia}</p>`,
			`<p><strong>Federado desde el año</strong>: ${this._anioFederado}</p>`,
			`<hr>`
		];
		printMessage(stringsToShow.join(''), false);
	}
}