"use strict";

// Importamos el archivo que renderiza los botones a través de la API Canvas
import setUpButtons from "./canvas.js";

/**
 * Cargamos las funciones que cargan los eventos del navbar, del footer y 
 * de los bloques respectivos a la imagen, al vídeo y a la animación cuando
 * el documento cargue para.
 */
$(function () {
  setUpVideoBlock();
  setUpJqueryBlock();
});

/*
 * VIDEO BLOCK
 * ----* ----* ----* ----* ----* ----* ----* ----* ----* ----*
 */

/**
 * Carga el bloque de los vídeos
 */
const setUpVideoBlock = () => {
  // Reproducimos el vídeo cuando pulsamos el play
  $("#video-play").on("click", function () {
    $("#video").get(0).play();
  });

  // Función importada del fichero canvas.js para cargar los botones
  setUpButtons();
}

/*
 * JQUERY BLOCK
 * ----* ----* ----* ----* ----* ----* ----* ----* ----* ----*
 */

const setUpJqueryBlock = () => {
  $("#option-1").on("click", function () {
    $("#image").css("border", "10px solid blue");
  });

  $("#option-2").on("click", function () {
    $("#image").css("filter", "grayscale(100%)");
  });

  $("#option-3").on("click", function () {
    $("#image").css("width", "150px");
    $("#image").css("height", "100px");
  });
}