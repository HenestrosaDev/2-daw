"use script";

window.addEventListener("load", ()=>{
    document.getElementById("enviar").addEventListener("click", ejecutar);
})
const ejecutar=()=> {
    let objeto=document.getElementById("mostrar");
    //diferentes formas de acceder al valor de la caja de texto
    // 1ª mediante el nombre del formulario y el nombre de la caja de texto
    objeto.innerHTML = document.formNameBusq.entradaName.value;
    document.formNameBusq.entradaName.value="Nuevo dato";

    //2ª mediante la colección de elementos del formulario
    objeto.innerHTML += `<br>Nº de elementos del formulario ${document.formNameBusq.elements.length}`
    objeto.innerHTML += `<br>${document.formNameBusq.elements[0].value}`;

    //3ª mediante la colección de elementos del formulario
    objeto.innerHTML += `<br>${document.formNameBusq.elements["entradaName"].value}`;
    //3ª mediante la colección de elementos del formulario
    objeto.innerHTML += `<br>${document.getElementById("entrada").value}`;

}
