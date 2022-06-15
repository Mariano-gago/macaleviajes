<?php include '../../includes/templates/header.php'; ?>

<?php 

// Obtengo el id seleccionado 
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('location: ../index.php');
}

//Base de Datos
require '../../includes/config/database.php';
$db = conectarDB();

// Consulta DB los datos del id seleccionado
$consulta = "SELECT * FROM viaje WHERE idViaje = ${id}";
$resultado = mysqli_query($db, $consulta);
$viaje = mysqli_fetch_assoc($resultado);

// Array con mensaje de errores
$errores = [];
$incluye = [];

// Variables inicializadas vacias para que se asgine valor cuando se carga en el formulario
$destino = $viaje['destino'];
$precio = $viaje['precio'];
$icono1 = $viaje['icono1'];
$icono2 = $viaje['icono2'];
$icono3 = $viaje['icono3'];
$descripcion = $viaje['descripcion'];
$categoria = $viaje['categoria'];
$continente = $viaje['continente'];
$imagen1 = $viaje['imagen1'];
$imagen2 = $viaje['imagen2'];
$imagen3 = $viaje['imagen3'];
$aereos = $viaje['aereos'];
$traslado = $viaje['traslado'];
$hotel = $viaje['hotel'];
$excursiones = $viaje['excursiones'];

//Genera las variables a partir de los datos del array POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $destino = mysqli_real_escape_string($db, $_POST['destino']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $categoria = mysqli_real_escape_string($db, $_POST['categoria']);
    $continente = mysqli_real_escape_string($db, $_POST['continente']);
    $aereos = mysqli_real_escape_string($db, $_POST['aereos']);
    $traslado = mysqli_real_escape_string($db, $_POST['traslado']);
    $hotel = mysqli_real_escape_string($db, $_POST['hotel']);
    $excursiones = mysqli_real_escape_string($db, $_POST['excursiones']);

    //Asigno FILES a las variables de imagenes
    $icono1 = $_FILES['icono1'];
    $icono2 = $_FILES['icono2'];
    $icono3 = $_FILES['icono3'];
    $imagen1 = $_FILES['imagen1'];
    $imagen2 = $_FILES['imagen2'];
    $imagen3 = $_FILES['imagen3'];

    //Array de la seccion "Incluye"
    if($aereos){
        $incluye[] = $aereos;
    }
    if($traslado){
        $incluye[] = $traslado;
    }
    if($hotel){
        $incluye[] = $hotel;
    }
    if($excursiones){
        $incluye[] = $excursiones;
    }

    //Validacion de Formulario
    if(!$destino){
        $errores [] = "Agregar un Destino";
    }
    if(!$precio){
        $errores [] = "Agregar un Precio";
    }

    if(!$descripcion){
        $errores [] = "Agregar un Descripcion";
    }
    if(!$categoria){
        $errores [] = "Agregar un Categoria";
    }
    if(!$continente){
        $errores [] = "Agregar un Continente";
    }
    
    //Revisar que el array de errores este vacio para insertarlos en la base de datos
    if(empty($errores)){
        /* Subida de archivos imagenes*/

        //Crea la carpeta imagenes
        $carpetaImagenes = '../../imagenes/';
        
        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

        $nombreImagen1 = '';
        $nombreImagen2 = '';
        $nombreImagen3 = '';

        $nombreIcono1 = '';
        $nombreIcono2 = '';
        $nombreIcono3 = '';
        

        if($imagen1['name']){
            //elimina imagen previa
            unlink($carpetaImagenes . $viaje['imagen1']);
            $nombreImagen1 = md5( uniqid( rand(), true)) . ".jpg";
            move_uploaded_file($imagen1['tmp_name'], $carpetaImagenes . $nombreImagen1);
        }else{
            $nombreImagen1 = $viaje['imagen1'];
        }

        if($imagen2['name']){
            //elimina imagen previa
            unlink($carpetaImagenes . $viaje['imagen2']);
            $nombreImagen2 = md5( uniqid( rand(), true)) . ".jpg";
            move_uploaded_file($imagen2['tmp_name'], $carpetaImagenes . $nombreImagen2);
        }else{
            $nombreImagen2 = $viaje['imagen2'];
        }

        if($imagen3['name']){
            //elimina imagen previa
            unlink($carpetaImagenes . $viaje['imagen3']);
            $nombreImagen3 = md5( uniqid( rand(), true)) . ".jpg";
            move_uploaded_file($imagen3['tmp_name'], $carpetaImagenes . $nombreImagen3);
        }else{
            $nombreImagen3 = $viaje['imagen3'];
        }

        if($icono1['name']){
            //elimina imagen previa
            unlink($carpetaImagenes . $viaje['icono1']);
            $nombreIcono1 = md5( uniqid( rand(), true)) . ".png";
            /*Sube imagen a la carpeta creada*/
            move_uploaded_file($icono1['tmp_name'], $carpetaImagenes . $nombreIcono1);
        }else{
            $nombreIcono1 = $viaje['icono1'];
        }

        if($icono2['name']){
            //elimina imagen previa
            unlink($carpetaImagenes . $viaje['icono2']);
            // Genera nombre para imagenes
            $nombreIcono2 = md5( uniqid( rand(), true)) . ".png";
            move_uploaded_file($icono2['tmp_name'], $carpetaImagenes . $nombreIcono2);
        }else{
            $nombreIcono2 = $viaje['icono2'];
        }

        if($icono3['name']){
            //elimina imagen previa
            unlink($carpetaImagenes . $viaje['icono3']);
            // Genera nombre para imagenes
            $nombreIcono3 = md5( uniqid( rand(), true)) . ".png";
            move_uploaded_file($icono3['tmp_name'], $carpetaImagenes . $nombreIcono3);
        }else{
            $nombreIcono3 = $viaje['icono3'];
        }
        
        //Insertar en base de datos}
        $query = "UPDATE viaje SET destino = '${destino}', precio = '${precio}', icono1 = '${nombreIcono1}',
        icono2 = '${nombreIcono2}', icono3 = '${nombreIcono3}', descripcion = '${descripcion}',
        imagen1 = '${nombreImagen1}', imagen2 = '${nombreImagen2}', imagen3 = '${nombreImagen3}', 
        categoria = '${categoria}', continente = '${continente}', aereos = '${aereos}', hotel = '${hotel}', traslado = '${traslado}',
        excursiones = '${excursiones}' WHERE idViaje = ${id}";
        
        $resultado = mysqli_query($db, $query);
        if($resultado){
            header('Location: ../?registrado=2');
        }
    }       
}
?>

