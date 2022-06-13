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
        $libro = new Libro(7, "El viejo y el mar", "Ernest Hemingway", 10.40);
        require_once('Vistas/ver_libro.php');
    }

    public function mostrar_sobre_nosotros()
    {
        require_once('Vistas/sobre_nosotros.php');
    }

}

?>
