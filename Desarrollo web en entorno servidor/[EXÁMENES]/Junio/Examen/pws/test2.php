<?php
$remote='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].str_replace('pws/test2.php','ejercicios4y5/webservice.php',$_SERVER['PHP_SELF']);
?>
<script>
    var peticion = new XMLHttpRequest();    
    peticion.open('POST', '<?=$remote?>', true);
    peticion.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    peticion.onload = function (event) {
        let k;
        try {
            let r=JSON.parse(peticion.responseText);
            k="El precio de 6 ejemplares del libro 2 es "+r.total;                        
        }
        catch (e)
        {
            k="Error en el mensaje json.<br>"+peticion.responseText;
        }
        document.getElementById('resultado').innerHTML=k;

    }
    var parametros = 'id=2&unidades=6';
    peticion.send(parametros);
</script>
<div id="resultado">

</div>