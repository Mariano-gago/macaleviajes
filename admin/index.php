<?php 
session_start();

//$auth = $_SESSION['login'];

/* if(!$auth){
    header('Location: ../index.php');
} */

//Importa conexion
require '../includes/app.php';
use App\Viaje;

//Implementar metodo
$viajes = Viaje::all();

//Muestra mensaje
$registrado = $_GET['registrado'] ?? null; 


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    
    if($id){
        $viaje = Viaje::find($id);
        
        $viaje->eliminar();
    } 
    
}


?>


<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MacaleViajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header">
        <div class="content content-header">
            <div class="barra">
                <a class="logo" href="../index.php">
                    <img src="../build/img/logo.png" alt="logo">
                    <p class="title">MacaleViajes</p>
                </a>
                <nav class="nav">
                    <a href="../../index.php">Inicio</a>
                    <a href="../src/assets/nosotros.php">Nosotros</a>
                    <a href="../src/assets/destinos.php">Destinos</a>
                    <a href="../src/assets/contacto.php">Contacto</a>
                </nav>
                <div class="media_social">
                    <a href="#" target="_blank"><img src="../build/img/face.png" alt="Icono Facebook"></a>
                    <a href="#" target="_blank"><img src="../build/img/instagram.png" alt="Icono Instagram"></a>
                    <a href="#" target="_blank"><img src="../build/img/wp.png" alt="Icono Whatsapp"></a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="content">
            <h1>Administrador De MacaleViajes</h1>
            <?php if($registrado === '1'):?>
                <p class="alerta exito">Viaje creado correctamente</p>
                <?php elseif($registrado === '2'):?>
                    <p class="alerta exito">Viaje actualizado correctamente</p>
                <?php elseif($registrado === '3'):?>
                    <p class="alerta exito">Viaje eliminado correctamente</p>
            <?php endif;?>
            <a class= "button button-verde radius" href="../admin/propiedades/crear.php">Nuevo Viaje</a>
            <section>
                <table class="viajes">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Destino</th>
                            <th>Precio</th>
                            <th>Iconos</th>
                            <th>Descripcion</th>
                            <th>Imagenes</th>
                            <th>Categoria</th>
                            <th>Continente</th>
                            <th>Aereos</th>
                            <th>Traslado</th>
                            <th>Hotel</th>
                            <th>Excursiones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody> <!-- Muestra resultados base de datos-->
                        <?php foreach($viajes as $viaje):;?>
                        <tr>
                            <th><?php echo $viaje->idViaje;?></th>
                            <th><?php echo $viaje->destino;?></th>
                            <th>$<?php echo $viaje->precio;?></th>
                            <th>
                                <img src="../imagenes/<?php echo $viaje->icono1;?>" class="imagen-tabla">
                                <img src="../imagenes/<?php echo $viaje->icono2;?>" class="imagen-tabla">
                                <img src="../imagenes/<?php echo $viaje->icono3;?>" class="imagen-tabla">
                            </th>
                            <th><?php echo $viaje->descripcion;?></th>
                            <th>
                                <img src="../imagenes/<?php echo $viaje->imagen1;?>" class="imagen-tabla">
                                <img src="../imagenes/<?php echo $viaje->imagen2;?>" class="imagen-tabla">
                                <img src="../imagenes/<?php echo $viaje->imagen3;?>" class="imagen-tabla">
                            </th>
                            <th><?php echo $viaje->categoria;?></th>
                            <th><?php echo $viaje->continente;?></th>
                            <th><?php echo $viaje->aereos;?></th>
                            <th><?php echo $viaje->traslado;?></th>
                            <th><?php echo $viaje->hotel;?></th>
                            <th><?php echo $viaje->excursiones;?></th>
                            <th>
                                <form method="POST" class="w-100">
                                    <input type="hidden" name="id" value="<?php echo $viaje->idViaje;?>">
                                    <input class="button-rojo_block radius" type="submit" value="Eliminar">
                                </form>
                                
                                <a class="button-amarillo_block radius" href="../admin/propiedades/actualizar.php?id=<?php echo $viaje->idViaje;?>">Actualizar</a>
                            </th>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    
                </table>
            </section>
        </div>

        
    </main>

    <footer class="footer">
        <div class="barra-footer">
            <a class="logo-footer" href="../index.php">
                <img src="../build/img/logo.png" alt="logo">
                <p class="title title-footer">MacaleViajes</p>
            </a>
        </div>
        <div class="content-footer">
            <div class="nav-social__footer">
                <nav class="nav nav__footer">
                    <a href="../index.php">Inicio</a>
                    <a href="nosotros.php">Nosotros</a>
                    <a href="destinos.php">Destinos</a>
                    <a href="contacto.php">Contacto</a>
                </nav>
                <div class="media_social">
                    <a href="#"><img src="../build/img/face.png" alt="Icono Facebook"></a>
                    <a href="#"><img src="../build/img/instagram.png" alt="Icono Instagram"></a>
                    <a href="#"><img src="../build/img/wp.png" alt="Icono Whats app"></a>
                </div>
            </div>
            <div class="info">
                <p class="info-footer">Encuentre aqui toda la información, imágenes, consejos y precios para viajar por Argentina y el mundo. MacaleViajes es una agencia de viajes online especializada en Viajes por Argentina y el mundo. Solicite hoy su cotización sin cargo.</p>
                <p class="info-footer">@Todos los derechos reservados. Copyrigth <?php echo date('Y') ?>. Created by <span><a href="">MFG</a></span></p>
            </div>
        </div>
    </footer>
    <script src="../build/js/bundle.js"></script>
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</php>