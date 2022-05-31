/**
 * Cargamos los botones renderizados con la API Canvas
 */
export default function setUpButtons() {
  // Botón cargar
  const load = $("#video-load");
  const loadContext = load[0].getContext("2d");

  // Triángulo de arriba
  loadContext.beginPath();
  loadContext.fillStyle = "red";
  loadContext.moveTo(5, 20);
  loadContext.lineTo(20, 5);
  loadContext.lineTo(35, 20);
  loadContext.closePath();
  loadContext.fill();

  // Rectángulo de abajo
  loadContext.beginPath();
  loadContext.fillStyle = "red";
  loadContext.moveTo(5, 25);
  loadContext.lineTo(35, 25);
  loadContext.lineTo(35, 33);
  loadContext.lineTo(5, 33);
  loadContext.closePath();
  loadContext.fill();

  // Botón reproducir
  const play = $("#video-play");
  const playContext = play[0].getContext("2d");

  // Triángulo negro
  playContext.beginPath();
  playContext.fillStyle = "green";
  playContext.moveTo(5, 5);
  playContext.lineTo(35, 20);
  playContext.lineTo(5, 35);
  playContext.closePath();
  playContext.fill();

  // Botón pausa
  const pause = $("#video-pause");
  const pauseContext = pause[0].getContext("2d");

  // Rectángulo izquierdo
  pauseContext.beginPath();
  pauseContext.fillStyle = "black";
  pauseContext.moveTo(5, 5);
  pauseContext.lineTo(15, 5);
  pauseContext.lineTo(15, 35);
  pauseContext.lineTo(5, 35);
  pauseContext.closePath();
  pauseContext.fill();

  // Rectángulo derecho
  pauseContext.beginPath();
  pauseContext.fillStyle = "black";
  pauseContext.moveTo(25, 5);
  pauseContext.lineTo(35, 5);
  pauseContext.lineTo(35, 35);
  pauseContext.lineTo(25, 35);
  pauseContext.closePath();
  pauseContext.fill();
};