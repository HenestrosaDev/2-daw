window.addEventListener("load", () => {
	const storedColor = localStorage.getItem("color");
	if (storedColor) {
		document.body.style.background = localStorage.getItem("color");
		document.querySelector(
			`input[name="color"][value="${storedColor}"]`
		).checked = true;
	}

	document.getElementById("button").addEventListener("click", () => {
		const selectedColor = document.querySelector(
			'input[name="color"]:checked'
		).value;
		document.body.style.background = selectedColor;
		localStorage.setItem("color", selectedColor);
	});
});
