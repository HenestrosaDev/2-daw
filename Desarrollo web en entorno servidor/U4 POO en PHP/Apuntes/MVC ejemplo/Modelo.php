<?php

class Modelo
{
    private $x;

    public function __construct() {
        $this->x = 0;
    }

    public function get_x() {
        return $this->x;
    }

    public function set_x($x) {
        $this->x = $x;
    }

}

?>