<main class="content">
    <div>
        <h1>Actualizar Viaje</h1>
        <a href="../index.php" class="button button-verde">Volver</a>
        <!-- Se muestran errores si los hay -->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach;?>

        <section>
            <form class="formulario" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Tarjeta Principal</legend>
                    <label for="destino">Destino</label>
                    <input type="text" name="destino" id="destino" placeholder="Pais o ciudad" value="<?php echo $destino;?>">

                    <label for="precio">Precio</label>
                    <input type="number" name="precio" id="precio" placeholder="Precio del paquete" value="<?php echo $precio;?>">

                    <legend>Iconos</legend>
                    <label for="icono 1">Icono 1</label>
                    <input type="file" name="icono1" id="icono1" accept="image/png, image/jpg" value="<?php echo $icono1;?>" >
                    <label for="icono 2">Icono 2</label>
                    <input type="file" name="icono2" id="icono2" accept="image/png, image/jpg" value="<?php echo $icono2;?>" > 
                    <label for="icono 3">Icono 3</label>
                    <input type="file" name="icono3" id="icono3" accept="image/png, image/jpg" value="<?php echo $icono3;?>" >
                    <div class="imagenes-actualizacion">
                            <img class="imagen-small" src="../../imagenes/<?php echo $viaje['icono1'];?>">
                            <img class="imagen-small" src="../../imagenes/<?php echo $viaje['icono2'];?>">
                            <img class="imagen-small" src="../../imagenes/<?php echo $viaje['icono3'];?>">
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Tarjeta Informativa</legend>
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" value=""><?php echo $descripcion ?></textarea>

                    <legend>Seccion Incluye</legend>
                        <input type="text" name="aereos" id="aereos" placeholder="Aereos" value="<?php echo $aereos;?>">
                        <input type="text" name="traslado" id="traslado" placeholder="Traslado" value="<?php echo $traslado;?>">
                        <input type="text" name="hotel" id="hotel" placeholder="Hotel" value="<?php echo $hotel;?>">
                        <input type="text" name="excursiones" id="excursiones" placeholder="Excursiones" value="<?php echo $excursiones;?>">
                        

                        <label for="categoria">Categoria</label>
                        <input type="text" name="categoria" id="categoria" placeholder="Destacado o normal" value="<?php echo $categoria;?>">

                        <label for="continente">Continente</label>
                        <input type="text" name="continente" id="continente" placeholder="Continente" value="<?php echo $continente;?>">

                        <legend for="imagenes">Imagenes</legend>
                        <label for="imagen 1">Imagen 1</label>
                        <input type="file" name="imagen1" id="imagen 1" accept="image/png, image/jpg, image/webp" value="<?php echo $imagen1;?>">
                        <label for="imagen 2">Imagen 2</label>
                        <input type="file" name="imagen2" id="imagen 2" accept="image/png, image/jpg, image/webp" value="<?php echo $imagen2;?>">
                        <label for="imagen 3">Imagen 3</label>
                        <input type="file" name="imagen3" id="imagen 3" accept="image/png, image/jpg, image/webp" value="<?php echo $imagen3;?>">

                        <div class="imagenes-actualizacion">
                            <img class="imagen-small" src="../../imagenes/<?php echo $viaje['imagen1'];?>">
                            <img class="imagen-small" src="../../imagenes/<?php echo $viaje['imagen2'];?>">
                            <img class="imagen-small" src="../../imagenes/<?php echo $viaje['imagen3'];?>">
                        </div>
                        
                    </fieldset>

                    <input type="submit" class="button button-verde" value="Actualizar Viaje">
                </form>
            </section>
        </div>
    </main>

<?php include '../../includes/templates/footer.php';?>