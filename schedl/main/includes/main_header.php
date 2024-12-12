<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul class="listaNav">
            <a href="main.php">
                <img src="imagenes/1.png" alt="logo" class="logo">
            </a>
            <a href="log-out.php" class="a1_main">Cerrar sesión</a>
            <a href="modify-user.php" class='a2_main'>Modificar usuario</a>
        </ul>
    </nav>
</body>
</html>

<style>
    nav{
        background-color: #5cbf82;
    }
    .listaNav{
        display:inline;   
    }
    .logo{
        margin-left: 120px;
        margin-top: 5px;
        width: 120px;
        height: 150px;
    }

    .a1_main, .a2_main{
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        text-decoration: none;
        font-size: 1.3vw;
        float: right;
        margin-top: 50px;
    }

    .a1_main{
        margin-right: 120px;
        background-color: #2a8241;
        padding: 10px 10px 10px 10px;
        border-radius: 5px;
    }

    .a2_main{
        margin-right: 20px;
        background-color: white;
        color: #5cbf82;
        padding: 10px 10px 10px 10px;
        border-radius: 5px;

    }
    .a1_main:hover, .a2_main:hover {
        transform: scale(1.1);
    }
</style>