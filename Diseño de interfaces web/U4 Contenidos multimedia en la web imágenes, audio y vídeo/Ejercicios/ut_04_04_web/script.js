"use strict";
//declaraciones

//declaración de eventos
window.addEventListener("load", () => {
	const video = document.getElementById("video-1");
	document
		.getElementById("volume-up")
		.addEventListener("click", () => turnUpVolume(video));
	document
		.getElementById("volume-down")
		.addEventListener("click", () => turnDownVolume(video));
});

const turnUpVolume = (video) => {
	console.log("up");
	if (video.volume < 1) {
		video.volume += 0.1;
	}
}

const turnDownVolume = (video) => {
	console.log("down");
	if (video.volume > 0) {
		video.volume -= 0.1;
	}
}
