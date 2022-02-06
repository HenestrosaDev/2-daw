"use strict"

import { round, cart, setCookie, getCookie, insertEdibleInCart, removeFromCart } from '../../js/index-cart.js';

/* 
 * Comprobamos si hay algún carro realizado
 * previamente, guardado en una cookie.
 */
$(function () {
	getCookie("cart_2");
	console.log(cart);
	if (cart != []) {
		cart.forEach(item => insertEdibleInCart(item));
	}
});

/* 
 * Modifica los input ocultos del nombre del
 * nombre del alimento y del precio.
 */
$("[id*='__card']").on('click', e => {
	const edible = e.currentTarget.id.split('__');
	$('#edible__name--internal').val(edible[0]);
	$('#edible__name--client').val($(`#${edible[0]}__name`).text());
	$('#edible__price').val($(`#${edible[0]}__price`).text());
});

/* 
 * Controla el click de los botones (-) y (+)
 * que rodean al input.
 */
$('.btn--number').on('click', e => {
	e.preventDefault();

	const fieldName = $(e.currentTarget).attr('data-field');
	const type = $(e.currentTarget).attr('data-type');
	const input = $(`input[name='${fieldName}']`);
	const currentVal = round(parseFloat(input.val()), 1);
	const step = round(parseFloat(input.attr('step')), 1);
	const min = round(parseFloat(input.attr('min')), 1);
	const max = round(parseFloat(input.attr('max')), 1);

	if (!isNaN(currentVal)) {
		if (type == 'minus') {
			if (currentVal > min) {
				input.val(round(currentVal - step), 1).change();
			}
			if (currentVal - step <= min) {
				$(e.currentTarget).attr('disabled', true);
			}
		} else if (type == 'plus') {
			if (currentVal < max) {
				input.val(round(currentVal + step), 1).change();
			}
			if (currentVal + step >= max) {
				$(e.currentTarget).attr('disabled', true);
			}
		}
	} else {
		input.val(min);
	}
});

/* MÉTODOS QUE CONTROLAN EL INPUT DE LOS KGS */

$('#edible__kg').on('focusin', e => {
	$(e.currentTarget).data('oldValue', $(e.currentTarget).val());
});

/* 
 * Comprueba que los valores introducidos en
 * el input de los kgs sea válido. Si no lo es,
 * se sustituye por el valor anterior introducido.
 */
$('#edible__kg').on('change', e => {

	const min = round(parseFloat($(e.currentTarget).attr('min')), 1);
	const max = round(parseFloat($(e.currentTarget).attr('max')), 1);
	const currentVal = round(parseFloat($(e.currentTarget).val()), 1);

	const name = $(e.currentTarget).attr('name');
	if (!(isNaN($(e.currentTarget).val()) || $(e.currentTarget).val().trim() == '')) {
		if (currentVal >= min) {
			$(`.btn--number[data-type='minus'][data-field='${name}']`).removeAttr('disabled')
		} else {
			alert(`La cantidad de kgs tiene que ser mayor o igual a ${min}`);
			$(e.currentTarget).val($(e.currentTarget).data('oldValue'));
		}
		if (currentVal <= max) {
			$(`.btn--number[data-type='plus'][data-field='${name}']`).removeAttr('disabled')
		} else {
			alert(`La cantidad de kgs tiene que ser menor o igual a ${max}`);
			$(e.currentTarget).val($(e.currentTarget).data('oldValue'));
		}
	}
});

/* 
 * Controlamos las teclas que se pulsan cuando el
 * input de los kgs tiene el focus
 */
$('#edible__kg').on('keydown', e => {
	// Permitimos que se pulse: Retroceso, suprimir, tab, escape, intro y .
	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
		// Ctrl+A
		(e.keyCode == 65 && e.ctrlKey === true) ||
		// Inicio, fin, izquierda, derecha
		(e.keyCode >= 35 && e.keyCode <= 39)) {
		return;
	}
	/* 
	 * Nos aseguramos de que la entrada sea un número. 
	 * Evitamos que se introduzca el valor de la tecla de no ser así.
	 */
	if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		e.preventDefault();
	}
});


/* MÉTODOS QUE CONTROLAN EL CARRO */

/* 
 * Añade el comestible al carro y setea
 * la cookie con el nuevo valor del carro.
 */
$('#edible__add').on('click', () => {
	const quantity = $('#edible__kg').val();

	if (!isNaN(quantity) && quantity !== '' && (quantity > 0 && quantity <= 99)) {
		const edible = {
			id: $('#edible__name--internal').val(),
			nameForClient: $('#edible__name--client').val(),
			price: $('#edible__price').val(),
			quantity: quantity
		}
		insertEdibleInCart(edible);
		cart.push(edible);
		setCookie("cart_2", JSON.stringify(cart));
	} else {
		alert('La cantidad de kgs introducida no es válida.');
	}
});

/* 
 * El elemento está siendo generado dinámicamente, 
 * por lo que tenemos que usar esta estructura.
 * Cuando se pulsa sobre el botón para borrar a un
 * elemento del carro, lo eliminamos y seteamos la
 * cookie con el nuevo valor del carro.
 */
$(document).on('click', "[id*='__remove']", e => {
	const edible = e.currentTarget.id.split('__');
	removeFromCart(edible[0], "cart_2")
});