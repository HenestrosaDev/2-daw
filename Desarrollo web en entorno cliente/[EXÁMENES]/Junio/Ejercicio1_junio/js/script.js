"use strict";

window.addEventListener("load", () => {
	setUpListeners();
});

// Escucha al evento submit del formulario 
const setUpListeners = () => {
    document
        .getElementById("survey__form")
        .addEventListener("submit", function (e) {
            e.preventDefault();    

            // Si el nick name no es válido, modificamos el input
            if (!isNickNameValid()) {
                setNickNameIncorrect();
            } else {
                // Si es válido, mostramos el resultado y eliminamos el borde rojo
                appendResult();
                document.getElementById("survey__nickname").removeAttribute("style")
            }

            changeSquareColor();
        });
}

/*
 ********************************** NICKNAME *********************************
 * Dividimos el RegExp en 2 grupos (delimitados por paréntesis)
 *****************************************************************************
 * PUNTO 1: Debe comenzar por una consonante mayúscula.
 *****************************************************************************
 * Regex: ^([^ -AEIOU[-ÿ])

 - El primer ^ afirma la posición al comienzo de la cadena.
 - El ^ contenido en el grupo comprueba que el nombre de usuario NO comienza con
   el patrón determinado.
 -  -A excluye los caracteres ASCII comprendidos entre el índice 32 ( ) y el 65
    (A).
 - EIOU son caracteres a excluir dentro del rango de consonantes en mayúscula.
 - [-ÿ El carácter [ es el valor que sucede al carácter Z, por lo que todos los
   caracteres consecuentes son innecesarios. -ÿ filtra los caracteres hasta ÿ,
   el cual es el último carácter ASCII (255).


 ******************************************************************************
 * PUNTO 2: Seguidamente, debe contener letras minúsculas de la 'a' a la 'z',
 * incluida la 'ñ'.
 ******************************************************************************
 * Regex: ([a-zñ])
 * NOTA: El regex final es ([a-zñ0-9@]) puesto que se tienen que añadir los 
 * números y el '@' para comprobarlos posteriormente con código JavaScript


 ******************************************************************************
 * PUNTO 3: El antepenúltimo carácter será @
 ******************************************************************************
 * text.charAt(text.length - 3) === '@'
 
 
 ******************************************************************************
 * PUNTO 4: Después de la arroba solo se permitirán 2 dígitos impares
 ******************************************************************************
 * Compobado con el condicional, el bucle y el boolean areNumbersOdd


 ******************************************************************************
 * PUNTO 5: Mínimo 8 y máximo 20 caracteres
 ******************************************************************************
 - {7,19} el número de veces que se tiene que repetir el patrón, sin tener en
   cuenta la primera consonante mayúscula.

 Regex final: /^([^ -AEIOU[-ÿ])([a-zñ0-9@]){7,19}$/
 */
const isNickNameValid = () => {
    const nickName = document.getElementById("survey__nickname").value
    
    const matchesRegex = checkMatch(nickName)(/^([^ -AEIOU[-ÿ])([a-zñ0-9@]){7,19}$/);
    
    if (matchesRegex) {
        const isPenultimateCharValid = nickName.charAt(nickName.length - 3) === '@';
        const splitNickName = nickName.split("@");

        let areNumbersOdd = false;

        // Comprobamos si está el carácter "@" presente en el valor del input y que solo hay dos números tras el "@"
        if (splitNickName && splitNickName[1].length == 2) {
            // Iteramos por cada elemento 
            for (let i=0; i < splitNickName[1].length; i++) {
                const currentChar = splitNickName[1].charAt(i);

                // Comprobamos si el carácter es un número y que sea impar
                if (typeof parseInt(currentChar) == 'number' && parseInt(currentChar) % 2 !== 0) {
                    areNumbersOdd = true;
                } else {
                    areNumbersOdd = false;
                }
            }
        }

        return matchesRegex && isPenultimateCharValid && areNumbersOdd;
    } else {
        return matchesRegex;
    }
}

// Pone el fondo rojo del input del nick name en caso de que no sea correcto
const setNickNameIncorrect = () => {
    document.getElementById("survey__nickname").setAttribute('style', 'border:1px solid red !important');
}

// Valora si el valor de un input coincide con el de una Regex
const checkMatch = (value) => {
	return (regex) => regex.test(value);
};

// Cambia el color del cuadrado dependiendo de la opción seleccionada por el usuario
const changeSquareColor = () => {
    const elementColor = document.getElementById("color");
    const selectedColor = elementColor.options[elementColor.selectedIndex].text;
    document.getElementById("square").style.backgroundColor = selectedColor;
}

// Mostramos al usuario los datos de entrada que ha proporcionado
const appendResult = () => {
    const resultElement = document.getElementById("resultado");
    resultElement.innerHTML = "";
    
    const userNode = 
        document.createTextNode(`El usuario es ${document.getElementById("survey__nickname").value} `);
    resultElement.appendChild(userNode);

    const elementColor = document.getElementById("color");
    const selectedColor = elementColor.options[elementColor.selectedIndex].text;
    const colorNode = document.createTextNode(`su color favorito es ${selectedColor} `);
    resultElement.appendChild(colorNode);

    const ageNode = document.createTextNode(`y es ${document.querySelector('input[name="edad"]:checked').value}`);
    resultElement.appendChild(ageNode);
}
