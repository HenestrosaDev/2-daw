<?php

    include_once './funcs.php';
    $remote='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].str_replace('pws/test1.php','ejercicios4y5/webservice.php',$_SERVER['PHP_SELF']);
    
    //Consulta al servicio web usando la función proporcionada "get"
    $params=['id'=>1];
    //Consulta al servicio web usando CURL (función get proporcionada en funcs.php)
    $datos=get($remote,$params);
    echo $datos;

    //Consulta al servicio web usando file_get_contents
    //$query=http_build_query($params);
    //$uri=$remote.'?'.$query;
    //$datos=file_get_contents($uri);
    //echo "<BR>";
    //echo $datos;


