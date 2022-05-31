<?php
include_once 'Idea.php'; // Aquí implementarás la clase Idea con los atributos y métodos necesarios

$ideas=[];
//$ideas[]=new Idea(1, ...); // Aquí insertarás en un array varias instancias de la clase Idea
//$ideas[]=new Idea(2, ...);

function obtenerIdeaPorId(array $ideas, int $id )
{
	// Aquí implementarás la obtener una idea por identificador
}



// Ejercicio 2, apartado 3a.

if ($_SERVER['REQUEST_METHOD']=='GET'
    && isset($_GET['id']) && is_numeric($_GET['id']))
{
    $idea = obtenerIdeaPorId($ideas,$_GET['id']);
    if ($idea)
    {
        $i=new class() {};
        $i->id=$idea->getId();
        $i->idea=$idea->getIdea();
        $i->votos=$idea->getVotos();
        echo json_encode($i);
    }
}

// Ejercicio 2, apartado 3d.
if ($_SERVER['REQUEST_METHOD']=='POST' 
    && isset($_POST['id'])
    && is_numeric($_POST['id']) /* Etc. */)
{    
	// Insertar en la BBDD
	
}
