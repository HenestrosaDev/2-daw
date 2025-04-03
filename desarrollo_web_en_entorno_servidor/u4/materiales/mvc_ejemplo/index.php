<?php

require_once('Modelo.php');
require_once('Vista.php');
require_once('Controlador.php');

$modelo = new Modelo();
$vista = new Vista($modelo);
$controlador = new Controlador($modelo, $vista);

if (isset($_GET['acción']) && !empty($_GET['acción'])) {
    $controlador->{$_GET['acción']}();
} else {
    echo $vista->inicio();
}

?>
