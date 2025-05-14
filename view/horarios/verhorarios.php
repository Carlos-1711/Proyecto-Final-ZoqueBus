<?php
session_start();

// Datos del usuario (ya logueado)
$nombre = $_SESSION['nombre'] ?? '';
$correo = $_SESSION['correo'] ?? '';

// IDs recibidos por GET
$origen_id = $_GET['origen'] ?? null;
$destino_id = $_GET['destino'] ?? null;

$origen_nombre = '';
$destino_nombre = '';

if ($origen_id && $destino_id) {
    include 'conexion.php'; // Asegúrate de que este archivo se conecte correctamente

    // Obtener nombre de ciudad origen
    $stmt = $pdo->prepare("SELECT nombre_ciudad FROM terminales WHERE id_terminal = ?");
    $stmt->execute([$origen_id]);
    $origen_nombre = $stmt->fetchColumn();

    // Obtener nombre de ciudad destino
    $stmt->execute([$destino_id]);
    $destino_nombre = $stmt->fetchColumn();
}
?><?php require("view/layout/header2.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Resultados de Viajes - ZoqueBus</title>
  <link rel="stylesheet" href="view/css/horarios.css" />
</head>
<body>
  <header class="header-horarios">
    <h1>Horarios y precios</h1>
  </header>

  <div class="pagina-horarios">
    <main class="contenedor">
      <section class="resultados">

        <!-- VIAJE 1 -->
        <div class="viaje">
          <img src="view/img/bannerzoquebus.png" alt="ZoqueBus Logo" class="logo" />
          <div class="info">
            <div class="detalle">
              <div class="horario">06:00 - 07:00</div>
              <div class="ruta">Desde Tuxtla Gutiérrez a <strong>Chiapa de Corzo</strong></div>
            </div>
            <button class="precio-btn">$120 MXN</button>
          </div>
        </div>

        <!-- VIAJE 2 -->
        <div class="viaje">
          <img src="view/img/bannerzoquebus.png" alt="ZoqueBus Logo" class="logo" />
          <div class="info">
            <div class="detalle">
              <div class="horario">08:00 - 10:30</div>
              <div class="ruta">Desde Tuxtla Gutiérrez a <strong>San Cristóbal de las Casas</strong></div>
            </div>
            <button class="precio-btn">$180 MXN</button>
          </div>
        </div>

      </section>

      <aside class="informacion">
        <h3>01 Pasajero</h3>
        <p>Boletos de autobús de Tuxtla Gutiérrez a destinos de Chiapas</p>
        <p><strong>12 de Mayo</strong></p>
        <form action="index.php?r=asientos" method="post" id="formularioViaje">
          <input type="hidden" name="precio" value="" id="precioInput">
          <button type="submit" class="editar">Continuar</button>
        </form>
        <p>01 Adulto(s) <strong id="precio-seleccionado">$</strong></p>
      </aside>
    </main>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const botonesPrecio = document.querySelectorAll(".precio-btn");
      const precioSeleccionado = document.getElementById("precio-seleccionado");
      const precioInput = document.getElementById("precioInput");
      const formulario = document.getElementById("formularioViaje");

      botonesPrecio.forEach(boton => {
        boton.addEventListener("click", () => {
          const texto = boton.textContent.trim();
          const precioLimpio = texto.replace('$', '').replace('MXN', '').trim();
          const precioConIva = parseFloat(precioLimpio).toFixed(2); // sin aplicar IVA aquí
            precioSeleccionado.textContent = `$${(precioLimpio * 1.16).toFixed(2)} MXN`; // solo mostrarlo con IVA
            precioInput.value = precioConIva; // enviar el precio base

          
          precioSeleccionado.textContent = `$${precioConIva} MXN`;
          precioInput.value = precioConIva;
        });
      });

      formulario.addEventListener("submit", (e) => {
        if (!precioInput.value || isNaN(precioInput.value)) {
          e.preventDefault();
          alert("Por favor, selecciona un viaje antes de continuar.");
        }
      });
    });
  </script>
</body>
</html>
<?php require("view/layout/footer.php"); ?>