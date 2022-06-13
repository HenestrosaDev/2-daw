<!-- Este archivo no puede modificarse -->

<?php

$modelo = glob( __DIR__ . '/Modelo/*.php');
$controladores = glob( __DIR__ . '/Controladores/*.php');

foreach ($modelo as $entidad) {
    require_once($entidad);
}

foreach ($controladores as $controlador) {
    require_once($controlador);
}

?>

<!-- Este archivo no puede modificarse -->
