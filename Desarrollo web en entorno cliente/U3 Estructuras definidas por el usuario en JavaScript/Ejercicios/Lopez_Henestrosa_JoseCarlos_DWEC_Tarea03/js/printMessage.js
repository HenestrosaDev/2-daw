export function printMessage(message, isError = true) {
	const element = document.createElement("div");
	element.innerHTML = message;
	if (isError) {
		document.getElementById("errors").appendChild(element);
	} else {
		document.getElementById("to-string").appendChild(element);
	}
}
