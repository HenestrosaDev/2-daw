$(function () {
	$(window).on("scroll", function () {
		if ($(this).scrollTop() != 0) {
			$('#back-top').fadeIn();
		} else {
			$('#back-top').fadeOut();
		}
	});
});

function backToTop() {
	$('html, body').animate({
		scrollTop: 0
	}, 800);
}

function toggleTheme(shouldChange) {
	if (shouldChange) {
		if (localStorage.getItem('theme') == 'light') {
			localStorage.setItem('theme', 'dark');
		} else {
			localStorage.setItem('theme', 'light');
		}
	}
	document.querySelector("html").classList.toggle("html--light-theme");
	document.querySelector("body").classList.toggle("body--light-theme");
	document.getElementById("main").classList.toggle("main--light-theme");
	document.querySelector(".sidenav").classList.toggle("sidenav--light-theme");
	document.querySelector("footer").classList.toggle("footer--light-theme");
	document.querySelector("form").classList.toggle("form--light-theme");
	document.querySelector(".form__results").classList.toggle("form__results--light-theme");
}

function check(input) {
	if (input.validity.typeMismatch) {
		input.setCustomValidity("'" + input.value + "' no es un número español válido.");
	} else {
		input.setCustomValidity("");
	}
}

function addTextField(amount, placeholder, name, id, generated) {
	var new_chq_no = parseInt($(amount).val()) + 1;
	var new_input = "<input type='text' class='form__item form__item--generated' placeholder='" + placeholder + " (adicional)' name='" + name + new_chq_no + "' id='" + id + new_chq_no + "'>";
	$(generated).append(new_input);
	$(amount).val(new_chq_no);
}

function removeTextField(amount, id) {
	var last_chq_no = $(amount).val();
	if (last_chq_no > 1) {
		$(id + last_chq_no).remove();
		$(amount).val(last_chq_no - 1);
	}
}

function validateNumber(element) {
	if (element.max !== '' && parseFloat(element.value) > element.max) {
		element.value = element.max;
	} else if (element.min !== '' && parseFloat(element.value) < element.min) {
		element.value = '';
	}
}

$(document).ready(function () {
	if (localStorage.getItem('theme') == 'light') {
		toggleTheme(false);
	}
});