"use script";

window.addEventListener("load", ()=>{
    document.getElementById("enviar").addEventListener("click", ejecutar);
 })
function ejecutar() {
    let mostrar= document.getElementById("mostrar");
   //mostrar el nº de formularios del body
   mostrar.innerHTML = `El nº de formularios es ${document.forms.length}`;
   //mostrar el nº de elementos de cada formulario
   mostrar.innerHTML +=`<br>Los elementos del ${document.getElementsByTagName("form")[0].id} son ${document.getElementById("frmFirst").elements.length}`
   mostrar.innerHTML +=`<br>Los elementos del ${document.forms[1].id} son ${document.getElementById("frmSec").elements.length}`
   
   //mostrar todos los elementos de los diferentes formularios que hay dentro del body

   for (let frm of document.forms){ //recorrer todos los formularios del body
    mostrar.innerHTML +=`<hr><br><br>Formulario ${frm.id}`;
    //mostrar los elementos
       for(let ele of frm.elements){ //recorrer todos los elementos del formulario 
        mostrar.innerHTML +=`<br> El id es ${ele.id}`;
        mostrar.innerHTML +=`<br> El type es ${ele.type}`;
        mostrar.innerHTML +=`<br> El valor es ${ele.value}`;
       }
   }

    

}