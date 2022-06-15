<?php 

//Importo base de datos desde App 
$db = conectarDB();

//Consultar base de datos
$query = "SELECT * FROM viaje WHERE categoria = 'destacado'";

//Obtengo resultado de base de datos
$resultado = mysqli_query($db, $query);

/* echo "<pre>";
var_dump($resultado);
echo "</pre>";
 */
?>





<?php while($viaje = mysqli_fetch_assoc($resultado)):?>
<div class="content-card">
    
    <picture>
        <img class="img-card" src="../../../macaleviajes/imagenes/<?php echo $viaje['imagen1']?>" alt="Imagen <?php echo $viaje['destino'];?>">
    </picture>
    <div class="iconos">
        <ul>
            <li><img src="../../../macaleviajes/imagenes/<?php echo $viaje['icono1']?>"></li>
            <li><img src="../../../macaleviajes/imagenes/<?php echo $viaje['icono2']?>"></li>
            <li><img src="../../../macaleviajes/imagenes/<?php echo $viaje['icono3']?>"></li>
        </ul>
    </div>
    <div class="card-texto">
        <h2><?php echo $viaje['destino']?></h2>
        <p class="precio"><span>Desde </span>U$D<?php echo $viaje['precio']?></p>
    </div>
    <div >
    
        <a class="button-celeste" href="src/assets/informacion.php?destino=<?php echo $viaje['destino'];?>">Ver Paquete</a>
    </div>
    
</div>
<?php endwhile;?>

<?php

// cerrar conexion
?>
