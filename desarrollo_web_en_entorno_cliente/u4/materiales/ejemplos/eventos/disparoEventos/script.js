"use strict"
//declaraciones

//declaración de eventos
window.addEventListener("load", () => {
    //establecer disparo de evento por burbujeo
   // document.getElementById("padre").addEventListener("click", mostrarMenPadre,false)
    //establecer disparo de evento por captura
    document.getElementById("padre").addEventListener("click", mostrarMenPadre,true)
    document.getElementById("hijo").addEventListener("click", mostrarMenHijo)
});

let mostrarMenPadre=()=>{
    alert("Ha pulsado la capa padre")
}
let mostrarMenHijo=(e)=>{
    alert("Ha pulsado la capa hijo");
    e.stopPropagation(); //anula propagación de evento cuando es por burbujeo

}