<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
    <title>Unidad 1 | Ejercicio 1: 3a</title>
    <?php
    require_once("../../php/get_relative.php");
    $relative = get_relative(__FILE__);
    include $relative . "/common/head.php";
    ?>
</head>

<body>
    <?php include $relative . "/common/sidenav.php"; ?>

    <div id="main" class="main">
        <div class="header">
            <h1>Validación de usuario</h1>
        </div>

        <?php
        require_once $relative . "/php/filter.php";

        if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["fullName"])) {
                $errors[] = "El nombre completo es requerido.";
            }
            if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "No se ha indicado email o el formato no es correcto.";
            }
            if (!empty($_POST["phone"])) {
                $phone = $_POST["phone"];
                $phone = preg_replace("/[^0-9]/", '', $phone);
                $phone = filter($phone);
                if (strlen($phone) != 9) {
                    $errors[] = "El formato del teléfono no es correcto.";
                }
            }
            if (!empty($_POST["web"])) {
                $web = filter($_POST["web"]);
                if (!filter_var($web, FILTER_VALIDATE_URL)) {
                    $errors[] = "El formato de la página web no es correcto.";
                }
            }
            if (empty($_POST["comment"])) {
                $errors[] = "El comentario es requerido.";
            }
            if (empty($errors)) {
                $fullName = filter($_POST["fullName"]);
                $email = filter($_POST["email"]);
                $comment = filter($_POST["comment"]);
            }
        ?>
            <div id="results">
                <p class="form__results">
                    <?php
                    if (isset($errors)) {
                        foreach ($errors as $error) {
                            echo "$error <br>";
                        }
                    } else {
                        echo "Tu nombre y apellidos son $fullName, tu email es $email" . ((isset($phone)) ? ", tu teléfono es $phone" : "") . ((isset($web)) ? ", tu página es $web" : "") . " y tu consulta es $comment.";
                    }
                } else {
                    ?>
                    Error
                <?php } ?>
                </p>
            </div>
    </div>

    <?php include $relative . "/common/footer.html"; ?>
    <?php include $relative . "/common/floating-buttons.html"; ?>
</body>

</html>