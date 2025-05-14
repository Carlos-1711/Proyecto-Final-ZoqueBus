<?php
session_start();
include 'conexion.php';

$origen_id = $_GET['origen'] ?? null;
$destino_id = $_GET['destino'] ?? null;
$fecha_salida = $_GET['fecha_salida'] ?? null;

if (!$origen_id || !$destino_id || !$fecha_salida) {
    echo "Faltan datos para buscar viajes.";
    exit;
}

// Separar fecha y hora para buscar coincidencias más flexibles si lo deseas
$fecha = date('Y-m-d', strtotime($fecha_salida));
$hora = date('H:i:s', strtotime($fecha_salida));

// Consulta de viajes
$stmt = $pdo->prepare("
    SELECT v.id_viaje, t1.nombre_ciudad AS origen, t2.nombre_ciudad AS destino,
           v.fecha_salida, h.hora_salida, v.precio
    FROM viajes v
    JOIN rutas r ON v.id_ruta = r.id_ruta
    JOIN terminales t1 ON r.id_origen = t1.id_terminal
    JOIN terminales t2 ON r.id_destino = t2.id_terminal
    JOIN horarios h ON v.id_horario = h.id_horario
    WHERE r.id_origen = ? AND r.id_destino = ? AND v.fecha_salida = ?
");
$stmt->execute([$origen_id, $destino_id, $fecha]);

$viajes = $stmt->fetchAll();

?>
<?php require("layout/header.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/viajes.css">
    <title>Viajes Disponibles</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>

<div class="container">
    <?php
    if ($viajes) {
        echo "<h2>Viajes Disponibles</h2>";
        echo "<table class='viajes'>
                <tr>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Precio</th>
                    <th>Acción</th>
                </tr>";
        foreach ($viajes as $viaje) {
            echo "<tr>
                    <td>{$viaje['origen']}</td>
                    <td>{$viaje['destino']}</td>
                    <td>{$viaje['fecha_salida']}</td>
                    <td>{$viaje['hora_salida']}</td>
                    <td>\${$viaje['precio']}</td>
                    <td><a class='btn' href='reservar.php?id_viaje={$viaje['id_viaje']}'>Seleccionar</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay viajes disponibles para esos datos.</p>";
    }
    ?>
</div>
</body>
</html>
<?php require("layout/footer.php");?>