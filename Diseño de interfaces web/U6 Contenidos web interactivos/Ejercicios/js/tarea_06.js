"use strict";

// Importamos el archivo que renderiza los botones a través de la API Canvas
import setUpButtons from "./canvas.js";

/**
 * Cargamos las funciones que cargan los eventos del navbar, del footer y
 * de los bloques respectivos a la imagen, al vídeo y a la animación cuando
 * el documento cargue para.
 */
$(function () {
	handleNavbarOptions();
	handleTextFooterHover();

	setUpImageBlock();
	setUpVideoBlock();
	setUpAnimationBlock();
});

/**
 * Maneja las opciones del navbar.
 */
const handleNavbarOptions = () => {
	// Elementos del DOM
	const image = $("#navbar-image");
	const video = $("#navbar-video");
	const animation = $("#navbar-animation");

	const elements = [image, video, animation];
	const classes = ["fs--md", "text--blue"];

	// Se maneja el evento click sobre el botón Imagen
	image.on("click", () => {
		handleNavbarClasses(classes, elements, image);
		handleHiddenSections("-image");
	});

	// Se maneja el evento click sobre el botón Vídeo
	video.on("click", () => {
		handleNavbarClasses(classes, elements, video);
		handleHiddenSections("-video");
	});

	// Se maneja el evento click sobre el botón Animación
	animation.on("click", () => {
		handleNavbarClasses(classes, elements, animation);
		handleHiddenSections("-animation");
	});
};

/**
 * Se encarga de cambiar la fuente y el color de la letra de la opción
 * seleccionada
 *
 * @param {Array} classes	Clases para añadir/eliminar de un elemento
 * @param {Array} elements	Elementos a los que se le quitan las clases
 * @param {Element} selectedElement	Elemento al que se le añaden las clases
 */
const handleNavbarClasses = (classes, elements, selectedElement) => {
	classes.forEach((c) => {
		elements.map((element) => {
			if (element.is(selectedElement)) {
				element.addClass(c);
			} else {
				element.removeClass(c);
			}
		});
	});
};

/**
 * Muestra y oculta las secciones relacionadas con la opción seleccionada en el
 * navbar
 *
 * @param {Element} toShow
 */
const handleHiddenSections = (toShow) => {
	// Oculta los elementos que se cargan cuando no hay ninguna opción
	// seleccionada
	$("[id$='-to-hide']").addClass("hidden", "fade-out");

	// Oculta el bloque deseleccionado
	const contentNodes = document.querySelectorAll("[id$='-content']");
	const contentArray = [...contentNodes];

	contentArray.forEach((element) => {
		for (let i = 0; i < element.children.length; i++) {
			const child = element.children[i];
			if (!child.classList.contains("hidden")) {
				child.classList.add("hidden");
			}
		}
	});

	// Muestra el bloque seleccionado
	$(`[id$='${toShow}']`).each(function () {
		if ($(this).hasClass("hidden")) {
			$(this).removeClass("hidden");
			$(this).addClass("fade-in");
		}
	});
};

/**
 * Cuando hacemos hover sobre el texto del footer, esta opción se encargará de
 * cambiar de color sus elementos
 */
const handleTextFooterHover = () => {
	$("#footer-text").hover(
		// on hover
		function () {
			$(this).css("color", "white");
			$("footer").css({
				"background-color": "black",
				transition: "background-color 1s ease-out",
			});
		},
		// on mouseout
		function () {
			$(this).css("color", "");
			$("footer").css("background-color", "");
		}
	);
};

/*
 * IMAGE BLOCK
 * ----* ----* ----* ----* ----* ----* ----* ----* ----* ----*
 */

/**
 * Carga el bloque de las imágenes
 */
