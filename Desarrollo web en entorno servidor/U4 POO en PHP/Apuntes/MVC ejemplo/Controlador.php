<?php

class Controlador
{
    private $modelo;
    private $vista;

    public function __construct($modelo, $vista) {
        $this->modelo = $modelo;
        $this->vista = $vista;
    }

    public function modificar_modelo() {
        $this->modelo->set_x(5);
        $this->vista->modelo();
    }

    public function mostrar_modelo() {
        $this->vista->modelo();
    }

    public function mostrar_about() {
        $this->vista->about();
    }
}

?>
