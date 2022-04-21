"use strict"

import { round, cart, insertInCart, setCookie, getCookie, removeFromCart, makeCommand } from '../../js/index-cart.js';

var checkout = [];
var pizzaId;

const insertIngredient = (ingredientId, ingredientName) => {
	const ingredient = {
		id: ingredientId,
		nameForClient: ingredientName
	}

	const liHtml = `
			<li id="checkout__${ingredient.id}" class="list-group-item d-flex justify-content-between lh-sm checkout__item">
				<div>
					<h6 class="my-0">${ingredient.nameForClient}</h6>
					<small class="text-muted">0.80€</small>
				</div>
				<span class="cart__item--right">
					<button id="${ingredient.id}__remove--checkout" class="btn btn-sm btn-close float-right"></button>
				</span>
			</li>
		`;

	$(liHtml).insertAfter('.checkout__item:last');
	checkout[pizzaId].push(ingredient.id);

	$('#checkout__total').text(round(parseFloat($('#checkout__total').text()) + 0.80));
	toggleIngredientsNumber();
}

const generatePizzaId = () => `custom_${Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15)}`;

const initCheckout = (dought = { id: "medium-dought", price: 3.95 }) => {
	pizzaId = generatePizzaId();
	checkout = [];
	checkout[pizzaId] = [];
	checkout[pizzaId].push(dought);
}

const toggleIngredientsNumber = () => {
	const ingredientsOnList = $('.checkout__item').length;
	$('#checkout__badge').text(ingredientsOnList);
}

$(function () {
	getCookie("cart_5");
	initCheckout();
});

$("[id*='__card']").on('click', e => {
	const ingredient = e.currentTarget.id.split('__');
	const ingredientName = $(`#${ingredient[0]}__name`).text();
	// Si el ingrediente no está en el checkout, lo añadimos
	if ($(`#${ingredient[0]}__remove--checkout`).length == 0) {
		insertIngredient(ingredient[0], ingredientName);
	}
});

$('#dought__toggle').on('click', () => {
	if ($('#dought__price').text() == 3.95) {
		$('#dought__type').text("Masa familiar");
		$('#dought__price').text("4.95");
		$('#dought__toggle').text("Prefiero mediana");
		$('#checkout__total').text(round(parseFloat($('#checkout__total').text()) + 1));
		// Sustituimos el tipo de masa en el array del checkout
		checkout[pizzaId] = checkout[pizzaId].map(item => item.id == "medium-dought" ? { id: "familiar-dought", price: 4.95 } : item);
	} else if ($('#dought__price').text() == 4.95) {
		$('#dought__type').text("Masa mediana");
		$('#dought__price').text("3.95");
		$('#dought__toggle').text("Prefiero familiar");
		$('#checkout__total').text(round(parseFloat($('#checkout__total').text()) - 1));
		// Sustituimos el tipo de masa en el array del checkout
		checkout[pizzaId] = checkout[pizzaId].map(item => item.id == "familiar-dought" ? { id: "medium-dought", price: 3.95 } : item);
	}
});

$('#checkout__submit').on('click', () => {
	$.post("./php/check_checkout.php", { "checkout": checkout[pizzaId] }, (response) => {
		response = JSON.parse(response);

		// HTTP code 200 significa que todo fue OK
		if (response[0] == 200) {
			const pizza = {
				/* Como no sabemos cuántas pizzas "a tu gusto"
				 * va a comprar el usuario, generamos un string
				 * aleatorio para evitar solapamiento de ids.
				 */
				id: pizzaId,
				nameForClient: "Pizza 'a tu gusto'",
				isFamiliar: $('#dought__price').text() == 4.95,
				price: response[1]
			}

			insertInCart(pizza);
			cart.push(pizza);
			/* 
			 * Seteamos la cookie con los ingredientes que 
			 * tiene la pizza, quitando la masa ya que no la
			 * contamos como ingrediente. Como sabemos que el
			 * primer elemento es la masa, directamente 
			 * ejecutamos el método splice en el índice 0.
			 */
			checkout[pizzaId].splice(0, 1);
			setCookie(pizzaId, checkout[pizzaId].join(','));

			// Tras setear la cookie, restablecemos el array con la masa
			if ($('#dought__price').text() == 4.95) {
				initCheckout({ id: "familiar-dought", price: 4.95 });
			} else if ($('#dought__price').text() == 3.95) {
				initCheckout();
			}
			setCookie("cart_5", JSON.stringify(cart));

			$(".checkout__item:not(:first-child)").remove();
			$("#checkout__total").text($("#dought__price").text());
			toggleIngredientsNumber();
		}
	});
});

/* 
 * El elemento está siendo generado dinámicamente, 
 * por lo que tenemos que usar esta estructura:
 */
$(document).on('click', "[id*='__remove--checkout']", e => {
	const ingredient = e.currentTarget.id.split('__');
	$(`#checkout__${ingredient}`).remove();
	checkout[pizzaId] = checkout[pizzaId].filter(item => item.id !== ingredient[0]);

	toggleIngredientsNumber();
	$('#checkout__total').text(round(parseFloat($('#checkout__total').text()) - 0.80));
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

/* 
 * Realizamos comanda
 */
$(document).on('click', '#cart__confirm', () => {
	makeCommand()
});