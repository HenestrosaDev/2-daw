/**
 * Cargamos los botones renderizados con la API Canvas
 */
export default function setUpButtons() {
  // Botón reproducir
  const play = $("#video-play");
  const playContext = play[0].getContext("2d");

  // Triángulo negro
  playContext.beginPath();
  playContext.fillStyle = "black";
  playContext.moveTo(5, 5);
  playContext.lineTo(35, 20);
  playContext.lineTo(5, 35);
  playContext.closePath();
  playContext.fill();
};