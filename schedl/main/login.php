<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="Styles.css">

</head>
<body>
<?php

include  'includes/forms_header.php';
include_once 'modelo/bd/mysql.php';

if(isset($_POST['user']) && isset($_POST['passw'])){
    $user = $_POST['user'];
    $consulta = "SELECT * FROM `usuarios` WHERE `correo` = '$user'";
    $resultado = schedlBD::consultSelect($consulta);

    if($resultado != null){
        $passw = hash('sha256', $_POST['passw']);

        if(isset($_POST['user']) && isset($_POST['passw'])){
            session_id(md5('Schedl'));
            $_SESSION['user']="$user";
        ?>
            <script>location.href="main.php"</script>
        <?php
        }else{
            ?>
            <section id="seccion">
            <div id="login_container">
                <h2 id="login_titulo" class="fuenteBorel">Iniciar sesión</h2>
                <div>
                    <h2 id="mensaje-sesionErronea" class="fuenteAfacad">Contraseña incorrecta</h2>
                    <form action="login.php" id="login-form" method="POST">
                        <input type="email" id="user" name="user" class="fuenteAfacad" placeholder="Correo electrónico" value="<?php echo $user?>" required>
                        <input type="text" minlength="6" id="passw" name="passw" class="fuenteAfacad" placeholder="Contraseña" value="" required>
                        <button id="botonValidar" class="fuenteAfacad" type="submit">Entrar</button>
                    </form>
                </div>
                <div class="separador_box">
                    <hr class="separador"/>
                </div>
                <ul class="login_logos">
                    <li class="logos">
                        <a href="google.com">
                            <img src="imagenes/G_logo.png" alt="logo google">
                        </a>
                    </li>
                    <li class="logos">
                        <a href="instagram.com">
                            <img src="imagenes/Instagram_logo.png" alt="logo instagram">
                        </a>
                    </li>
                    <li class="logos">
                        <a href="facebook.com">
                            <img src="imagenes/facebook.png" alt="logo facebook">
                        </a>
                    </li>
                    <li class="logos">
                        <a href="x.com">
                            <img src="imagenes/X-logo.png" alt="logo x">
                        </a>
                    </li>
                </ul>
                <p id="crearUsuario-txt" class="fuenteAfacad">¿Aún no tienes cuenta?</p>
                <div id="nuevoUsuario">
                    <a class="fuenteAfacad" href="create-user_form.php">Crear usuario</a>
                </div>
            </div>
        </section>
        <?php
        }
    } else {
    ?>
        <section id="seccion">
            <div id="login_container">
                <h2 id="login_titulo" class="fuenteBorel">Iniciar sesión</h2>
                <div>
                    <h2 id="mensaje-sesionErronea" class="fuenteAfacad">El usuario no existe</h2>
                    <form action="login.php" id="login-form" method="POST">
                        <input type="email" id="user" name="user" class="fuenteAfacad" placeholder="Correo electrónico" value="<?php echo $user?>" required>
                        <input type="text" minlength="6" id="passw" name="passw" class="fuenteAfacad" placeholder="Contraseña" value="" required>
                        <button id="botonValidar" class="fuenteAfacad" type="submit">Entrar</button>
                    </form>
                </div>
                <div class="separador_box">
                    <hr class="separador"/>
                </div>
                <ul class="login_logos">
                    <li class="logos">
                        <a href="google.com">
                            <img src="imagenes/G_logo.png" alt="logo google">
                        </a>
                    </li>
                    <li class="logos">
                        <a href="instagram.com">
                            <img src="imagenes/Instagram_logo.png" alt="logo instagram">
                        </a>
                    </li>
                    <li class="logos">
                        <a href="facebook.com">
                            <img src="imagenes/facebook.png" alt="logo facebook">
                        </a>
                    </li>
                    <li class="logos">
                        <a href="x.com">
                            <img src="imagenes/X-logo.png" alt="logo x">
                        </a>
                    </li>
                </ul>
                <p id="crearUsuario-txt" class="fuenteAfacad">¿Aún no tienes cuenta?</p>
                <div id="nuevoUsuario">
                    <a class="fuenteAfacad" href="create-user_form.php">Crear usuario</a>
                </div>
            </div>
        </section>
    <?php
    }
} else{
?>
    <section id="seccion">
        <div id="login_container">
            <h2 id="login_titulo" class="fuenteBorel">Iniciar sesión</h2>
            <div>
                <form action="login.php" id="login-form" method="POST">
                    <input type="email" id="user" name="user" class="fuenteAfacad" placeholder="Correo electrónico" required>
                    <input type="text" minlength="6" id="passw" name="passw" class="fuenteAfacad" placeholder="Contraseña" required>
                    <button id="botonValidar" class="fuenteAfacad" type="submit">Entrar</button>
                </form>
            </div>
            <div class="separador_box">
                <hr class="separador"/>
            </div>
            <ul class="login_logos">
                <li class="logos">
                    <a href="google.com">
                        <img src="imagenes/G_logo.png" alt="logo google">
                    </a>
                </li>
                <li class="logos">
                    <a href="instagram.com">
                        <img src="imagenes/Instagram_logo.png" alt="logo instagram">
                    </a>
                </li>
                <li class="logos">
                    <a href="facebook.com">
                        <img src="imagenes/facebook.png" alt="logo facebook">
                    </a>
                </li>
                <li class="logos">
                    <a href="x.com">
                        <img src="imagenes/X-logo.png" alt="logo x">
                    </a>
                </li>
            </ul>
            <p id="crearUsuario-txt" class="fuenteAfacad">¿Aún no tienes cuenta?</p>
            <div id="nuevoUsuario">
                <a class="fuenteAfacad" href="create-user_form.php">Crear usuario</a>
            </div>
        </div>
    </section>
    <?php
 }
    ?>
</body>
</html>