
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="vista/css/style.css">
    <title>Zoquebus</title>
    <style>
        
    </style>
</head>
<body>
    <header>
        <img src="view/img/bannerzoquebus.png" alt="ZoqueBus">
        <div class="acciones">
            <button id="open-modal" class="open-button">Iniciar Sesión</button>
            <section class="cuerpo">
                <div id="modal-content">
                    <button id="close-modal" class="close-button">X</button>
                    <div class="container">
                        <div class="container-form">
                            <form action="index.php?i=autenticar" method="POST" class="sign-in">
                                <h2>Iniciar Sesión</h2>
                                <div class="social-networks">
                                    <ion-icon name="logo-twitch"></ion-icon>
                                    <ion-icon name="logo-twitter"></ion-icon>
                                    <ion-icon name="logo-instagram"></ion-icon>
                                    <ion-icon name="logo-facebook"></ion-icon>
                                </div>
                                <span>Use su correo y contraseña</span>
                                <div class="container-input">
                                    <ion-icon name="mail-outline"></ion-icon>
                                    <input type="text" placeholder="Correo" name="correo">
                                </div>
                                <div class="container-input">
                                    <ion-icon name="lock-closed-outline"></ion-icon>
                                    <input type="password" placeholder="Password" name="contraseña">
                                </div>
                                <a href="#">¿Olvidaste tu contraseña?</a>
                                <button value="Enviar" type="submit" class="button">INICIAR SESIÓN</button>
                                <input type="hidden" name="i" value="autenticar">
                            </form>
                        </div>
                        <div class="container-form">
                            <form action="index.php?i=registrar" method="post" class="sign-up">
                                <h2>Registrarse</h2>
                                <div class="social-networks">
                                    <ion-icon name="logo-twitch"></ion-icon>
                                    <ion-icon name="logo-twitter"></ion-icon>
                                    <ion-icon name="logo-instagram"></ion-icon>
                                    <ion-icon name="logo-facebook"></ion-icon>
                                </div>
                                <span>Use su correo electrónico para registrarse</span>
                                <div class="container-input">
                                    <ion-icon name="person-outline"></ion-icon>
                                    <input type="text" placeholder="Nombre" name="nombre" id="nombre" required>
                                </div>
                                <div class="container-input">
                                    <ion-icon name="mail-outline"></ion-icon>
                                    <input type="text" placeholder="Correo" name="correo" id="correo" required>
                                </div>
                                <div class="container-input">
                                    <ion-icon name="call-outline"></ion-icon>
                                    <input type="tel" placeholder="Telefono" name="telefono" id="telefono" required>
                                </div>
                                <div class="container-input">
                                    <ion-icon name="lock-closed-outline"></ion-icon>
                                    <input type="password" placeholder="Password" name="password" id="password" required>
                                </div>
                                <button type="submit" class="button" value="sing-up" name="register">REGISTRARSE</button>
                            </form>
                        </div>
                        <div class="container-welcome">
                            <div class="welcome-sign-up welcome">
                                <h3>¡Bienvenido!</h3>
                                <p>Ingrese sus datos personales para usar todas las funciones del sitio</p>
                                <button class="button" id="btn-sign-up">Registrarse</button>
                            </div>
                            <div class="welcome-sign-in welcome">
                                <h3>¡Hola!</h3>
                                <p>Regístrese con sus datos personales para usar todas las funciones del sitio</p>
                                <button class="button" id="btn-sign-in">Iniciar Sesión</button>
                            </div>
                        </div>
                    </div> 
                </div>
                <script>
                const container = document.querySelector(".container");
                const btnSignIn = document.getElementById("btn-sign-in");
                const btnSignUp = document.getElementById("btn-sign-up");
                const openModalBtn = document.getElementById("open-modal");
                const modalContent = document.getElementById("modal-content");
                const closeModalBtn = document.getElementById("close-modal");
                const loginForm = document.querySelector(".sign-in");

                // Mostramos el modal
                openModalBtn.addEventListener("click", () => {
                    if (localStorage.getItem("loggedIn") === "true") {
                        // Si ya está logueado  cerrar sesión
                        localStorage.removeItem("loggedIn");
                        openModalBtn.textContent = "Iniciar Sesión";
                        alert("Sesión cerrada.");
                    } 
                    else {
                        openModalBtn.style.display = "none";
                        modalContent.style.display = "block";
                    }
                });
                // Cerrar modal
                closeModalBtn.addEventListener("click", () => {
                    modalContent.style.display = "none";
                    openModalBtn.style.display = "inline-block"; 
                    container.classList.remove("toggle"); 
                });
                // Cambiar entre formularios
                btnSignIn.addEventListener("click", () => {
                    container.classList.remove("toggle");
                });
                btnSignUp.addEventListener("click", () => {
                    container.classList.add("toggle");
                });
                // Manejar envío del formulario de inicio de sesión
                loginForm.addEventListener("submit", function(e) {
                    e.preventDefault(); // Evita el envío real si solo estás simulando
                    modalContent.style.display = "none";
                    openModalBtn.style.display = "inline-block";
                    openModalBtn.textContent = "Cerrar Sesión";
                    localStorage.setItem("loggedIn", "true"); //evita que al recargar la pagina se cierre la sesion
                    this.submit();
                });
                // Al cargar la página, verificamos si el usuario ya está logueado
                window.addEventListener("load", () => {
                    if (localStorage.getItem("loggedIn") === "true") {
                        openModalBtn.textContent = "Cerrar Sesión";
                    } 
                    else {
                        openModalBtn.textContent = "Iniciar Sesión";
                    }
                });
                </script>
                <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
            </section>
        </div>
        <nav class="nav">
            <a class="nav-link" aria-current="page" href="index.php?i=index">Inicio</a>
            <a class="nav-link" href="index.php?n=nosotros">Nosotros</a>
            <a class="nav-link" href="index.php?d=destinos">Destinos</a>
            <a class="nav-link" href="index.php?e=extras">Extras</a>
            <a class="nav-link" href="index.php?p=pasajeros">Pasajeros</a>
            <a class="nav-link" href="index.php?a=atencioncliente">Atención al Cliente</a>
            <a class="nav-link" href="index.php?c=contacto">Contacto</a>
            <a class="nav-link" href="index.php?f=funcionalidades">Funcionalidades</a>
            <a class="nav-link" href="index.php?s=servicios"></a>
            <a class="nav-link" href="index.php?r=reservaciones"></a>
        </nav>
</header>