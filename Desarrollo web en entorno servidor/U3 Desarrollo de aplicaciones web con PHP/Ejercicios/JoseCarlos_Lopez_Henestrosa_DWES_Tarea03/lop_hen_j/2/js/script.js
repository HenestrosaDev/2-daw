"use strict"

var cart = [];

const round = (value, precision = 1) => {
	let multiplier = Math.pow(10, precision || 0);
	return Math.round(value * multiplier) / multiplier;
}

const insertInCart = (edible) => {
	const liHtml = `
			<li id="cart__${edible.internalName}">
				<span class="cart__item">
					<span class="cart__item--left">
						<img src="./img/${edible.internalName}.png" height="50" width="50" alt="${edible.clientName}" />
						<span class="cart__item--info">
							<strong>${edible.clientName}</strong>
							<span class="text-muted">${edible.quantity} kg</span>
							<span>${round(edible.quantity * edible.price)}€</span>
						</span>
					</span>
					<span class="cart__item--right">
						<button id="${edible.internalName}__remove" class="btn btn-sm btn-close float-right"></button>
					</span>
				</span>
				<hr class="dropdown-divider">
			</li>
		`;

	$('#cart__list').prepend(liHtml);
	toggleCartClasses();
}

const setCookie = (value) => {
	$.post("./php/cookie_handler.php", { "cart": value });
}

const toggleCartClasses = () => {
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

$(function() {
	$.get("./php/cookie_handler.php", (data, status) => {
		if (data !== '') {
			cart = JSON.parse(data);
			cart.forEach(item => insertInCart(item));
		}
	});
});

$("[id*='__card']").on('click', function(e) {
	const edible = e.currentTarget.id.split('__');
	$('#edible__name--internal').val(edible[0]);
	$('#edible__name--client').val($(`#${edible[0]}__name`).text());
	$('#edible__price').val($(`#${edible[0]}__price`).text());
});

$('.btn--number').on('click', function (e) {
	e.preventDefault();

	const fieldName = $(this).attr('data-field');
	const type = $(this).attr('data-type');
	const input = $(`input[name='${fieldName}']`);
	const currentVal = round(parseFloat(input.val()));
	const step = round(parseFloat(input.attr('step')));
	const min = round(parseFloat(input.attr('min')));
	const max = round(parseFloat(input.attr('max')));
	
	if (!isNaN(currentVal)) {
		if (type == 'minus') {
			if (currentVal > min) {
				input.val(round(currentVal - step)).change();
			}
			if (currentVal - step <= min) {
				$(this).attr('disabled', true);
			}
		} else if (type == 'plus') {
			if (currentVal < max) {
				input.val(round(currentVal + step)).change();
			}
			if (currentVal + step >= max) {
				$(this).attr('disabled', true);
			}
		}
	} else {
		input.val(min);
	}
});


/* EDIBLE__KG */

$('#edible__kg').on('focusin', function () {
	$(this).data('oldValue', $(this).val());
});

$('#edible__kg').on('change', function () {

	const min = round(parseFloat($(this).attr('min')));
	const max = round(parseFloat($(this).attr('max')));
	const currentVal = round(parseFloat($(this).val()));

	const name = $(this).attr('name');
	if (!(isNaN($(this).val()) || $(this).val().trim() == '')) {
		if (currentVal >= min) {
			$(`.btn--number[data-type='minus'][data-field='${name}']`).removeAttr('disabled')
		} else {
			alert(`La cantidad de kgs tiene que ser mayor o igual a ${min}`);
			$(this).val($(this).data('oldValue'));
		}
		if (currentVal <= max) {
			$(`.btn--number[data-type='plus'][data-field='${name}']`).removeAttr('disabled')
		} else {
			alert(`La cantidad de kgs tiene que ser menor o igual a ${max}`);
			$(this).val($(this).data('oldValue'));
		}
	}
});

$('#edible__kg').on('keydown', function (e) {
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

/* ---------------------- */

/* METODOS QUE CONTROLAN EL CARRO */
$('#edible__add').on('click', function (e) {
	const quantity = $('#edible__kg').val();
	
	if (!isNaN(quantity) && quantity !== '' && (quantity > 0 && quantity <= 99)) {
		const edible = {
			clientName: $('#edible__name--client').val(),
			internalName: $('#edible__name--internal').val(),
			price: $('#edible__price').val(),
			quantity: quantity
		}
		insertInCart(edible);
		cart.push(edible);
		setCookie(JSON.stringify(cart));
	} else {
		alert('La cantidad de kgs introducida no es válida.');
	}
});

/* 
 * El elemento está siendo generado dinámicamente, 
 * por lo que tenemos que usar esta estructura:
 */
$(document).on('click', "[id*='__remove']", function (e) {
	const edible = e.currentTarget.id.split('__');
	$(`#cart__${edible[0]}`).remove();
	cart = cart.filter(item => item.internalName !== edible[0]);

	toggleCartClasses();
	setCookie(JSON.stringify(cart));
});