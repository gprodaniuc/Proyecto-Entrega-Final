<?php
include 'conexionBD.php'; // Incluir la conexión a la base de datos

// Obtener los datos de la base de datos
$sql = "SELECT * FROM movimientos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Financiación</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Gestión de Financiación</h1>

    <!--Formulario  -->
    <div class="container">
        <form method="POST" action="agregarMovimiento.php">
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo">
                <option value="ingreso">Ingreso</option>
                <option value="gasto">Gasto</option>
            </select>

            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" placeholder="Ej. Sueldo, Comida">

            <label for="categoria">Categoría:</label>
            <input type="text" id="categoria" name="categoria" placeholder="Ej. Trabajo, Alimentación">

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha">

            <label for="monto">Monto:</label>
            <input type="number" id="monto" name="monto">

            <button type="submit">Agregar Movimiento</button>
        </form>
    </div>

    <!--Tabla donde aparecen los datos introducidos -->
    <table>
        <thead>
            <tr>
                <th>Eliminar</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Fecha</th>
                <th>Monto (€)</th>
            </tr>
        </thead>
        <tbody id="tablaMovimientos">
            <?php
            // Mostrar los movimientos de la base de datos
            while ($row = $resultado->fetch_assoc()) {
                $monto = $row['monto'];
                $monto_formateado = number_format(abs($monto), 2, ',', '.');  // Formatear monto a 2 decimales, separado por coma

                // Si es un gasto, que sea negativo
                if ($monto < 0) {
                    $monto_formateado = "- " . $monto_formateado;
                }

                // Mostrar la fila de la tabla
                echo "<tr>";
                echo "<td><form method='POST' action='eliminarMovimiento.php'>
                        <button type='submit' name='id' value='" . $row['id'] . "' class='eliminar'>X</button>
                      </form></td>";
                echo "<td>" . ucfirst($row['tipo']) . "</td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "<td>" . $row['categoria'] . "</td>";
                echo "<td>" . $row['fecha'] . "</td>";
                echo "<td>" . $monto_formateado . " €</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Saldo:</td>
                <td id="saldo" class="saldo">
                    <?php
                    // Calcular y mostrar el saldo
                    $sqlSaldo = "SELECT SUM(monto) AS saldo FROM movimientos WHERE tipo = 'ingreso'";
                    $resultSaldo = $conn->query($sqlSaldo);
                    $rowSaldo = $resultSaldo->fetch_assoc();
                    $ingresos = $rowSaldo['saldo'];

                    $sqlGasto = "SELECT SUM(monto) AS saldo FROM movimientos WHERE tipo = 'gasto'";
                    $resultGasto = $conn->query($sqlGasto);
                    $rowGasto = $resultGasto->fetch_assoc();
                    $gastos = $rowGasto['saldo'];

                    $saldo = $ingresos + $gastos; // Los gastos como negativos
                    echo number_format($saldo, 2, ',', '.') . " €";
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>

    <script src="scriptsFinanciacion.js"></script>
</body>
</html>

<?php
$conn->close(); // Cerrar la conexión
?>
