

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'includes/landing-header.php'?> 
 <div class="hero">
    <div class="overlay"></div>
    <div class="herotext">
        <h1>Bienvenido a Anacardo.com</h1>
        <p>La vida organizada es la vida facil</p>
    </div>
 </div>

<div class="contenedor">
    <div class="izquierda">
        <h2 class="titCal">Nuestro Calendario</h2>
        <p class="contentCal">Organiza tus días de forma eficiente con nuestro calendario intuitivo.
            Programa tus citas, establece recordatorios importantes y mantén el control de tu agenda con facilidad.
            Diseñado para ayudarte a visualizar y gestionar tu tiempo, 
            este apartado es tu aliado para maximizar tu productividad.
            </p>
    </div>
    <div class="derecha">
        <h2 class="titFinanzas">Finanzas</h2>
        <p class="contentFin">Lleva tus finanzas al siguiente nivel con nuestra herramienta de gestión personalizada.
             Registra tus ingresos y gastos, analiza tus hábitos de consumo y fija metas financieras.
             Todo esto en una interfaz amigable que te ayuda a alcanzar el control total de tu economía.</p>
    </div>
</div>

<div class="nosotros">
    <h2 class="snTit">Sobre nosotros</h2>
    <p class="snContent">Somos un equipo apasionado por la organización y el bienestar financiero. 
        Nuestra misión es ayudarte a simplificar tu vida, brindándote herramientas prácticas para gestionar tu tiempo y tus finanzas. Creemos en el poder de la tecnología para empoderar a las personas y crear un equilibrio entre productividad y tranquilidad.
        Juntos, trabajamos para ofrecerte soluciones innovadoras y fáciles de usar,
        hechas pensando en ti.?</p>
</div>


<?php include 'includes/footer.php'?> 
</body>
</html>

<style>
*{
    font-family: Arial, Helvetica, sans-serif;
    color: white;
    margin: 0;
    padding: 0;
}

.hero {
    position: relative;
    height: 30vh; 
    background: url('imagenes/hero.jpg') no-repeat center center/cover;
    display: flex;
    justify-content: center;
    align-items: center;

    text-align: center;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); 
    z-index: 1;
}

.herotext {
    position: relative;
    z-index: 2; 
}




h1 {
    font-size: 3rem;
    margin: 0;
}

p {
    font-size: 1.5rem;
    margin: 10px 0 0;
}

.contenedor {
  display: flex;
  width: 100%;
  height: 50vh; 
}

.izquierda, .derecha {
  flex: 1; 
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 20px;
  padding: 20px;

  
}

.titCal, .titFinanzas{
  background-color: #5cbf82;
  padding: 15px;
  color: white; 
  border-radius: 5px; 
}


.contentCal,.contentFin{
color: black;
font-size: 22px;
line-height: 1.5;
border: 2px solid #5cbf82;
padding: 10%;
}

.nosotros{
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 50vh;
    align-items: center;
    text-align: center;
    justify-content: center;
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.73)), url("imagenes/background.jpg");
    background-size: cover;
}

.snTit{
  background-color: #5cbf82;
  padding: 15px;
  color: white;
  margin-bottom: 35px;
  border-radius: 5px; 
  font-size: 30px;
}

.snContent{
    margin-left: 10%;
    margin-right: 10%;
    color: white;
    line-height: 1.5;
}
</style>