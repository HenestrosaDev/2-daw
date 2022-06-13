// este fichero tendrás que incorporarlo al desarrollo.
// en el tenemos una zona de código que tendrás que completar para que se muestre lo que se pide en el ejercicio.


// función para inicializar el contexto.
function iniciaCanvas(idCanvas) {
    var elemento = document.getElementById(idCanvas);
    if (elemento && elemento.getContext) {
        var contexto = elemento.getContext('2d');
        if (contexto) {
            return contexto;
        }
    }
    return false;
}

// Este código hace referencia a un objeto canvas con identficador "canvas_inicio"
window.onload = function() {
    ctx_iniciar = iniciaCanvas("canvas_inicio");

    //comprobamos el contexto
    if (ctx_iniciar) {

        ctx_iniciar.beginPath();
        ctx_iniciar.lineWidth = 5;
        ctx_iniciar.moveTo(5,5);
        ctx_iniciar.lineTo(45,25);
        ctx_iniciar.lineTo(5,45);
        ctx_iniciar.closePath();
        ctx_iniciar.fill();
        ctx_iniciar.stroke();
    }

}

