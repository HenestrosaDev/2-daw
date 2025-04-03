"use script";
//modelo tradicional
// window.onload=()=>{
//     //establezca el evento click del boton
//     document.getElementById("enviar").onclick=acceder;

// }

window.addEventListener("load", inicio, true); //cuando se cargue la página se ejecuta la función inicio

let inicio=()=> {
    //     //establezca el evento click del boton
    document.getElementById("enviar").addEventListener("click", acceder);

}

let acceder = () => {
    //acceso por atributo id
 console.log("acceder")
    let objeto = document.getElementById("entrada")
    console.log(objeto.value);
    console.log(document.getElementById("entrada").value);

    //acceso por atributo name
    let objetosName = document.getElementsByName("entradaName");
    //devuelve una colección de etiquetas cuyo name es entradaName
    console.log(objetosName[1].value);

    //acceso por etiqueta
    let objetosTag = document.getElementsByTagName("input");
    //devuelve una colección de etiquetas cuyo name es entradaName
    console.log(objetosTag[1].value);

    // //eliminar evento
     document.getElementById("enviar").removeEventListener("click", acceder, true);
}
