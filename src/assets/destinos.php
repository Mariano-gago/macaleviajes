<?php 

use App\Viaje;

include '../../includes/templates/header.php';


//Importo base de datos

require  __DIR__ . '../../../includes/app.php';

$viajes= Viaje::all();

?>



    <main>
        <div>
            <h1>Destinos</h1>
        </div>

        <div class="content">

            <div class="titulo">
                <h2 class="titulo-lineas">Nacionales</h2>
            </div>
            <div class="cards">
                <!-- Card-->
                <?php foreach($viajes  as $viaje):?>
                    <?php if(strtoupper($viaje->continente) === "NACIONAL"):?>
                    <div class="content-card">
                        
                        
                        <picture>
                            <img class="img-card" src="../../../macaleviajes/imagenes/<?php echo $viaje->imagen1;?>" alt="Imagen <?php echo $viaje->destino;?>">
                        </picture>
                        <div class="iconos">
                            <ul>
                                <li><img src="../../../macaleviajes/imagenes/<?php echo $viaje->icono1;?>"></li>
                                <li><img src="../../../macaleviajes/imagenes/<?php echo $viaje->icono2;?>"></li>
                                <li><img src="../../../macaleviajes/imagenes/<?php echo $viaje->icono3;?>"></li>
                            </ul>
                        </div>
                        <div class="card-texto">
                            <h2><?php echo $viaje->destino;?></h2>
                            <p class="precio"><span>Desde </span>U$D<?php echo $viaje->precio;?></p>
                        </div>
                        <div >
                        
                            <a class="button-celeste" href="informacion.php?destino=<?php echo $viaje->destino;?>">Ver Paquete</a>
                        </div>
                        
                    </div>
                    <?php endif;?>
                    <?php endforeach;?>
            </div>
            
            <div class="titulo">
                <h2 class="titulo-lineas">Internacionales</h2>
            </div>
            <div class="cards">
            <?php foreach($viajes  as $viaje):?>
                    <?php if(strtoupper($viaje->continente) === "INTERNACIONAL"):?>
                        <div class="content-card">
                        
                        
                        <picture>
                            <img class="img-card" src="../../../macaleviajes/imagenes/<?php echo $viaje->imagen1;?>" alt="Imagen <?php echo $viaje->destino;?>">
                        </picture>
                        <div class="iconos">
                            <ul>
                                <li><img src="../../../macaleviajes/imagenes/<?php echo $viaje->icono1;?>"></li>
                                <li><img src="../../../macaleviajes/imagenes/<?php echo $viaje->icono2;?>"></li>
                                <li><img src="../../../macaleviajes/imagenes/<?php echo $viaje->icono3;?>"></li>
                            </ul>
                        </div>
                        <div class="card-texto">
                            <h2><?php echo $viaje->destino;?></h2>
                            <p class="precio"><span>Desde </span>U$D<?php echo $viaje->precio;?></p>
                        </div>
                        <div >
                        
                            <a class="button-celeste" href="informacion.php?destino=<?php echo $viaje->destino;?>">Ver Paquete</a>
                        </div>
                        
                    </div>
                <?php endif;?>
                <?php endforeach;?>
            </div>

            <div class="titulo">
                <h2 class="titulo-lineas">Caribe</h2>
            </div>
            <div class="cards">
                <!-- Card-->
                <?php foreach($viajes  as $viaje):?>
                    <?php if(strtoupper($viaje->continente) === "CARIBE"):?>
                    <div class="content-card">
                        
                        
                        <picture>
                            <img class="img-card" src="../../../macaleviajes/imagenes/<?php echo $viaje->imagen1;?>" alt="Imagen <?php echo $viaje->destino;?>">
                        </picture>
                        <div class="iconos">
                            <ul>
                                <li><img src="../../../macaleviajes/imagenes/<?php echo $viaje->icono1;?>"></li>
                                <li><img src="../../../macaleviajes/imagenes/<?php echo $viaje->icono2;?>"></li>
                                <li><img src="../../../macaleviajes/imagenes/<?php echo $viaje->icono3;?>"></li>
                            </ul>
                        </div>
                        <div class="card-texto">
                            <h2><?php echo $viaje->destino;?></h2>
                            <p class="precio"><span>Desde </span>U$D<?php echo $viaje->precio;?></p>
                        </div>
                        <div >
                        
                            <a class="button-celeste" href="informacion.php?destino=<?php echo $viaje->destino;?>">Ver Paquete</a>
                        </div>
                        
                    </div>
                    <?php endif;?>
                    <?php endforeach;?>
            </div>

        </div>
    </main>

    <?php include '../../includes/templates/footer.php';?>