"use strict"
let texto;
window.addEventListener("load", () => {
    texto = document.getElementById("texto");
    document.getElementById("probar").addEventListener("click", validar)
})

let validar=()=>{
    let expresion; //variable que va a contener el patrónpatrón
    //1.- El patrón debe tener la palabra mesa
   //expresion=/mesa/; //debe contener la palabra mesa
    //expresion=/^mesa/; //debe comenzar por mesa
    //expresion=/^mesa$/i //solo debe contener mesa
    //2.- Contine perro o gato
    //expresion=/(perro|gato)/; //contiene perro o gato
   // 3.- El patrón debe contener letras mayúsc y minúsc, espacios en blanco y que no esté vacío.
    
   // expresion=/^[a-z\sñá-ú]{1,}$/i || expresion=/^[a-z\sñá-ú]+$/i
   //expresion=/^[A-ZÑÁ-Ú]{3}[a-z\sñá-ú]{1,}$/    //El primer carácter obligatoriamente debe ser mayúsculas y el resto minúsculas
   //4.- Números
   //expresion=/^\d{4}$/ //cuatro números
   //expresion=/^[5-9]{4}$/ cuatro números que contengan del 5 al 9
   //expresion=/^(0[1-9]|1[0-5])$/ números entre 01 al 15
   //5.- validar hora hh:mm
//expresion=/^([0-1][0-9]|2[0-3]):[0-5][0-9]$/



// Otra forma de hacerlo es crear un objeto RegExp
//let exprObj=new RegExp("^(perro|gato)$")
    if (expresion.test(texto.value)){
        alert("correcto")
    }else{
        alert("incorrecto")
    }

}