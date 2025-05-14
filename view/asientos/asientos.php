<?php
$precio = $_POST['precio'] ?? '0';
$precio = floatval($precio);
$iva = round($precio * 0.16, 2);
$subtotal = round($precio, 2);
$total = $subtotal + $iva;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ZoqueBus - Selección de Asientos</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="view/css/asientos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>
  <header>
  <h1>ZoqueBus</h1>
  
</header>

  <main>
    <section class="contenedor">
      <div class="seccion-asientos">
        <div class="info-pasajero">
          <span>Pasajero 01 - Adulto</span>
          <span class="precio"><?php echo htmlspecialchars($precio); ?> MXN</span>
          <span class="quedan">Quedan 07 asientos</span>
        </div>

        <div class="bus">
          <div class="fila">
            <button class="asiento" title="03"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="06"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="09"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="12"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="15"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="18"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="21"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="24"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="27"><i class="fas fa-chair"></i></button>
          </div>
          <div class="fila">
            <button class="asiento" title="02"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="05"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="08"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="11"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="14"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="17"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="20"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="23"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="26"><i class="fas fa-chair"></i></button>
          </div>
          <div class="fila">
            <button class="asiento ocupado" title="01"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="04"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="07"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="10"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="13"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="16"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="19"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="22"><i class="fas fa-chair"></i></button>
            <button class="asiento" title="25"><i class="fas fa-chair"></i></button>
          </div>
        </div>

        <div class="leyenda">
          <div><span class="cuadro seleccionado"></span> Seleccionado</div>
          <div><span class="cuadro ocupado"></span> Ocupado</div>
          <div><span class="cuadro disponible"></span> Disponible</div>
        </div>
      </div>

      <aside class="resumen">
        <h3>Viaje de ida</h3>
        <p>11 Mayo 25 - 23:35 h</p>
        <p>Origen: Tuxtla Gutiérrez </p>
        <p>Destino: San Cristóbal</p>
        <hr>
        <p>01 Adulto(s): <strong>$<?php echo number_format($subtotal, 2); ?></strong></p>
        <p>IVA: $<?php echo number_format($iva, 2); ?></p>
        <h4>Total: <strong>$<?php echo number_format($total, 2); ?> MXN</strong></h4>

        <form action="index.php?r=pagos" method="post" id="formularioPago">
          <input type="hidden" name="precio" value="<?php echo htmlspecialchars($total); ?>">
          <input type="hidden" name="asiento" id="asientoSeleccionado" required>
          <button type="submit" class="continuar">Continuar</button>
        </form>
      </aside>
    </section>
  </main>

  <script>
  document.addEventListener("DOMContentLoaded", () => {
    const botonesAsiento = document.querySelectorAll(".asiento:not(.ocupado)");
    const inputAsiento = document.getElementById("asientoSeleccionado");

    botonesAsiento.forEach(boton => {
      boton.addEventListener("click", () => {
        botonesAsiento.forEach(b => b.classList.remove("seleccionado")); // Limpiar selección previa
        boton.classList.add("seleccionado");

        const numeroAsiento = boton.getAttribute("title");
        inputAsiento.value = numeroAsiento;
      });
    });

    document.getElementById("formularioPago").addEventListener("submit", function(e) {
      if (!inputAsiento.value) {
        e.preventDefault();
        alert("Por favor, selecciona un asiento antes de continuar.");
      }
    });
  });
  </script>
</body>
</html>
