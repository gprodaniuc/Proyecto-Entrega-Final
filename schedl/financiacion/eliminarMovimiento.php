<?php
include 'conexionBD.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Eliminar  movimiento de la base de datos
    $sql = "DELETE FROM movimientos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Movimiento eliminado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Redirigir
    header("Location: index.php");
}


$conn->close();
?>
