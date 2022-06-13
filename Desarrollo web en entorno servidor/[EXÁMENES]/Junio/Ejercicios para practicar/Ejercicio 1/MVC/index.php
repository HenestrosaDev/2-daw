<?php
//NO MODIFICAR:
{ preg_match('/index.php$/',$up1=explode('?',$_SERVER['REQUEST_URI'])[0]) 
    || header('Location: '. $up1.'/index.php') && exit(); }
?>
<!-- Este archivo no puede modificarse -->
<?php

require_once('autoload.php');

$controlador = new Controlador();

if (isset($_GET['acción']) && !empty($_GET['acción'])) {
    $controlador->{$_GET['acción']}();
} else {
    require_once('Vistas/inicio.php');
}

?>

<!-- Este archivo no puede modificarse -->
