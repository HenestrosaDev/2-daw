import { validateNumber } from "/js/script.js";

// Carga los componentes comunes
$(function () {
  setUpListeners();
  evaluateGrade();
});

const setUpListeners = () => {
  document
    .getElementById("submit")
    .addEventListener("click", () => evaluateGrade());

  document.getElementById("grade").addEventListener("keyup", function () {
    validateNumber(this);
  });
};

const evaluateGrade = () => {
  // Obtenemos la nota del input del HTML
  const grade = document.getElementById("grade").value;

  // Establecemos un switch para imprimir valores por consola dependiendo de la nota
  switch (grade) {
    // Si la nota está entre 1 y 4, decimos que es insuficiente
    case grade >= 1 && grade <= 4 ? grade : -1:
      alert(grade + " -> Insuficiente");
      break;
    // Si la nota está entre 5 y 6, decimos que está
    case grade >= 5 && grade <= 6 ? grade : -1:
      alert(grade + " -> Bien");
      break;
    // Si la nota está entre 7 y 8, decimos que es notable
    case grade >= 7 && grade <= 8 ? grade : -1:
      alert(grade + " -> Notable");
      break;
    // Si la nota está entre 9 y 10, decimos que es sobresaliente
    case grade >= 9 && grade <= 10 ? grade : -1:
      alert(grade + " -> Sobresaliente");
      break;
  }
};
