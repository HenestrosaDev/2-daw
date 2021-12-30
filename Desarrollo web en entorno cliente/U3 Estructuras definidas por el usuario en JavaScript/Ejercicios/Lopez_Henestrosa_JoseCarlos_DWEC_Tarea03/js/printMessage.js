export function printMessage(message, isError = true) {
	const node = document.createElement("div");
	node.innerHTML = message;
	if (isError) {
		document.getElementById("errors").appendChild(node);
	} else {
		document.getElementById("to-string").appendChild(node);
	}
}
