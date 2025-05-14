<?php require("layout/header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="view/css/style.css">
    <title>Inicio</title>
</head>
<body>

<section class="busqueda">
    <form class="formulario-viaje">
        <div class="campo">
            <label>Origen</label>
            <select name="origen" required>
                <option value="">Seleccionar origen</option>
                <?php foreach ($terminales as $terminal): ?>
                    <option value="<?= $terminal['id_terminal']; ?>"><?= $terminal['nombre_ciudad']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="campo">
            <label>Destino</label>
            <select name="destino" required>
                <option value="">Seleccionar destino</option>
                <?php foreach ($terminales as $terminal): ?>
                    <option value="<?= $terminal['id_terminal']; ?>"><?= $terminal['nombre_ciudad']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="campo">
            <label for="fecha_hora_salida">Fecha y hora de salida:</label>
            <input type="text" id="fecha_hora_salida" name="fecha_hora_salida" placeholder="Selecciona fecha y hora" required>
        </div>
        <div style="text-align: center; margin-top: 20px;">
                <button class="boton-reserva">
                <a class="nav-link" href="index.php?r=reservaciones">Buscar Viajes</a>
                </button>
            </a>
        </div>
    </form>
</section>

<!-- ¿Por qué viajar con nosotros? -->
<section class="ventajas">
    <h2>¿Por qué viajar con nosotros?</h2>
    <p>En ZOQUEBUS, nos apasiona ofrecerte la mejor experiencia de viaje...</p>
    <div class="beneficios">
        <div class="beneficio">
            <h3>Comodidad y Confort</h3>
            <p>Nuestros autobuses están equipados con asientos amplios...</p>
        </div>
        <div class="beneficio">
            <h3>Seguridad</h3>
            <p>La seguridad de nuestros pasajeros es nuestra prioridad...</p>
        </div>
        <div class="beneficio">
            <h3>Precio Accesible</h3>
            <p>Ofrecemos tarifas competitivas adaptadas a tu presupuesto...</p>
        </div>
        <div class="beneficio">
            <h3>Rutas Seguras</h3>
            <p>Con una amplia red de destinos llegamos a los lugares que más te interesan...</p>
        </div>
        <div class="beneficio">
            <h3>Puntualidad</h3>
            <p>Sabemos que tu tiempo es valioso...</p>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr("#fecha_hora_salida", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        minDate: "today"
    });
</script>
</body>
</html>
<?php require("layout/footer.php");?>