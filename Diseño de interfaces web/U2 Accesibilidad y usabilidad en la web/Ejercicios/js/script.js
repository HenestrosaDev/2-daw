$(function () {
	$(".navbar__item").on("click", (e) => toggleActive(e.currentTarget.id));
	$(".dropdown__item").on("click", (e) => toggleActive(e.currentTarget.id));
});

const toggleActive = (id) => {
	let element = $(`#${id}`);
	if (!element.hasClass("dropdown")) {
		// Evitamos que la clase "active" del item que contiene el dropdown se borre
		$(".active").removeClass("active");
	}
	$(`#${id}`).addClass("active");
	$(`a>span:first-child`).removeClass("text--red");
	$(`#${id}>a>span:first-child`).addClass("text--red");
};
