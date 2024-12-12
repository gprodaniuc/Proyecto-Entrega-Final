// Cargar el DOM
document.addEventListener('DOMContentLoaded', function () {
    cargarEventos();
});

console.log('Hola');

const diasElem = document.getElementById('dias');
const mesAnioElem = document.getElementById('mes-anio');
const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');
const eventosUl = document.getElementById('eventos-ul'); // Lista de eventos

// Obtención de la fecha actual
let fecha = new Date();
let mesActual = fecha.getMonth();
let anioActual = fecha.getFullYear();

const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

// Función para generar el calendario
function generarCalendario(mes, anio) {
    diasElem.innerHTML = ''; // Limpiar contenido previo
    mesAnioElem.innerHTML = `${meses[mes]} ${anio}`;
    const primerDiaMes = new Date(anio, mes, 1).getDay();
    const diasEnMes = new Date(anio, mes + 1, 0).getDate();

    let dia = 1;
    for (let semana = 0; semana < 6; semana++) {
        const fila = document.createElement('tr');
        for (let i = 0; i < 7; i++) {
            const celda = document.createElement('td');
            if (semana === 0 && i < primerDiaMes || dia > diasEnMes) {
                celda.classList.add('vacio');
            } else {
                celda.innerHTML = dia;
                dia++;
            }
            fila.appendChild(celda);
        }
        diasElem.appendChild(fila);
        if (dia > diasEnMes) break;
    }
}

// Funciones de navegación entre meses
prevBtn.addEventListener('click', () => {
    mesActual--;
    if (mesActual < 0) {
        mesActual = 11;
        anioActual--;
    }
    generarCalendario(mesActual, anioActual);
});

nextBtn.addEventListener('click', () => {
    mesActual++;
    if (mesActual > 11) {
        mesActual = 0;
        anioActual++;
    }
    generarCalendario(mesActual, anioActual);
});



