"use strict"
let capa,pintar=false;
//eventos
window.addEventListener("load", function () {

    capa = document.getElementById("capa"); //asignar la etiqueta capa

    capa.addEventListener("mouseout", () => { //ratón sale. mouseleave parecido
        capa.style.backgroundColor = "brown" //cambiar color de la capa
    })
    capa.addEventListener("mouseover", () => { //ratón entra. mouseenter parecido
        capa.style.backgroundColor = "yellow"
    })
    capa.addEventListener("mousemove", () => { //ratón entra
        if (pintar){ //solo si el botón derecho del ratón está pulsado
        capa.style.backgroundColor = "pink"
        }
    })
    capa.addEventListener("mousedown", (e) => { //ratón pulsa botón derecho
       console.log(e.button);
        if (e.button==2){ //botón derecho
            pintar=true;
           
        }
        
    })
    capa.addEventListener("mouseup", (e) => { //ratón suelta botón
       
            pintar=false;
            capa.style.backgroundColor = "yellow" //cambiar color
       
        
    })
})