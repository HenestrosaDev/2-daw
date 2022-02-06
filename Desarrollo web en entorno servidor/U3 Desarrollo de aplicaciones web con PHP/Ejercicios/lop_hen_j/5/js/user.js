"use strict"

import { round, cart, insertInCart, setCookie, getCookie, removeFromCart, makeCommand } from '../../js/index-cart.js';

$(function () {
	getCookie("cart_5");
});

/* 
 * Cuando se pulsa sobre el botón para borrar a un
 * elemento del carro, lo eliminamos y seteamos la
 * cookie con el nuevo valor del carro.
 */
$(document).on('click', "[id*='__remove--cart']", e => {
	const pizza = e.currentTarget.id.split('__');
	removeFromCart(pizza[0], "cart_5");
});

$("[id*='__order']").on('click', e => {
	const pizzaId = e.currentTarget.id.split('__');
	$('#pizza__id').val(pizzaId[0]);
	$('#pizza__name_for_client').val($(`#${pizzaId[0]}__name`).text());
	$('#pizza__price').text($(`#${pizzaId[0]}__price`).val());
});

$('input[type=radio][name=dought]').on('change', e => {
	const price = $('#pizza__price');
	switch ($(e.currentTarget).val()) {
		case 'familiar':
			price.text(round(parseFloat(price.text()) + 1));
			break;
		case 'medium':
			price.text(round(parseFloat(price.text()) - 1));
			break;
	}
});

/* 
 * Si el usuario cierra el modal con la opción 'familiar'
 * seleccionada, dejamos seleccionada la opción 'medium' 
 */
$('.modal').on('hidden.bs.modal', () => $('#dought__medium').prop('checked', true));

$('#dought__submit').on('click', () => {
	const pizza = {
		id: $('#pizza__id').val(),
		nameForClient: $('#pizza__name_for_client').val(),
		isFamiliar: $('#dought__familiar').is(':checked'),
		price: round(parseFloat($('#pizza__price').text()))
	};
	insertInCart(pizza);
	cart.push(pizza);
	setCookie("cart_5", JSON.stringify(cart));
});

/* 
 * Realizamos comanda
 */
$(document).on('click', '#cart__confirm', () => {
	makeCommand()
});