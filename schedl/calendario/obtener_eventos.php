<?php
// Incluir la conexión a la base de datos
include 'conexion.php';

// Obtener los eventos de la base de datos
try {
    $query = $conn->prepare("SELECT fecha, tarea FROM eventos ORDER BY fecha DESC");
    $query->execute();
    $eventos = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $eventos = [];
    echo "Error al obtener los eventos: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Contenedor principal */
        #contenedor-principal {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
            gap: 20px; /* Espaciado entre secciones */
        }

        /* Contenedor horizontal para formulario y calendario */
        #contenedor-horizontal {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: flex-start;
            gap: 20px; /* Espaciado entre el formulario y el calendario */
            width: 100%;
            max-width: 1200px;
        }

        /* Formulario */
        #formulario-eventos {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 350px;
    display: flex;
    flex-direction: column;
    align-items: stretch;
    font-family: Arial, sans-serif;
}

/* Título del formulario */
#formulario-eventos h2 {
    text-align: center;
    color: #333;
    font-size: 1.5em;
    margin-bottom: 15px;
}

/* Etiquetas del formulario */
#formulario-eventos label {
    font-weight: bold;
    color: #555;
    margin-bottom: 5px;
}

/* Campos del formulario */
#formulario-eventos input {
    width: 100%;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
}

/* Botón del formulario */
#formulario-eventos button {
    background-color: #8ac187;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    text-transform: uppercase;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

#formulario-eventos button:hover {
    background-color: #76a374;
}

/* Formulario completo */
#formulario-eventos form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

        /* Calendario */
        #calendario {
            background-color: white;
            border: 1px solid #9e9e9e;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
        }

        /* Lista de próximos eventos */
        .eventos-lista {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
            text-align: center;
        }

        .eventos-lista {
            background-color: #f9f9f9;
            padding: 20px;
            margin-top: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .eventos-lista h2 {
            text-align: center;
            font-size: 1.6em;
            color: #333;
        }

        #eventos-ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #eventos-ul li {
            background-color: #fff;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #eventos-ul li strong {
            color: #333;
        }

        #eventos-ul li span {
            color: #555;
        }

        #eventos-ul li:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
<div id="contenedor-principal">
    <!-- Formulario y Calendario -->
    <div id="contenedor-horizontal">
        <div id="formulario-eventos">
            <h2>Agregar Evento</h2>
            <form action="agregar_evento.php" method="POST">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required>

                <label for="tarea">Evento:</label>
                <input type="text" id="tarea" name="tarea" required placeholder="Descripción del evento">

                <button type="submit">Agregar</button>
            </form>
        </div>

        <div id="calendario">
            <div id="header-calendario">
                <button id="prev">&lt;</button>
                <div id="mes-anio"></div>
                <button id="next">&gt;</button>
            </div>
            <table id="dias-semana">
                <tr>
                    <th>Dom</th>
                    <th>Lun</th>
                    <th>Mar</th>
                    <th>Mié</th>
                    <th>Jue</th>
                    <th>Vie</th>
                    <th>Sáb</th>
                </tr>
            </table>
            <table id="dias">
                <!-- Se generarán las celdas de los días -->
            </table>
        </div>
    </div>

    <!-- Próximos eventos -->
    <div class="eventos-lista">
        <h2>Próximos eventos</h2>
        <ul id="eventos-ul">
            <?php
            // Si existen eventos, se agregan a la lista en el HTML
            if (count($eventos) > 0) {
                foreach ($eventos as $evento) {
                    echo "<li><strong>{$evento['fecha']}</strong>: <span>{$evento['tarea']}</span></li>";
                }
            } else {
                echo "<li>No hay eventos disponibles.</li>";
            }
            ?>
        </ul>
    </div>
</div>



    <script src="script.js"></script>
</body>
</html>

<?php
    $conn = null;
?>
