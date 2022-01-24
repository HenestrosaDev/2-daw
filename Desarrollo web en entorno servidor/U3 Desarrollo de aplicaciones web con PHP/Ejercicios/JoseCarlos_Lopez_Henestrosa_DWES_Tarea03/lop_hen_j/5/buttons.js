const round = (value, precision = 1) => {
	let multiplier = Math.pow(10, precision || 0);
	return Math.round(value * multiplier) / multiplier;
}

$(function () {
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl)
	})
})

$('.btn-number').click(function (e) {
	e.preventDefault();

	fieldName = $(this).attr('data-field');
	type = $(this).attr('data-type');
	let input = $(`input[name='${fieldName}']`);
	let currentVal = round(parseFloat(input.val()));
	let step = round(parseFloat(input.attr('step')));
	let min = round(parseFloat(input.attr('min')));
	let max = round(parseFloat(input.attr('max')));

	if (!isNaN(currentVal)) {
		if (type == 'minus') {
			if (currentVal > min) {
				input.val(round(currentVal - step)).change();
			}
			if (currentVal - step == min) {
				input.addClass('d-none');
				$(this).attr('disabled', true);
			}
		} else if (type == 'plus') {
			if (currentVal + step >= min) {
				input.removeClass('d-none');
			}
			if (currentVal < max) {
				input.val(round(currentVal + step)).change();
			}
			if (currentVal == max) {
				$(this).attr('disabled', true);
			}
		}
	} else {
		input.val(step);
		input.removeClass('d-none');
	}
});

$('.input-number').focusin(function () {
	$(this).data('oldValue', $(this).val());
});

$('.input-number').change(function () {

	minValue = round(parseFloat($(this).attr('min')));
	maxValue = round(parseFloat($(this).attr('max')));
	valueCurrent = round(parseFloat($(this).val()));
	console.log(valueCurrent);

	name = $(this).attr('name');
	if (isNaN($(this).val()) || $(this).val().trim() == "") {
		$(this).addClass('d-none');
	} else {
		if (valueCurrent >= minValue) {
			$(`.btn-number[data-type='minus'][data-field='${name}']`).removeAttr('disabled')
		} else {
			alert(`La cantidad de kgs tiene que ser mayor o igual a ${minValue}`);
			$(this).val($(this).data('oldValue'));
		}
		if (valueCurrent <= maxValue) {
			$(`.btn-number[data-type='plus'][data-field='${name}']`).removeAttr('disabled')
		} else {
			alert(`La cantidad de kgs tiene que ser menor o igual a ${maxValue}`);
			$(this).val($(this).data('oldValue'));
		}
	}
});

$(".input-number").keydown(function (e) {
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