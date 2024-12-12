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

    if(isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['correo']) && isset($_POST['passw'])){
        $nombre= $_POST['nombre'];
        $edad= $_POST['edad'];
        $correo= $_POST['correo'];
        $contraseña= $_POST['passw'];
    ?>
        <section id="seccion">
            <div id="register_container">
                <h2 id="register_titulo" class="fuenteBorel">Registrarse</h2>
                    <form action="create-user_confirm.php" id="register_form" method="POST">
                        <input type="text" id="nombre" name="nombre" class="fuenteAfacad" placeholder="Nombre" value="<?php echo $nombre; ?>" required>
                        <input type="number" id="edad" name="edad" class="fuenteAfacad" placeholder="Edad" value="<?php echo $edad; ?>" required>
                        <input type="mail" id="correo" name="correo" class="fuenteAfacad" placeholder="Correo" value="<?php echo $correo; ?>" required>
                        <input type="text" minlength="8" maxlength="20" id="passw" name="passw" class="fuenteAfacad" placeholder="Contraseña" value="<?php echo $passw; ?>" required>
                        <button id="register_button" class="fuenteAfacad" type="submit">Confirmar</button>
                    </form>
            </div>
        </section>
    <?php
    } else {
    ?>
        <section id="seccion">
            <div id="register_container">
                <h2 id="register_titulo" class="fuenteBorel">Registrarse</h2>
                <form action="create-user_confirm.php" id="register_form" method="POST">
                    <input type="text" id="nombre" name="nombre" class="fuenteAfacad" placeholder="Nombre" required>
                    <input type="number" id="edad" name="edad" class="fuenteAfacad" placeholder="Edad" required>
                    <input type="mail" id="correo" name="correo" class="fuenteAfacad" placeholder="Correo" required>
                    <input type="text" minlength="8" maxlength="20" id="passw" name="passw" class="fuenteAfacad" placeholder="Contraseña" required>
                    <button id="register_button" class="fuenteAfacad" type="submit">Confirmar</button>
                </form>
            </div>
        </section>

    <?php
    }
    ?>
</body>
</html>