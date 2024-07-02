"use strict";

const canvas = document.getElementById("canvas--1");
const context = canvas.getContext("2d");

const drawLoadingCircle = () => {
	let radius = 20;
	let imageX = 15;
	let imageY = 15;

	const printElements = (radius) => {
		context.beginPath();
		context.fillStyle = "black";
		context.arc(275, 275, radius, 0, 2 * Math.PI, true); // 120 max
		context.fill();

		context.textBaseline = "alphabetic";
		context.textAlign = "center";
		context.font = "1.5rem Arial";
		context.fillStyle = "red";
		context.fillText(`${parseInt(radius / 1.2)}%`, 277, 285);
	};

	const interval = setInterval(function () {
		radius += 10;
		/* Borramos solo la zona donde se escribe el texto*/
		/* Aunque podríamos borrar todo el canvas*/
		printElements(radius);

		if (parseInt(radius / 1.2) % 25 == 0) {
			drawImage(imageX, imageY);
			imageY += 100;
		}

		if (radius >= 120) {
			clearInterval(interval);
			context.clearRect(100, 30, 300, 50);
		}
	}, 100);
};

const printLoadingText = () => {
	context.textBaseline = "alphabetic";
	context.textAlign = "center";
	context.font = "2rem Nueva";
	context.fillStyle = "purple";
	context.fillText("Cargando…", 300, 65);
};

const drawImage = (x, y) => {
	const image = new Image();
	image.src = "./img/7.jpg";
	image.addEventListener("load", function () {
		context.drawImage(this, x, y, 75, 75);
	});
};

const clearCanvas = () => {
	context.clearRect(0, 0, canvas.width, canvas.height);
};

window.addEventListener("load", () => {
	document.getElementById("canvas--2").addEventListener("click", () => {
		clearCanvas();
		drawLoadingCircle();
		printLoadingText();
	});
});
