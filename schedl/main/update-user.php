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
include_once 'controller/bdController.php';
include_once "modelo/bd/mysql.php";

$client = new schedlController();
$id = isset($_POST['id']) ? isset($_POST['id']) : null;

if(isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['correo']) && isset($_POST['passw'])){
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $passw = $_POST['passw'];
    $hash = hash('sha256', $passw);
    $consulta = "SELECT * FROM `usuarios` WHERE `correo` = ? AND `id` != ?";
    $comprobacion = schedlBD::consultSelect($consulta, $correo, $id);

    if($comprobacion !== null){
    ?>
       <section id="seccion">
            <div id="user-created_container">
                <h2 id="mensajeConfirmacion" class="fuenteAfacad">El correo "<?php echo $correo; ?>" ya está en uso. Por favor elija otro.</h2>
                <form action="modify-user.php" id="register_form" method="POST">
                    <div>
                        <input type="hidden" id="nombre"  name="nombre"  value="<?php echo $nombre ?>" required>
                    </div>
                    <div>
                        <input type="hidden" id="edad"  name="edad"  value="<?php echo $edad; ?>" required>
                    </div>
                    <div>
                        <input type="hidden" id="correo"  name="correo"  value="<?php echo $correo; ?>" required>
                    </div>
                    <button id="register_button" class="fuenteAfacad" type="submit">Corregir datos</button>
                </form>
            </div>
        </section>
    <?php
    } else {

        if($client->updateClient($id, $nombre, $edad, $correo, $hash)){
        
        ?>
            <section id="seccion">
                <div id="user-created_container">
                    <h2 id="mensajeConfirmacion" class="fuenteBorel">El usuario ha sido modificado satisfactoriamente.</h2>
                    <div id="cs_index">
                        <a class="fuenteAfacad" href="log-out.php">Volver a Inicio</a>
                    </div>
                </div>
            </section>
        <?php
        } else {
        ?>
            <section id="seccion">
                <div id="user-created_container">
                    <h2 id="mensajeConfirmacion" class="fuenteBorel">Error en la modificación.</h2>
                </div>
            </section>
        <?php
        }
}
}
?>
</body>
</html>