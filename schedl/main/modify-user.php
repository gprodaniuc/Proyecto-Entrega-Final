<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="Styles.css">


</head>

<body>
    <?php
    include "includes/forms_header.php";

    ?>
    <section id="seccion">
        <div id="register_container">
            <h2 id="register_titulo" class="fuenteBorel">Modificar usuario</h2>
                <form action="update-user.php" id="register_form" method="POST">
                    <input type="text" id="nombre" name="nombre" class="fuenteAfacad" placeholder="Nombre" required>
                    <input type="number" id="edad" name="edad" class="fuenteAfacad" placeholder="Edad" required>
                    <input type="mail" id="correo" name="correo" class="fuenteAfacad" placeholder="Correo" required>
                    <input type="text" minlength="8" maxlength="20" id="passw" name="passw" class="fuenteAfacad" placeholder="Contraseña" required>
                    <button id="register_button" class="fuenteAfacad" type="submit">Confirmar</button>
                </form>
        </div>
    </section>
</body>
</html>