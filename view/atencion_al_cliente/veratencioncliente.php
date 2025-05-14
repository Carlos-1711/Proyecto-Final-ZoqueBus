<?php require("view/layout/header2.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atención al Cliente</title>
    <link rel="stylesheet" href="view/css/atencioncliente.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
<section class="atencion-container animate_animated animate_fadeIn">
    <h1 class="atencion-title">Atención al Cliente</h1>
    <p class="intro-text">Nuestro compromiso es brindarte una experiencia excepcional, desde el primer contacto hasta la finalización de tu viaje. Aquí encontrarás toda la información que necesitas para resolver tus dudas, contactar con nosotros y conocer nuestros servicios de soporte.</p>

    <!-- Medios de Contacto -->
    <div class="atencion-card">
        <h2>📞 Medios de Contacto</h2>
        <ul>
            <li><strong>Teléfono:</strong> 961-306-7770 (Lunes a Domingo, 8am - 9pm)</li>
            <li><strong>Email:</strong> zoquebus1@gmail.com</li>
            <li><strong>WhatsApp:</strong> 961-306-7770</li>
            <li><strong>Redes sociales:</strong> Facebook, Instagram, Twitter</li>
        </ul>
    </div>

    <!-- Horarios -->
    <div class="atencion-card">
        <h2>🕐 Horarios de Atención</h2>
        <p><strong>Chat en línea:</strong> 24 horas</p>
        <p><strong>Atención telefónica:</strong> 8:00 a 21:00 hrs</p>
    </div>

    <!-- Preguntas Frecuentes -->
    <div class="atencion-card">
        <h2>❓ Preguntas Frecuentes</h2>
        <ul>
            <li><strong>¿Cómo reservo un viaje?</strong> Puedes reservar desde nuestra web, por teléfono o WhatsApp.</li>
            <li><strong>¿Puedo modificar mi reservación?</strong> Sí, hasta 24 horas antes del viaje sin costo adicional.</li>
            <li><strong>¿Qué pasa si cancelo?</strong> Reembolsos aplicables dependiendo del tipo de servicio. Consulta políticas.</li>
            <li><strong>¿Aceptan pagos a plazos?</strong> Sí, mediante plataformas como MercadoPago o PayPal.</li>
        </ul>
    </div>

    <!-- Seguridad -->
    <div class="atencion-card">
        <h2>🔒 Seguridad y Privacidad</h2>
        <p>Protegemos tu información con altos estándares de seguridad digital. Tus datos personales y de pago están cifrados y jamás se comparten con terceros sin tu consentimiento.</p>
    </div>

    <!-- Opiniones -->
    <div class="atencion-card">
        <h2>💬 Opiniones y Sugerencias</h2>
        <p>Tu opinión nos ayuda a mejorar. Puedes dejarnos comentarios al final de cada viaje o enviarlos directamente a nuestro correo. Todas las sugerencias son revisadas por nuestro equipo de calidad.</p>
    </div>

    <!-- Testimonios -->
    <div class="atencion-card testimonial">
        <h2>🌟 Lo que dicen nuestros clientes</h2>
        <p><em>"Excelente servicio, muy atentos desde el principio. ¡Volveré a viajar con ustedes!"</em> — Carla M.</p>
        <p><em>"La atención por WhatsApp fue inmediata. Resolví todo desde casa." </em> — Juan L.</p>
    </div>

    <!-- Imagen destacada -->
    <div class="atencion-image">
        <img src="view/img/atencion/atencionn.jpg" alt="Centro de atención" />
        <p class="caption">Nuestro equipo siempre listo para ayudarte.</p>
    </div>

    <!-- Ubicación física: UNACH -->
    <div class="atencion-card">
        <h2>📍 Visítanos en nuestras oficinas</h2>
        <p><strong>Ubicación:</strong> Universidad Autónoma de Chiapas (UNACH), Tuxtla Gutiérrez, Chiapas.</p>
        <iframe class="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.2767161088543!2d-93.14257032570908!3d16.75783822320144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x858ddf31a9ddad5f%3A0xf3e0ae389b314f0e!2sUniversidad%20Aut%C3%B3noma%20de%20Chiapas!5e0!3m2!1ses!2smx!4v1712944160866!5m2!1ses!2smx"
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>
</body>
</html>
<?php require("view/layout/footer.php"); ?>