<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
    <title>Unidad 1 | Ejercicio 1: 4c</title>
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
            <h1 class="header--margin">Informe de salud personal</h1>
            <h3>Índice masa corporal e índice metabólico basal</h3>
        </div>

        <form id="form" action="#" method="post">
            <div class="form__columns">
                <!-- Tallest man on Earth: 2.73 m. Source: https://en.wikipedia.org/wiki/List_of_tallest_people -->
                <input class="form__item" type="number" name="height" placeholder="Altura (en m)*" min="0.50" max="2.75" step="0.01" onkeyup="validateNumber(this)" title="Entre 0.50 m y 2.50 m" required>
                <!-- Heaviest man on Earth: 635 kg. Source: https://en.wikipedia.org/wiki/List_of_heaviest_people -->
                <input class="form__item" type="number" name="weight" placeholder="Peso (en kg)*" min="1" max="640" step="0.01" onkeyup="validateNumber(this)" title="Entre 1 kg y 300 kg" required>
                <input class="form__item" type="number" name="age" placeholder="Edad*" min="1" max="99" onkeyup="validateNumber(this)" title="Entre 1 y 99 años" required>
            </div>
            <div class="form__radio-container">
                <p class="inline">Sexo:</p>
                <label class="form__radio-item">Hombre
                    <input class="form__radio-input" type="radio" name="sex" value="hombre" checked="checked">
                    <span class="form__radio-box"></span>
                </label>
                <label class="form__radio-item">Mujer
                    <input class="form__radio-input" type="radio" name="sex" value="mujer">
                    <span class="form__radio-box"></span>
                </label>
            </div>
            <button class="form__btn form__btn--submit" type="submit" name="submit" value="submit" style="margin-top: 10px;">Calcular</button>
        </form>

        <?php
        require_once $relative . "/php/filter.php";

        if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["height"])) {
                $errors[] = "La altura es requerida.";
            }
            if (empty($_POST["weight"])) {
                $errors[] = "El peso es requerido.";
            }
            if (empty($_POST["age"])) {
                $errors[] = "La edad es requerida.";
            }
            if (empty($errors)) {
                $height = filter($_POST["height"]);
                $weight = filter($_POST["weight"]);
                $age = filter($_POST["age"]);
                $sex = $_POST["sex"];

                $bodyMassIndex = $weight / $height ** 2;
                $basalMetabolicRate = (10 * $weight) + (6.25 * $height * 100) - (5 * $age);
                if ($sex == "hombre") {
                    $basalMetabolicRate += 5;
                } else {
                    $basalMetabolicRate -= 161;
                }
            } ?>
            <div id="results">
                <p class="form__results">
                    <?php
                    if (isset($errors)) {
                        foreach ($errors as $error) {
                            echo "$error <br>";
                        }
                    } else {
                        echo "Has introducido a " . (($sex == "mujer") ? "una" : "un") . " $sex con una altura de $height m, un peso de $weight kg y una edad de $age años.<br>";
                        echo "El <strong>índice de masa corporal</strong> es " . round($bodyMassIndex, 2) . " kg/m<sup>2</sup><br>";
                        echo "El <strong>índice metabólico basal</strong> es " . round($basalMetabolicRate, 2) . " kcal";
                    }
                    ?></p>
            </div>
        <?php } ?>
    </div>

    <?php include $relative . "/common/footer.html"; ?>
    <?php include $relative . "/common/floating-buttons.html"; ?>
</body>

</html>