const setUpImageBlock = () => {
	$('input[name="distribution"]').on("change", function () {
		if ($(this).val() === "1") {
			toggleDistributions("#distribution-2", "#distribution-1");
		} else {
			toggleDistributions("#distribution-1", "#distribution-2");
		}
	});

	$("[class^=distribution__img--]").on("click", function () {
		const borderClass = "bordered--red";
		if ($(this).hasClass(borderClass)) {
			$(this).removeClass(borderClass);
		} else {
			$(this).addClass(borderClass);
		}
	});

	$("#image-filter-apply").on("click", function () {
		// Obtenemos el filtro a aplicar
		const filterToApply = `
			${$("#image-filter-name").val()}(
				${$("#image-filter-value").val()}%
			)
		`;

		// Obtenemos las imágenes seleccionadas
		let imagesToFilter = $(".bordered--red")
			.map(function () {
				return this.id;
			})
			.get();

		imagesToFilter = new Intl.ListFormat("es", { type: "conjunction" }).format(
			imagesToFilter
		);

		// Añadimos el filtro al historial
		addFilterToHistory(filterToApply, imagesToFilter);

		// Quitamos el borde rojo y aplicamos el filtro a la imagen seleccionada
		$(".bordered--red")
			.removeClass("bordered--red")
			.css("filter", filterToApply);

		// Reestablecemos el valor del <select>
		$("#image-filter-name").val("default");
	});
};

/**
 * Maneja el cambio de distribuciones
 *
 * @param {Element} toHide  Bloque para ocultar
 * @param {*} toShow  Bloque para mostrar
 */
const toggleDistributions = (toHide, toShow) => {
	$(toHide).slideUp("slow", function () {
		$("#image-filter-history").empty();

		$(toShow).slideDown("slow");
		$(`${toHide} > *`).removeClass("bordered--red").removeAttr("style"); // elimina los filtros
	});
};

/**
 * Añade el filtro renderizado al historial de filtros
 *
 * @param {String} filter  Filtro renderizado
 * @param {String} elements Elementos con el filtro aplicado
 */
const addFilterToHistory = (filter, elements) => {
	if (!filter.includes("default")) {
		$("#image-filter-history").prepend(`<p>${filter} | ${elements}</p>`);
	}
};

/*
 * VIDEO BLOCK
 * ----* ----* ----* ----* ----* ----* ----* ----* ----* ----*
 */

/**
 * Carga el bloque de los vídeos
 */
const setUpVideoBlock = () => {
	let selectedVideo;

	$('input[name="video"]').on("change", function () {
		selectedVideo = $(this).val();
	});

	// Mostramos el vídeo cuando pulsamos el botón cargar
	$("#video-load").on("click", function () {
		if (selectedVideo === "1") {
			$("#video-1").removeClass("hidden");
			$("#video-2").addClass("hidden");
			$("#video-2")[0].pause();
		} else if (selectedVideo === "2") {
			$("#video-1").addClass("hidden");
			$("#video-1")[0].pause();
			$("#video-2").removeClass("hidden");
		}
		$(`#video-${selectedVideo}`).get(0).currentTime = 0;
	});

	// Reproducimos el vídeo cuando pulsamos el play
	$("#video-play").on("click", function () {
		$(`#video-${selectedVideo}`).get(0).play();
	});

	// Pausamos el vídeo cuando pulsamos sobre pause
	$("#video-pause").on("click", function () {
		$(`#video-${selectedVideo}`).get(0).pause();
	});

	// Función importada del fichero canvas.js para cargar los botones
	setUpButtons();
};

/*
 * ANIMATION BLOCK
 * ----* ----* ----* ----* ----* ----* ----* ----* ----* ----*
 */

const setUpAnimationBlock = () => {
	// Cambiamos la duración de la animación en cuanto el usuario cambie su valor
	$("#animation-length").on("change", function () {
		$("#animation-canvas").css(
			"animation",
			`square-translation ${$(this).val()}s linear infinite`
		);
	});

	// Cambiamos la curvatura en cuanto el usuario cambie su valor
	$("#animation-radius").on("change", function () {
		$("#animation-canvas").css("border-radius", `${$(this).val()}px`);
	});
};
