<?php

class Vista
{
    private $modelo;

    public function __construct($modelo) {
        $this->modelo = $modelo;
    }

    public function inicio() {
        require_once('plantillas/inicio.php');
    }

    public function modelo() {

        $modelo = $this->modelo;

        require_once('plantillas/modelo.php');
    }

    public function about() {
        require_once('plantillas/about.php');
    }

}

?>
