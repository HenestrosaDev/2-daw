import { validateNumber } from "/js/script.js";

// Carga los componentes comunes
$(function () {
  setUpListeners();
});

const setUpListeners = () => {
  [
    document.getElementById("hypotenuse"),
    document.getElementById("leg-1"),
    document.getElementById("leg-2"),
  ].forEach((item) => {
    item.addEventListener("keyup", function () {
      validateNumber(this);
    });
  });

  document
    .getElementById("submit")
    .addEventListener("click", () => evaluateTriangle());
};

const evaluateTriangle = () => {
  // Obtenemos la hipotenusa del input del HTML
  let hypotenuse = parseInt(document.getElementById("hypotenuse").value);
  // Obtenemos el primer cateto del input del HTML
  let leg1 = parseInt(document.getElementById("leg-1").value);
  // Obtenemos el segundo cateto del input del HTML
  let leg2 = parseInt(document.getElementById("leg-2").value);

  console.log(`leg1: ${leg1} leg2: ${leg2} hypotenuse: ${hypotenuse}`);

  // Comprobamos si la suma de los catetos es menor al valor de la hipotenusa
  if (leg1 + leg2 < hypotenuse) {
    // Esto no puede producirse ya que no se trataría de un triángulo, por lo que lo notificamos al usuario.
    alert(
      "Triángulo no válido. La suma de los catetos no puede ser menor que el valor de la hipotenusa."
    );
  } else {
    // Comprobamos qué tipo de triángulo es
    if (leg1 == leg2 && leg1 != hypotenuse) {
      alert("El triángulo es isósceles");
    } else if (leg1 == leg2 && leg1 == hypotenuse) {
      alert("El triángulo es equilátero");
    } else if (leg1 != leg2 && leg1 != hypotenuse) {
      alert("El triángulo es escaleno");
    }
  }
};
