"use strict"

import { printMessage } from "./index.js";

export class Participante {
	_filterNombre = nombre => {
		if (typeof nombre !== "string") {
			const message = "El nombre tiene que ser de tipo 'string'.";
			printMessage(message);
			throw TypeError(message);
		} else if (nombre.length < 5) {
			const message = "El nombre tiene que contener 5 o más caracteres.";
			printMessage(message);
			throw RangeError(message);
		}
		return nombre.toLocaleUpperCase();
	}

	_filterProvincia = provincia => {
		if (!provincia) {
			const message = "La provincia no puede estar vacía.";
			printMessage(message);
			throw TypeError(message);
		} else if (typeof provincia !== "string") {
			const message = "La provincia tiene que ser de tipo 'string'.";
			printMessage(message);
			throw TypeError(message);
		} else if (provincia.length < 5) {
			provincia += '…';
		}
		return provincia.toLocaleUpperCase();
	}

	constructor(nombre, provincia) {
		this._nombre = this._filterNombre(nombre);;
		this._provincia = this._filterProvincia(provincia);
	}

	get nombre() {
		return this._nombre;
	}
	set nombre(nombre) {
		this._checkNombre(nombre);
		this._nombre = nombre;
	}

	get provincia() {
		return this._provincia;
	}
	set provincia(provincia) {
		this._provincia = this._filterProvincia(provincia);
	}

	toString() {
		const stringsToShow = [
			`<p><strong>Nombre participante</strong>: ${this._nombre}</p>`,
			`<p><strong>Provincia</strong>: ${this._provincia}</p>`,
			`<hr>`
		].join('');
		printMessage(stringsToShow, false);
	}
}