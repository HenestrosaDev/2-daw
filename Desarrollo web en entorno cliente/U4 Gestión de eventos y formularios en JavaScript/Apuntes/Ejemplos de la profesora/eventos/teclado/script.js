"use strict"
//declaraciones

//declaración de eventos
window.addEventListener("load", () => {
    //establecer los eventos keypress
    document.getElementById("nombre").addEventListener("focus", colorFondo); //recibe foco
    document.getElementById("nombre").addEventListener("blur", quitarColorFondo); //pierde foco
     document.getElementById("edad").addEventListener("focus", colorFondo);
    document.getElementById("edad").addEventListener("blur", quitarColorFondo);
    document.getElementById("nombre").addEventListener("keypress", validarNombre); //pulsa tecla
    document.getElementById("edad").addEventListener("keypress", validarEdad);
   
});
//Cambio de color el fondo cuando recibe el foco
//const colorFondo=()=>{
const colorFondo = function () {
    // document.getElementById("nombre").style.backgroundColor="cyan"
   // document.getElementById("edad").style.backgroundColor="cyan"
    this.style.backgroundColor = "cyan"
}
//quitar de color de fondo al perder el foco
//let quitarColorFondo=()=>{
const quitarColorFondo = function () {
    // document.getElementById("nombre").style.backgroundColor=null
    this.style.backgroundColor = null
}
const validarNombre = (evento) => {
   
    console.log(evento.which) //codigo ascii
    if (evento.which >= 48 && evento.which <= 57) { //código asccii de un número error
        //anular el evento
        evento.preventDefault();
    }
}

const validarEdad = (e) => {
    if (e.which < 48 || e.which > 57) { //error
        //anular el evento
        e.preventDefault();
    }
    console.log(e.which) //codigo ascii
}