<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
    <title>Unidad 1 | Ejercicio 1: Índice</title>
    <?php
    require_once("./php/get_relative.php");
    $relative = get_relative(__FILE__);
    include $relative . "/common/head.php";
    ?>
</head>

<body>
    <?php include $relative . "/common/sidenav.php"; ?>

    <div id="main" class="main">
        <div class="header">
            <h1>Índice</h1>
        </div>
        <p>Desde la barra de navegación se pueden acceder a los ejercicios con sus respectivos apartados sin necesidad
            de acceder al índice constantemente. Puedes cambiar el tema de la página gracias al botón de la esquina
            superior derecha.</p>
    </div>

    <?php include $relative . "/common/footer.html"; ?>
    <?php include $relative . "/common/floating-buttons.html"; ?>
</body>

</html>