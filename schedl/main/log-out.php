<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar sesión</title>
</head>
<body>
    <?php
        session_unset();
        session_destroy();
        header("Location: login.php");
    ?>
</body>
</html>