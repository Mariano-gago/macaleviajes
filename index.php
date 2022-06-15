<?php 
require '../macaleviajes/includes/app.php';
?>

<!DOCTYPE html>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macaleviajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <header class="header">
        <div class="content content-header">
            <div class="barra">
                <a class="logo" href="index.php">
                    <img src="build/img/logo.png" alt="logo">
                    <p class="title">MacaleViajes</p>
                </a>
                <nav class="nav">
                    <a href="index.php">Inicio</a>
                    <a href="./src/assets/nosotros.php">Nosotros</a>
                    <a href="./src/assets/destinos.php">Destinos</a>
                    <a href="./src/assets/contacto.php">Contacto</a>
                </nav>
                <div class="media_social">
                    <a href="https://www.facebook.com/marianacaleviajes/"><img src="build/img/face.png" alt="Icono Facebook"></a>
                    <a href=" https://www.instagram.com/marianacale.viajes/"><img src="build/img/instagram.png" alt="Icono Instagram"></a>
                    <a href="https://wa.me/01126709578?text=Hola!%20Estoy%20interesado%20en%20tu%20servicio'"><img src="build/img/wp.png" alt="Icono Whats app"></a>
                </div>
            </div>
        </div>
    </header>
    <section class="carrousel">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active banner">
                    <img src="build/img/banner1.webp" class=" d-block " alt="Banner 1">
                    <div class="carousel-caption d-none d-md-block banner-text">
                        <h5>Bienvenidos!!!</h5>
                        <p>Aqui encontraras todo lo necesario para tu proximo viaje</p>
                    </div>
                </div>
                <div class="carousel-item banner">
                    <img src="build/img/banner5.webp" class="d-block w-100"  alt="Banner 2">
                    <div class="carousel-caption d-none d-md-block banner-text">
                        <h5>vuelos</h5>
                        <p>Precios promocionales en todas las temporadas</p>
                    </div>
                </div>
                <div class="carousel-item banner">
                    <img src="build/img/banner6.webp" class="d-block w-100" alt="Banner 3">
                    <div class="carousel-caption d-none d-md-block banner-text">
                        <h5>Hoteles</h5>
                        <p>Te asesoramos de acuerdo a tu presupuesto</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <main>
        <section class="content">
            <div class="titulo">
                <h1 class="titulo-lineas">Destinos Destacados</h1>
            </div>
            <div class="cards">

                <?php 
                include 'includes/templates/anuncios.php'
                ?>
                
            </div>
        </section>
    </main>

    <!-- Seccion de banner promocion-->
    <section class="banner-promos">
        <div class="previaje">
            <picture>
                <img src="./build/img/previaje.webp" alt="banner previaje">
            </picture>
        </div>
        <div class="promos content">
                <picture class="promos__aero">
                    <img src="build/img/auto.webp" alt="Alquiler de autos">
                </picture>
                <picture class="promos__aero">
                    <img src="build/img/cuotas.webp" alt="promocion cuotas">
                </picture>
                <picture class="promos__aero">
                    <img src="build/img/promosuperclub.webp" alt="promocion superclub">
                </picture>
        </div>
    </section>
    <section class="boxes">
            <div class="box content">
                <div class="box-card">
                    <div class="box-img">
                        <span class="iconify" data-icon="bxs:medal" style="color: #2a4c54;" data-width="50" data-height="50" data-rotate="180deg"></span>
                    </div>
                    <div class="box-descripcion">
                        <h3>Calidad de Servicio</h3>
                        <p>Con más de 10 años en el mercado, contamos con un equipo especializado que viaja asiduamente
                            para ofrecer las mejores recomendaciones sobre destinos, vuelos, hoteles y excursiones.
                        </p>
                    </div>
                </div> 

                <div class="box-card">
                    <div class="box-img">
                        <span class="iconify" data-icon="fluent:person-call-24-filled" style="color: #2a4c54;" data-width="50" data-height="50"></span>
                    </div>
                    <div class="box-descripcion">
                        <h3>Asistencia</h3>
                        <p>Estamos a tu disposición durante todo el viaje para brindar sugerencias, cuidar los detalles y resolver cualquier imprevisto.</p>
                    </div>
                </div>
                    
                <div class="box-card">
                    <div class="box-img">
                        <span class="iconify" data-icon="bx:credit-card" style="color: #2a4c54;" data-width="50" data-height="50"></span>
                    </div>
                    <div class="box-descripcion">
                        <h3>Financiacion</h3>
                        <p>Te asesoramos sobre las mejores promociones del mercado para que puedas realizar tus pagos de la mejor manera.</p>
                    </div>
                </div>
                
                <div class="box-card">
                    <div class="box-img">
                        <span class="iconify" data-icon="fontisto:paper-plane" style="color: #2a4c54;" data-width="50" data-height="50"></span>
                    </div>
                    <div class="box-descripcion">
                        <h3>Viajeros</h3>
                        <p>Somos viajeros al igual que tú. Expertos diseñadores de viaje. Personalizamos tus vacaciones en base a tus intereses y preferencias.</p>
                    </div>
                </div>
            </div>
    </section>
    
    <footer class="footer">
        <div class="barra-footer">
            <a class="logo-footer" href="index.php">
                <div>
                    <img src="build/img/logo.png" alt="logo">
                </div>
                <div>
                    <h4 class="title title-footer">MacaleViajes</h4>
                </div>
            </a>
        </div>
        <div class="content-footer">
            <div class="nav-social__footer">
                <nav class="nav nav__footer">
                    <a href="index.php">Inicio</a>
                    <a href="/src/assets/nosotros.php">Nosotros</a>
                    <a href="/src/assets/destinos.php">Destinos</a>
                    <a href="/src/assets/contacto.php">Contacto</a>
                </nav>
                <div class="media_social">
                    <a href="#"><img src="build/img/face.png" alt="Icono Facebook"></a>
                    <a href="#"><img src="build/img/instagram.png" alt="Icono Instagram"></a>
                    <a href="#"><img src="build/img/wp.png" alt="Icono Whats app"></a>
                </div>
            </div>
            <div class="info">
                <p class="info-footer">Encuentre aqui toda la información, imágenes, consejos y precios para viajar por Argentina y el mundo. MacaleViajes es una agencia de viajes online especializada en Viajes por Argentina y el mundo. Solicite hoy su cotización sin cargo.</p>
                <p class="info-footer">@Todos los derechos reservados. Copyrigth 2022. Created by <span><a href="">MFG</a></span></p>
            </div>
        </div>

    </footer>
    <script src="build/js/bundle.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</php>