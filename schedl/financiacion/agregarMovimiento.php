<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Financiación</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    

<?php
include 'conexionBD.php'; 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $fecha = $_POST['fecha'];
    $monto = $_POST['monto'];

    // Si el tipo es 'gasto', hacemos que el monto sea negativo
    if ($tipo == 'gasto') {
        $monto = -$monto;
    }

    // Preparar la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO movimientos (tipo, descripcion, categoria, fecha, monto) 
            VALUES ('$tipo', '$descripcion', '$categoria', '$fecha', '$monto')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Gestión de Financiación</h1>";
        echo "<h2>Nuevo movimiento agregado correctamente</h2>";
    ?>
        <button class="boton-volver" onclick="window.location.href='index.php'">Volver</button>
    <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
</body>
</html>
