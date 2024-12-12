<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link rel="stylesheet" href="Styles.css">

</head>

<body>
    <?php
    include 'includes/main_header.php';

    if(!isset($_SESSION['user'])){
    ?>
        <script>location.href="login.php"</script>
    <?php
    }else{
        ?>
        <section id="seccion">
            <div id="main_container">
                <div class="main-message_container">
                    <h2 class="main_message fuenteBorel">Bienvenido, Eugenio</h2>
                </div>
                <div class="functions_container">
                    <div class="gestor_container">
                        <h2 class="gestor_message fuenteAfacad">Total cuenta:</h2>
                        <div class="num-gestor_container fuenteAfacad">
                            <p>846,71€</p>
                        </div>
                        <h2 class="gestor_message fuenteAfacad">Total gastos:</h2>
                        <div class="num-gestor_container fuenteAfacad">
                            <p>127,94€</p>
                        </div>
                        <div class="link-gestor_container fuenteAfacad">
                            <p></p>
                            <a href="">Ir al gestor</a>
                        </div>
                    </div>
                    <div class="calendario_container">Calendario</div>
                    <h2 class="prx-events_message fuenteBorel">Próximos eventos:</h2>
                    <div class="prx-events_container"></div>
                </div>
            </div>
        </section>
    <?php
    }
    ?>
</body>
</html>