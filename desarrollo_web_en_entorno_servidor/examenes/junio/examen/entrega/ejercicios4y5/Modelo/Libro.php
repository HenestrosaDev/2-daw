<?php

class Libro
{
	private $id;
  private $titulo;
	private $autor;
	private $precio;

  function __construct($id, $titulo, $autor, $precio) {
    $this->id = $id;
    $this->titulo = $titulo;
    $this->autor = $autor;
    $this->precio = $precio;
  }

  function get_id() {
    return $this->id;
  }

	function set_id($id) {
    $this->id = $id;
  }

	function get_titulo() {
    return $this->titulo;
  }

	function set_titulo($titulo) {
    $this->titulo = $titulo;
  }

	function get_autor() {
    return $this->autor;
  }

	function set_autor($autor) {
    $this->autor = $autor;
  }

	function get_precio() {
    return $this->precio;
  }

	function set_precio($precio) {
    $this->precio = $precio;
  }
}
?>
