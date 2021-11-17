<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
    <title>Unidad 1 | Ejercicio 1: 5</title>
    <?php
    require_once("../php/get_relative.php");
    $relative = get_relative(__FILE__);
    include $relative . "/common/head.php";
    ?>
</head>

<body>
    <?php include $relative . "/common/sidenav.php"; ?>

    <div id="main" class="main">
        <div>
            <div class="header">
                <h1>Control de versiones</h1>
            </div>
            <div id="a">
                <h2 class="header--margin">a) ¿Qué es un <strong>control de versiones</strong>? ¿Qué diferencias hay
                    entre uno centralizado y otro <strong>distribuido</strong>?</h2>
                <p>El <strong>control de versiones</strong> es el sistema mediante el cual se controlan los distintos
                    cambios realizados en un proyecto, sitio web, programa, documento, etc.</p>
                <p>Un control de versiones <strong>centralizado</strong> ofrece <strong>un servidor central</strong>
                    ideal para los equipos de trabajo, mientras que uno <strong>distribuido</strong> hace que un proyecto
                    se clone en cada uno de los ordenadores de los trabajadores/usuarios.</p>
            </div>

            <div id="b">
                <h2 class="header--margin">b) ¿Qué es <strong>Git</strong>? ¿Y <strong>GitHub</strong>? ¿En qué se
                    diferencian y cómo se relacionan
                    entre sí?</h2>
                <p><strong>Git</strong> es un software que registra todos los cambios realizados en los archivos de un
                    proyecto. Es usado para coordinar el trabajo de los programadores que colaboran en el desarrollo de
                    un proyecto.</p>
                <p><strong>GitHub</strong> es un proveedor de alojamiento dedicado al desarrollo de software y al
                    control de versiones usando <strong>Git</strong>.</p>
                <p>Se relacionan entre sí puesto que <strong>Git</strong> es la herramienta y <strong>GitHub</strong> es
                    uno de los servicios para los proyectos que usan <strong>Git</strong>.</p>
            </div>

            <div id="c">
                <h2 class="header--margin">c) Hazte una cuenta, si no la tienes, en <strong>GitHub</strong> con un
                    nombre de usuario serio y profesional.</h2>
                <p><a href="https://github.com/josecarlosLH">Mi cuenta de GitHub</a>.</p>
            </div>

            <div id="d">
                <h2 class="header--margin">d) Crea un proyecto en GitHub de una aplicación web tuya y usa Git para subir
                    el código.</h2>
                <p>En mi página de GitHub tengo subida <a href="https://github.com/josecarlosLH/PersonalWebsite">mi
                        sitio web personal</a>.</p>
            </div>
        </div>
    </div>

    <?php include $relative . "/common/footer.html"; ?>
    <?php include $relative . "/common/floating-buttons.html"; ?>
</body>

</html>