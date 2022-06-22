<?php
include '../../includes/templates/header.php';
require  '../../includes/app.php';

use App\Viaje;
//Obtengo el nombre del destino seleccionado

$destino = $_GET['destino'];
$query = "SELECT * FROM viaje WHERE destino = '${destino}'";
$viajes = Viaje::consultarSQL($query);



/* $destino = $_GET['destino'];
$destino= $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    
    if($id){
        $viaje = Viaje::find($id); */
//Importo base de datos


//$db = conectarDB()  ;

//Consultar base de datos
/* $query = "SELECT * FROM viaje WHERE destino = '${destino}'";

//debuger($query);
//Obtengo resultado de base de datos
$resultado = mysqli_query($db, $query); */

?>


<main>
    <section class="content">
    <?php foreach($viajes as $viaje): ?>
    
        <div class="card mb-3 card-position" style="max-width: 100%;">
        
            <div class="row g-0">
                <div class="col-md-4">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                        
                            <div class="carousel-item active">
                                <img src="../../imagenes/<?php echo $viaje->imagen1;?>" class="d-block w-100" alt="Imagen <?php echo $viaje->destino;?>">
                            </div>
                            <div class="carousel-item">
                                <img src="../../imagenes/<?php echo $viaje->imagen2;?>" class="d-block w-100" alt="Imagen <?php echo $viaje->destino;?>">
                            </div>
                            <div class="carousel-item">
                                <img src="../../imagenes/<?php echo $viaje->imagen3;?>" class="d-block w-100" alt="Imagen <?php echo $viaje->destino;?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $viaje->destino;?></h5>
                        <p class="card-text"><?php echo $viaje->descripcion;?></p>
                        <p>Incluye:</p>
                        <div class="card-text">
                            <?php 
                            $opciones = [$viaje->aereos, $viaje->traslado, $viaje->hotel, $viaje->excursiones];
                            //debuger($opciones);
                            foreach($opciones as $opcion): ?>
                                <?php if($opcion != ''):?>
                                    <ul>
                                        <li><?php echo $opcion; ?></li> 
                                    </ul>                                            
                                <?php endif;?>
                            <?php endforeach;?>
                            <p class="precio"><span>U$D <?php echo $viaje->precio;?></span></p>
                        </div>
                    </div>
                    <button type="button" class="button button-celeste button-celeste__info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Envianos tu consulta!
                    </button>
                </div>
            </div>
            
        </div>
        
    </section>

    <div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="staticBackdropLabel">Consulta por Viaje a <?php echo $viaje->destino;?></h5>
                        <?php endforeach;?>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="formulario">
                            
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" placeholder="Tu Nombre">
            
                            <label for="apellido">Apellido</label>
                            <input type="text" id="apellido" placeholder="Tu Apellido">
            
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Tu Email">
                            
                            <label for="telefono">Telefono</label>
                            <input type="tel" id="telefono" placeholder="Tu Telefono">
                            
                            <label for="mensaje">Consulta</label>
                            <textarea id="mensaje"></textarea>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button button-rojo" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="button button-verde">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../../includes/templates/footer.php';
?>