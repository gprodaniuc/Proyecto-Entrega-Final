<?php
// <!-- conexion a la base de datos -->
$host = 'localhost';
$db = 'calendario';
$user = 'root'; // Usuario por defecto en XAMPP
$password = ''; // Contraseña vacía por defecto en XAMPP

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}
?>
