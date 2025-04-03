<?php

class Controlador
{
    private $libro;

    public function mostrar_inicio()
    {
        require_once('Vistas/inicio.php');
    }

    public function mostrar_ver_libro()
    {
        // Aquí se instanciaría la clase libro con los datos ofrecidos

        require_once('Vistas/ver_libro.php');
    }

    // Aquí vendría el método 'mostrar_sobre_nosotros'

}

?>
