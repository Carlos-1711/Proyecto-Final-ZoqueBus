<?php require("view/layout/header2.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/contactos.css">
    <title>Contacto</title>
</head>
<body>
    <section class="contacto-contenedor">
        <h1>Contáctanos</h1>
        <p class="intro">¿Tienes dudas, comentarios o sugerencias? ¡Nos encantaría escucharte!</p>
        
        <div class="formulario-contacto">
            <form action="#" method="POST">
                <input type="text" name="nombre" placeholder="Tu nombre completo" required>
                <input type="email" name="email" placeholder="Tu correo electrónico" required>
                <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..." rows="6" required></textarea>
                <button type="submit">Enviar Mensaje</button>
            </form>
        </div>

        <div class="info-contacto">
            <h2>También puedes contactarnos:</h2>
            <ul>
                <li><strong>Teléfono:</strong> 961-306-7770</li>
                <li><strong>Email:</strong> zoquebus1@gmail.com</li>
                <li><strong>Dirección:</strong> Blvd. Belisario Domínguez, Tuxtla Gutiérrez, Chiapas</li>
            </ul>
        </div>
    </section>
</body>
</html>
<?php require("view/layout/footer.php");?>