<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    section {
        max-width: 1200px;
        width: 90%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .carousel-item {
      padding: 30px;
    }
    .titulo-seccion {
      background-color: #600000;
      color: white;
      padding: 10px;
      text-align: center;
      font-weight: bold;
      text-transform: uppercase;
    }
    .caja-texto {
      background: white;
      border-radius: 10px;
      padding: 20px;
      margin-top: 15px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .caja-texto h4 {
      background: #600000;
      color: white;
      padding: 5px 10px;
      margin-bottom: 10px;
      text-align: center;
      border-radius: 5px;
    }
  </style>
</head>
<body>

<div id="carouselSecciones" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
  <div class="carousel-inner">

    <!-- Slide 1: Universidad -->
    <div class="carousel-item active">
      <div class="titulo-seccion">Universidad Técnica de Ambato</div>
      <div class="caja-texto">
        <h4>Misión</h4>
        <p>Formar profesionales líderes competentes, con visión humanista y pensamiento crítico a través de la Docencia, la Investigación y la Vinculación, que apliquen, promuevan y difundan el conocimiento respondiendo a las necesidades del país.</p>
        <h4>Visión</h4>
        <p>La Universidad Técnica de Ambato por sus niveles de excelencia se constituirá como un centro de formación superior con liderazgo y proyección nacional e internacional.</p>
      </div>
      <img src="https://csei.uta.edu.ec/csei2021/images/galeria-uta/facultad1.jpg" class="d-block w-100 rounded mt-3" alt="UTA Facultad">
    </div>

    <!-- Slide 2: Carrera -->
    <div class="carousel-item">
      <div class="titulo-seccion">Carrera de Ingeniería en Software</div>
      <div class="caja-texto">
        <h4>Misión</h4>
        <p>Formar profesionales líderes competentes, con visión humanista y pensamiento crítico, a través de la Docencia, la Investigación y la Vinculación, que apliquen, promuevan y difundan el conocimiento respondiendo a las necesidades del país.</p>
        <h4>Visión</h4>
        <p>La carrera de Software de la Facultad de Ingeniería en Sistemas, Electrónica e Industrial de la Universidad Técnica de Ambato por sus niveles de excelencia, se constituirá como un centro de formación superior con liderazgo y proyección nacional e internacional.</p>
      </div>
      <img src="https://www.um.es/documents/1083928/40713896/ingenieria-software.jpg/ed5b47c2-e299-94d9-a01f-f5c5ff6d3144?t=1687936125102" class="d-block w-100 rounded mt-3" alt="Ingeniería en Software">
    </div>

    <!-- Slide 3: Computación Visual -->
    <div class="carousel-item">
      <div class="titulo-seccion">Computación Visual</div>
      <div class="caja-texto">
        <h4>Objetivos</h4>
        <ul>
          <li>Interpretar imágenes y comprender escenas visuales.</li>
          <li>Procesar datos visuales: mejorar y transformar imágenes.</li>
          <li>Reconocer patrones y clasificar objetos.</li>
          <li>Automatizar tareas como inspecciones visuales.</li>
          <li>Facilitar la interacción hombre-máquina mediante sistemas visuales.</li>
        </ul>
        <h4>Aplicaciones</h4>
        <ul>
          <li><strong>Seguridad:</strong> reconocimiento facial y vigilancia.</li>
          <li><strong>Medicina:</strong> análisis de imágenes médicas y diagnósticos.</li>
          <li><strong>Automotriz:</strong> conducción autónoma y reconocimiento de señales.</li>
          <li><strong>Comercio:</strong> identificación de productos y análisis de clientes.</li>
          <li><strong>Agricultura:</strong> monitoreo de cultivos con drones.</li>
          <li><strong>Industria:</strong> control de calidad automatizado.</li>
          <li><strong>Entretenimiento:</strong> realidad virtual y juegos interactivos.</li>
          <li><strong>Robótica:</strong> visión para robots autónomos.</li>
          <li><strong>Ciencias:</strong> análisis de imágenes satelitales y telescópicas.</li>
        </ul>
      </div>
      <img src="https://www.automaticaeinstrumentacion.com/images/showid2/6964624?w=900&mh=700" class="d-block w-100 rounded mt-3" alt="Computación Visual">
    </div>

  </div>

  <!-- Controles -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselSecciones" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselSecciones" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
