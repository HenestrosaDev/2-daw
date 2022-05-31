<?php

class Controlador
{
    private $tarea;

    public function mostrar_inicio()
    {
        require_once('Vistas/inicio.php');
    }

    public function mostrar_ver_tarea()
    {
        require_once('Vistas/ver_tarea.php');
    }

}

?>
