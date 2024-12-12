<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario registrado</title>
    <link rel="stylesheet" href="Styles.css">

</head>

<body>
<?php
include "includes/forms_header.php";
include_once "modelo/bd/mysql.php";

if(isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['correo']) && isset($_POST['passw'])){
    $nombre= $_POST['nombre'];
    $edad= $_POST['edad'];
    $correo= $_POST['correo'];
    $consulta = "SELECT * FROM `usuarios` WHERE `correo` = '$correo'";
    $comprobacion = schedlBD::consultSelect($consulta);

    if($comprobacion !== null){
    ?>
       <section id="seccion">
            <div id="user-created_container">
                <h2 id="mensajeConfirmacion" class="fuenteAfacad">El correo "<?php echo $correo; ?>" ya está en uso. Por favor elija otro.</h2>
                <form action="create-user_confirm.php" id="register_form" method="POST">
                    <div>
                        <input type="hidden" id="nombre"  name="nombre"  value="<?php echo $nombre ?>" required>
                    </div>
                    <div>
                        <input type="hidden" id="edad"  name="edad"  value="<?php echo $edad; ?>" required>
                    </div>
                    <div>
                        <input type="hidden" id="correo"  name="correo"  value="<?php echo $correo; ?>" required>
                    </div>
                    <button id="register_button" class="fuenteAfacad" type="submit" formaction="create-user_form.php">Corregir datos</button>
                </form>
            </div>
        </section>
    <?php
    } else {
        $passw= $_POST['passw'];
        $hash = hash('sha256', $passw);
        $consulta = "INSERT INTO `usuarios`(`nombre`, `edad`, `correo`, `passw`) VALUES (?,?,?,?)";
        $conInsert = schedlBD::consultInsert($consulta, $nombre, $edad, $correo, $hash);

        if($conInsert){
        ?>
            <section id="seccion">
                <div id="user-created_container">
                    <h2 id="mensajeConfirmacion" class="fuenteBorel">El usuario ha sido creado satisfactoriamente.</h2>
                    <div class="datos-user_box">
                        <p class="fuenteAfacad"><strong>Correo:</strong> <?php echo $correo; ?>.</p>
                        <p class="fuenteAfacad"><strong>Nombre:</strong> <?php echo $nombre; ?>.</p>
                        <p class="fuenteAfacad"><strong>Edad:</strong> <?php echo $edad; ?>.</p>
                        <div id="cs_index">
                            <a class="fuenteAfacad" href="log-out.php">Volver a Inicio</a>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        } else {
        ?>
            <section id="seccion">
                <div id="user-created_container">
                    <h2 id="mensajeConfirmacion" class="fuenteBorel">Error en la inserción</h2>
                </div>
            </section>
        <?php
        }
}
}else{
?>
    <section id="seccion">
        <div id="user-created_container">
            <h2 id="mensajeConfirmacion" class="fuenteBorel">Error en la recepción</h2>
        </div>
    </section>
<?php
}

?>
</body>
</html>