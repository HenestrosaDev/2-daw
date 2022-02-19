"use strict"
//declaraciones
grecaptcha.ready(function () {
    grecaptcha.execute('pon tu clave de recaptcha', {
        action: 'homepage'
    }).then(function (token) {
        document.getElementById("g-recaptcha-response").value=token;

    });
});

window.addEventListener("load", () => {
    document.getElementById("enviar").addEventListener("click", comprobar)
})
let comprobar = (e) => {
   
    let errores = false;
    
    
    //automatizar el proceso para recorrer los objetos input text y select
    for (let elemento of document.getElementsByClassName("validar")) {
        if (comprobarValue(elemento, document.getElementById("err" + elemento.id))) {
            errores = true; //Ha encontrado errores
        }
    }
    if (comprobarGenero() || errores) {
        e.preventDefault(); //Si hay errores anulamos el evento submit

    }

}
let comprobarValue = (objeto, spanErr) => {
    let error = true
    if (objeto.value == "") { //vacío
        spanErr.innerText = "Dato requerido"
        //añadir una clase al objeto nombre
        objeto.classList.add("errorTexto")
    } else { //está lleno
        spanErr.innerText = ""; //limpiamos el span
        //quitar una clase al objeto nombre
        objeto.classList.remove("errorTexto")
        error= false;
    }
    return error;
}

let comprobarGenero = () => {
    let error = true;
    for (let elemento of document.getElementsByName("genero")) {
        if (elemento.checked) {
            error = false
        }
    }
    if (!error) {
        document.getElementById("errGenero").innerText = "";
    } else {
        document.getElementById("errGenero").innerText = "Dato requerido";
    }
    return error;
}