<?php require("layout/header2.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Pagar Boletos — ADO</title>
  <link rel="stylesheet" href="view/css/metodopago.css">
  <script src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
  <script>
    (function() {
      emailjs.init("manXYOUNCwnAxuCZ9");
    })();
  </script>
</head>
<body class="pago-body">
  <header class="pago-header">
    Pago de Boletos
  </header>

  <div class="pago-container">
    <!-- Formulario de pago -->
    <div class="pago-formulario">
      <h2>Información de Pago</h2>

      <div class="pago-logos">
        <img src="view/img/metodopago/visa.jpg" alt="Visa">
        <img src="view/img/metodopago/mastercard.jpg" alt="Mastercard">
        <img src="view/img/metodopago/americaexpress.jpg" alt="American Express">
      </div>

      <form id="formulario">
        <label for="to_email">Correo electrónico</label>
        <input type="email" name="to_email" id="to_email" required>

        <label for="card-name">Nombre en la tarjeta</label>
        <input type="text" name="card_name" id="card-name" required>

        <label for="card-number">Número de tarjeta</label>
        <input type="text" name="card_number" id="card-number" required>

        <label for="expiry">Fecha de expiración</label>
        <input type="text" name="expiry" id="expiry" placeholder="MM/AA" required>

        <label for="cvv">CVV</label>
        <input type="text" name="cvv" id="cvv" placeholder="123" required>

        <button type="submit" class="pago-btn">Pagar</button>
      </form>
      <p id="mensaje"></p>
    </div>

    <!-- Resumen del viaje -->
    <div class="pago-resumen">
      <h2>Resumen del Viaje</h2>
      <p>Fecha: 15/05/2025</p>
      <p>Pasajeros: 1 adulto</p>
      <p class="pago-total">Total: $208.80 MXN</p>
    </div>
  </div>

  <script src="js/script.js">
    document.getElementById("formulario").addEventListener("submit", function(e) {
      e.preventDefault();
      emailjs.send("service_qwmgznc", "template_3vv65id", {
        to_email: document.getElementById("to_email").value,
        nombre: document.getElementById("card-name").value
      })
      .then(function(response) {
        document.getElementById("mensaje").innerText = "✅ Tus boletos fueron comprados con éxito. Se enviarán a: " + document.getElementById("to_email").value;
      }, function(error) {
        document.getElementById("mensaje").innerText = "❌ Error al enviar el correo.";
        console.error(error);
      });

      this.reset();
    });
  </script>
</body>
</html>
<?php require("layout/footer.php");?>
