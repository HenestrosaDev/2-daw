// Carga los componentes comunes
$(function () {
  document
    .getElementById("submit")
    .addEventListener("click", () => printPrimeNumbers());
});

const printPrimeNumbers = () => {
  // Notificamos al usuario que los números están siendo impresos por consola
  alert("Mira la consola para ver el resultado.");

  // Empezamos desde el primer número primo, el cual va a ser el dividendo
  let dividend = 2;
  // Iteramos hasta que el valor del dividendo sea igual o menor a 100
  while (dividend <= 100) {
    // Por cada dividendo, vamos a dividir por todos los números menores que él hasta 1
    for (let divider = dividend - 1; divider >= 1; divider--) {
      // Si el resto de la división es 0, comprobamos si se trata de un número primo o no
      if (dividend % divider == 0) {
        // Si el divisor es 1, significa que el dividendo solo se puede dividir entre él mismo y 1
        if (divider == 1) {
          // Imprimimos el número por pantalla
          console.log(dividend);
        }
        // Incrementamos el valor del dividendo en 1
        dividend++;
        // Salimos del bucle cuando el divisor haya podido ser dividido entre el dividendo con resto 0.
        break;
      }
    }
  }
};
