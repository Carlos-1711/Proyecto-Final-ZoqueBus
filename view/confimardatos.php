<?php require("view/layout/header2.php"); ?>
<?php
$asiento = $_POST['asiento'] ?? 'No seleccionado';
$precio = $_POST['precio'] ?? '0.00';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/confirmardatos.css">
    <title>Document</title>
</head>
<body>


<div class="container" id="pasajeroForm">
    <div class="row">
    <div class="form-group" style="max-width: 200px;">
        <div class="passenger-info">Pasajero 01</div>
        <div class="side-info">Adulto, Asiento <?php echo htmlspecialchars($asiento); ?> </div>
    </div>
    <div class="form-group">
        <label>Nombre(s)*</label>
        <input type="text" id="nombre" placeholder="NOMBRE DEL PASAJERO" oninput="validarFormulario()">
    </div>
    <div class="form-group">
        <label>Apellido(s)</label>
        <input type="text" id="apellido" placeholder="APELLIDO DEL PASAJERO" oninput="validarFormulario()">
    </div>
    <div class="clear-link" onclick="limpiarPasajero()">Limpiar</div>
    </div>
</div>

<div class="container" id="correoForm">
    <div class="row">
    <div class="form-group">
        <label>Enviar boletos a*</label>
        <input type="email" id="correo" placeholder="ESCRIBE EL CORREO ELECTRÓNICO" oninput="validarFormulario()">
    </div>
    <div class="form-group">
        <label>Confirma el envío de boletos a*</label>
        <input type="email" id="correoConfirm" placeholder="CONFIRMA EL CORREO ELECTRÓNICO" oninput="validarFormulario()">
    </div>
    <div class="clear-link" onclick="limpiarCorreo()">Limpiar</div>
</div>

<div class="checkbox-group">
    <input type="checkbox" id="termsCheckbox" onchange="validarFormulario()" disabled>
    <label for="termsCheckbox">De acuerdo con el <strong>Términos y Condiciones</strong>, así como el <strong>Aviso de Privacidad</strong>.</label>
</div>
<form action="index.php?r=tipopago" method="post" id="formularioViaje">
    <button id="continueBtn" disabled>Continuar</button>

</form>
</div>


<script>
    const nombre = document.getElementById('nombre');
    const apellido = document.getElementById('apellido');
    const correo = document.getElementById('correo');
    const correoConfirm = document.getElementById('correoConfirm');
    const termsCheckbox = document.getElementById('termsCheckbox');
    const continueBtn = document.getElementById('continueBtn');

function limpiarPasajero() {
    nombre.value = '';
    apellido.value = '';
    validarFormulario();
}

    function limpiarCorreo() {
    correo.value = '';
    correoConfirm.value = '';
    validarFormulario();
}

    function validarFormulario() {
    const nombreVal = nombre.value.trim();
    const apellidoVal = apellido.value.trim();
    const correoVal = correo.value.trim();
    const correoConfirmVal = correoConfirm.value.trim();

    const correosIguales = correoVal !== '' && correoVal === correoConfirmVal;
    const camposCompletos = nombreVal && apellidoVal && correoVal && correoConfirmVal && correosIguales;

      // Activar el checkbox solo si los campos están completos y correos coinciden
    termsCheckbox.disabled = !camposCompletos;

      // Activar botón "Continuar" solo si checkbox está marcado y todo es válido
    if (camposCompletos && termsCheckbox.checked) {
        continueBtn.disabled = false;
    } else {
        continueBtn.disabled = true;
    }
    }
</script>
</body>
</html>
<?php require("layout/footer.php");?>