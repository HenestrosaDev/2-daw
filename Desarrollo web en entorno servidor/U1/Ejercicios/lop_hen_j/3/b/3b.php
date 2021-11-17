<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
    <title>Unidad 1 | Ejercicio 1: 3b</title>
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
            <h1>Validación de usuarios</h1>
            <h3>Rellene los campos y pulse <strong>Enviar</strong></h3>
        </div>

        <form id="form" action="./cv.php" method="post">
            <div class="form__columns">
                <input class="form__item" type="text" name="fullName" placeholder="Nombre y apellidos*" required>
                <input class="form__item" type="email" name="email" placeholder="Correo electrónico*" required>
                <input class="form__item" type="tel" name="phone" placeholder="Teléfono" oninput="check(this)" pattern="[0-9]{9}">
                <input class="form__item" type="text" name="city" placeholder="Pueblo/ciudad*" required>
            </div>
            <textarea rows="4" cols="100" name="about" placeholder="Habla un poco sobre ti…*" required></textarea>
            <div class="form__columns">
                <div class="form__column">
                    <div class="form__btn-container">
                        <button type="button" class="form__btn form__btn--modifier form__btn--modifier-add" onclick="addTextField('#languages-amount', 'Idioma', 'language', 'language_', '#generated-language')">+</button>
                        <button type="button" class="form__btn form__btn--modifier form__btn--modifier-remove" onclick="removeTextField('#languages-amount', '#language_')">−</button>
                    </div>
                    <input class="form__item" type="text" name="language1" placeholder="Idioma*" required>
                    <div id="generated-language"></div>
                    <input type="hidden" name="languagesAmount" value="1" id="languages-amount">
                </div>
                <div class="form__column">
                    <div class="form__btn-container">
                        <button type="button" class="form__btn form__btn--modifier form__btn--modifier-add" onclick="addTextField('#education-amount', 'Formación', 'education', 'education_', '#generated-education')">+</button>
                        <button type="button" class="form__btn form__btn--modifier form__btn--modifier-remove" onclick="removeTextField('#education-amount', '#education_')">−</button>
                    </div>
                    <input class="form__item" type="text" name="education1" placeholder="Formación*" required>
                    <div id="generated-education"></div>
                    <input type="hidden" name="educationAmount" value="1" id="education-amount">
                </div>
            </div>
            <textarea rows="4" cols="100" name="experience" placeholder="Habla un poco sobre tu experiencia…*" required></textarea>
            <button class="form__btn form__btn--submit" name="submit" value="submit" type="submit">Enviar</button>
        </form>
    </div>

    <?php include $relative . "/common/footer.html"; ?>
    <?php include $relative . "/common/floating-buttons.html"; ?>
</body>

</html>