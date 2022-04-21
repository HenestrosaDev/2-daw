"use strict"

import { round } from './round.js';

export var cart = [];

/* 
 * El método del script de 2.js es distinto 
 * porque el carro se muestra ligeramente distinto
 */
export const insertInCart = pizza => {
	const liHtml = `
			<li id="cart__${pizza.id}">
				<span class="cart__item">
					<span class="cart__item--left">
						<span class="cart__item--info">
							<strong>${pizza.nameForClient}</strong>
							<span>${pizza.price}€</span>
						</span>
					</span>
					<span class="cart__item--right">
						<button id="${pizza.id}__remove--cart" class="btn btn-sm btn-close float-right"></button>
					</span>
				</span>
				<hr class="dropdown-divider">
			</li>
		`;

	$('#cart__list').prepend(liHtml);
	toggleCartClasses();
}

export const insertEdibleInCart = edible => {
	const liHtml = `
			<li id="cart__${edible.id}">
				<span class="cart__item">
					<span class="cart__item--left">
						<img src="./img/${edible.id}.png" height="50" width="50" alt="${edible.nameForClient}" />
						<span class="cart__item--info">
							<strong>${edible.nameForClient}</strong>
							<span class="text-muted">${edible.quantity} kg</span>
							<span>${round((edible.quantity * edible.price), 2)}€</span>
						</span>
					</span>
					<span class="cart__item--right">
						<button id="${edible.id}__remove" class="btn btn-sm btn-close float-right"></button>
					</span>
				</span>
				<hr class="dropdown-divider">
			</li>
		`;

	$('#cart__list').prepend(liHtml);
	toggleCartClasses();
}

export const setCookie = (key, value) => {
	$.post("../php/cookie_handler.php", { [`${key}`]: value });
}

export const getCookie = (key) => {
	$.get("../php/cookie_handler.php", { [`${key}`]: "get" }, (data, status) => {
		if (data !== '') {
			cart = JSON.parse(data);
			if (key == "cart_5") {
				cart.forEach(item => insertInCart(item));
			} else {
				cart.forEach(item => insertEdibleInCart(item));
			}
		}
	});
}

export const toggleCartClasses = () => {
	const itemsOnList = $('.cart__item').length;
	if ($('.cart__item').length > 0) {
		$('#cart__empty').addClass('d-none');
		$('#cart__number').text(itemsOnList);
		$('#cart__number').removeClass('d-none');
		$('#cart__confirm').removeClass('d-none');
	} else {
		$('#cart__empty').removeClass('d-none');
		$('#cart__number').addClass('d-none');
		$('#cart__confirm').addClass('d-none');
	}
}

export const removeFromCart = (pizzaId, cookieKey) => {
	$(`#cart__${pizzaId}`).remove();
	cart = cart.filter(item => item.id !== pizzaId);
	
	toggleCartClasses();
	setCookie(cookieKey, JSON.stringify(cart));
}

export const makeCommand = () => {
	$.post("./php/check_command.php", { 'command': JSON.stringify(cart) });

	/*
	 * Borramos las cookies asociadas al carro
	 */
	$.each($.cookie(), function (name, value) {
		if (/^custom/.test(name)) {
			$.removeCookie(name, { path: '/' });
		}
	});

	// Comprobamos la cookie del carrito y la eliminamos
	if (!!$.cookie('cart_5')) {
		$.removeCookie('cart_5', { path: '/' });
	}

	alert("¡Pedido realizado con éxito!");
	location.reload();
}