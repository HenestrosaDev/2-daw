"use strict";

import { printMessage, Jugador } from "./index.js";

export class Equipo {
	_capitalizeFirstLetter = (string) =>
		string[0].toUpperCase() + string.slice(1);

	_checkString = (string) => {
		if (!string || typeof string !== "string") {
			const message = `El nombre del equipo y el de la ciudad tienen que ser de tipo 'string'. No pueden estar vacíos.`;
			printMessage(message);
			throw TypeError(message);
		}
	};

	_checkAJugadores = (_aJugadores) => {
		const aJugadoresFiltered = _aJugadores.filter(
			(obj) => obj instanceof Jugador
		);
		if (!aJugadoresFiltered) {
			const message = "Solo se pueden introducir jugadores en el array.";
			printMessage(message);
			throw TypeError(message);
		}
		return aJugadoresFiltered;
	};

	_filterEscudo = (escudo) => {
		if (typeof escudo !== "string") {
			const message = "El escudo tiene que ser de tipo 'string'.";
			printMessage(message);
			throw TypeError(message);
		}
		if (!(escudo.endsWith("jpg") || escudo.endsWith("png"))) {
			escudo = "default.png";
		}
		return escudo;
	};

	_checkEntrenador = (entrenador) => {
		if (!entrenador || typeof entrenador !== "string") {
			const message =
				"El nombre del entrenador tiene que ser de tipo 'string'. No puede estar vacío.";
			printMessage(message);
			throw TypeError(message);
		} else if (entrenador.length < 4) {
			const message =
				"El nombre del entrenador tiene que contener 4 o más caracteres.";
			printMessage(message);
			throw RangeError(message);
		}
	};

	_printPlayersTable = () => {
		const rows = [];
		this._aJugadores.forEach((player) => {
			rows.push(`
				<tr>
					<td>${player.nombre}</td>
					<td>${player.provincia}</td>
					<td>${player.fechaNac}</td>
					<td>${player.dorsal}</td>
					<td>${player.posicion}</td>
				</tr>
			`);
		});
		return `
			<table class="w--100 mb--3">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Provincia</th>
						<th>Fecha nacimiento</th>
						<th>Dorsal</th>
						<th>Posición</th>
					</tr>
				</thead>
				<tbody>${rows.join("")}</tbody>
			</table>
		`;
	};

	constructor(nombreEquipo, ciudad, escudo, entrenador) {
		this._checkString(nombreEquipo);
		this._nombreEquipo = nombreEquipo.toLocaleUpperCase();
		this._checkString(ciudad);
		this._ciudad = this._capitalizeFirstLetter(ciudad.toLocaleLowerCase());
		this._escudo = this._filterEscudo(escudo);
		this._checkEntrenador(entrenador);
		this._entrenador = entrenador;
		this._aJugadores = [];
	}

	get nombreEquipo() {
		return this._nombreEquipo;
	}
	set nombreEquipo(nombreEquipo) {
		this._checkString(nombreEquipo);
		this._nombreEquipo = nombreEquipo.toLocaleUpperCase();
	}

	get ciudad() {
		return this._ciudad;
	}
	set ciudad(ciudad) {
		this._checkString(ciudad);
		this._ciudad = this._capitalizeFirstLetter(ciudad.toLocaleLowerCase());
	}

	get aJugadores() {
		return this._aJugadores;
	}
	/*
	 * No creamos setter para aJugadores con el fin de evitar mutaciones no
	 * controladas de la propiedad, ya que solo introducimos jugadores mediante
	 * altaJugador()
	 */

	get escudo() {
		return this._escudo;
	}
	set escudo(escudo) {
		this._escudo = this._filterEscudo(escudo);
	}

	get entrenador() {
		return this._entrenador;
	}
	set entrenador(entrenador) {
		this._checkEntrenador(entrenador);
		this._entrenador = entrenador;
	}

	altaJugador(jugador) {
		if (this._aJugadores.includes(jugador)) return false;
		this._aJugadores.push(jugador);
		return true;
	}

	eliminarJugador(nombreJugador) {
		if (
			this._aJugadores.filter((jugador) => jugador.nombre === nombreJugador)
				.length > 0
		) {
			console.log(nombreJugador);
			this._aJugadores = this._aJugadores.filter(
				(jugador) => jugador.nombre !== nombreJugador
			);
			return true;
		}
		return false;
	}

	ordenaJugDorsal() {
		this._aJugadores.sort((a, b) => a.dorsal - b.dorsal);
	}

	toString() {
		const stringsToShow = [
			`<p><strong>Nombre equipo</strong>: ${this._nombreEquipo}</p>`,
			`<p><strong>Ciudad</strong>: ${this._ciudad}</p>`,
			`<p><strong>Entrenador</strong>: ${this._entrenador}</p>`,
			`<p><strong>Escudo</strong>: <img width=200 height=200 src="./img/crests/${this._escudo}" alt="${this._nombreEquipo}"></p>`,
			`<p><strong>Jugadores</strong>:</p> ${this._printPlayersTable()}`,
			`<hr>`,
		];
		printMessage(stringsToShow.join(""), false);
	}
}
