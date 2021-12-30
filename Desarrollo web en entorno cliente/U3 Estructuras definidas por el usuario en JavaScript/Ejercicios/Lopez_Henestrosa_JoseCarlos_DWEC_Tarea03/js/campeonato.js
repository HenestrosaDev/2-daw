"use strict"

import { printMessage, Arbitro, Equipo } from "./index.js";

export class Campeonato {
	_checkNombre = nombre => {
		if (!nombre || typeof nombre !== "string") {
			const message = "El nombre del campeonato tiene que ser de tipo 'string'. No puede estar vacío";
			printMessage(message);
			throw TypeError(message);
		}
	}

	_filterCiudad = ciudad => {
		if (!ciudad || typeof ciudad !== "string") {
			return "Córdoba";
		} 
		return ciudad;
	}

	_checkDescripcion = descripcion => {
		if (descripcion.length > 100) {
			const message = "La descripción no puede superar los 100 caracteres.";
			printMessage(message);
			throw RangeError(message);
		}
	}

	_printParticipantsTable = () => {
		const refereeRows = [];
		this._participantes[0].forEach(referee => {
			refereeRows.push(`
				<tr>
					<td>${referee.nombre}</td>
					<td>${referee.provincia}</td>
					<td>${referee.anioFederado}</td>
				</tr>
			`);
		});
		const teamRows = [];
		this._participantes[1].forEach(team => {
			teamRows.push(`
				<tr>
					<td>${team.nombreEquipo}</td>
					<td>${team.ciudad}</td>
					<td>${team.entrenador}</td>
					<td><img width=50 height=50 src="./img/crests/${team.escudo}" alt="${team.nombreEquipo}"></p></td>
				</tr>
			`);
		});
		return `
			<table class="w--100 mb--3">
				<thead>
					<tr>
						<th>Nombre árbitro</th>
						<th>Provincia</th>
						<th>Año de federación</th>
					</tr>
				</thead>
				<tbody>${refereeRows.join('')}</tbody>
			</table>

			<table class="w--100 mb--3">
				<thead>
					<tr>
						<th>Nombre equipo</th>
						<th>Ciudad</th>
						<th>Entrenador</th>
						<th>Escudo</th>
					</tr>
				</thead>
				<tbody>${teamRows.join('')}</tbody>
			</table>
		`;
	}

	constructor(nombre, ciudad, descripcion) {
		this._checkNombre(nombre);
		this._nombre = nombre;
		this._ciudad = this._filterCiudad(ciudad);
		this._checkDescripcion(descripcion);
		this._descripcion = descripcion;
		this._participantes = [];
		this._participantes[0] = [];
		this._participantes[1] = [];
	}

	get nombre() {
		return this._nombre;
	}
	set nombre(nombre) {
		this._checkNombre(nombre);
		this._nombre = nombre;
	}

	get ciudad() {
		return this._ciudad;
	}
	set ciudad(ciudad) {
		this._ciudad = this._filterCiudad(ciudad);
	}

	get descripcion() {
		return this._descripcion;
	}
	set descripcion(descripcion) {
		this._checkDescripcion(descripcion);
		this._descripcion = descripcion;
	}

	// TODO: not sure if this works
	anadirParticipantes(participante) {
		let index = -1;
		
		if (participante instanceof Arbitro) {
			index = 0;
		} else if (participante instanceof Equipo) {
			index = 1;
		} else {
			return; // Paramos la ejecución del método si el objeto no cumple con los requisitos
		}

		this._participantes[index].push(participante);
	}

	toString() {
		const stringsToShow = [
			`<p><strong>Nombre campeonato</strong>: ${this._nombre}</p>`,
			`<p><strong>Ciudad en la que se celebra</strong>: ${this._ciudad}</p>`,
			`<p><strong>Descripción</strong>: ${this._descripcion}</p>`,
			`<p><strong>Participantes</strong>:</p> ${this._printParticipantsTable()}`,
			`<hr>`
		].join('');
		printMessage(stringsToShow, false);
	}
}