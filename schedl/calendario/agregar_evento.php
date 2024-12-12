<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha = $_POST['fecha'];
    $tarea = $_POST['tarea'];

    try {
        $query = $conn->prepare("INSERT INTO eventos (fecha, tarea) VALUES (:fecha, :tarea)");
        $query->bindParam(':fecha', $fecha);
        $query->bindParam(':tarea', $tarea);
        $query->execute();

        // Redirigir a la página principal después de agregar
        header("Location: obtener_eventos.php");
        exit();
    } catch (Exception $e) {
        error_log("Error al insertar el evento: " . $e->getMessage());
        echo "Ocurrió un error al agregar el evento.";
    }

    // Cerrar la conexión
    $conn = null;
}
?>
