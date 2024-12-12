<?php
$host = "localhost";  
$usuario = "root";    
$pass = "";          
$baseDeDatos = "schedl"; 

// Crear la conexión
$conn = new mysqli($host, $usuario, $pass, $baseDeDatos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
