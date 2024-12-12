let movimientos = [];
const tablaMovimientos = document.getElementById("tablaMovimientos");
const saldoElement = document.getElementById("saldo");

//Función que sirve para agregar los datos del usuario
function agregarMovimiento() {
    const tipo = document.getElementById("tipo").value;
    const descripcion = document.getElementById("descripcion").value.trim();
    const categoria = document.getElementById("categoria").value.trim();
    const monto = parseFloat(document.getElementById("monto").value);
    const fecha = document.getElementById("fecha").value;

    if (!descripcion || !categoria || isNaN(monto) || !fecha) {
        alert("Por favor, completa todos los campos correctamente.");
        return;
    }

    const movimiento = { tipo, descripcion, categoria, monto, fecha };
    movimientos.push(movimiento);
    actualizarTabla();
    calcularSaldo();

    //Limpia los campos para así entre nuevos datos
    document.getElementById("descripcion").value = "";
    document.getElementById("categoria").value = "";
    document.getElementById("monto").value = "";
    document.getElementById("fecha").value = "";
}

//Función que actualiza la tabla tanto al añadir como al eliminar
function actualizarTabla() {
    tablaMovimientos.innerHTML = "";

    movimientos.forEach((movimiento, index) => {
        const fila = document.createElement("tr");
        fila.classList.add(movimiento.tipo);

        fila.innerHTML = `
            <td><button class="eliminar" onclick="eliminarMovimiento(${index})">X</button></td>
            <td>${movimiento.tipo}</td>
            <td>${movimiento.descripcion}</td>
            <td>${movimiento.categoria}</td>
            <td>${movimiento.monto.toFixed(2)} €</td>
            <td>${movimiento.fecha}</td>
        `;

        tablaMovimientos.appendChild(fila);
    });
}

//Función que se apoya en actualizar tabla para eliminar el movimiento seleccionado
function eliminarMovimiento(index) {
    movimientos.splice(index, 1);
    actualizarTabla();
    calcularSaldo();
}

//Función que calcula la diferencia entre los ingresos y los gastos
function calcularSaldo() {
    let saldo = 0;

    movimientos.forEach(movimiento => {
        saldo += movimiento.tipo === "ingreso" ? movimiento.monto : -movimiento.monto;
    });

    saldoElement.textContent = `${saldo.toFixed(2)} €`;
    saldoElement.className = saldo >= 0 ? "saldo saldo-positivo" : "saldo saldo-negativo";
}
