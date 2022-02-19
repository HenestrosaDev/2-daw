"use script";


let acceder=()=> {
    //acceso por atributo id
    let objeto=document.getElementById("entrada")
    console.log("acceso por id");
    console.log(objeto.value);
    console.log(document.getElementById("entrada").value);

    // //acceso por atributo name
    let objetosName=document.getElementsByName("entradaName");
    //devuelve una colección de etiquetas cuyo name es entradaName
    console.log("acceso por name");
    console.log(objetosName.length);
    console.log(objetosName)
     console.log(objetosName[1].value);

    // //acceso por etiqueta
    let objetosTag=document.getElementsByTagName("input");
    // //devuelve una colección de etiquetas cuyo name es entradaName
     console.log(objetosTag[1].value);

}
acceder();
