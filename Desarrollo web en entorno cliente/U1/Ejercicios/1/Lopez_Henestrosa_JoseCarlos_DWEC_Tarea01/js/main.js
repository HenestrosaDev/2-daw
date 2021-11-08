// Carga los componentes comunes
$(function () {
    $("#sidenav").load("/common/sidenav.html");
    $("#footer").load("/common/footer.html");
    $("#floating-buttons").load("/common/floating-buttons.html");
});

// Cambia la visibilidad del botón back-top dependiendo de si se está mostrando el top de la páguna
$(function () {
    $(window).on("scroll", function () {
        if ($(this).scrollTop() != 0) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });
});

// Añade funcionalidad al botón back-top
function backToTop() {
    $('html, body').animate({
        scrollTop: 0
    }, 800);
}

// Valida el número introducido en un input de tipo number
function validateNumber(element) {
    if (element.max !== '' && parseFloat(element.value) > element.max) {
        element.value = element.max;
    } else if (element.min !== '' && parseFloat(element.value) < element.min) {
        element.value = '';
    }
}