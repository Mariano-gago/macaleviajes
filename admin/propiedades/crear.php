<?php
include '../../includes/templates/header.php'; 

//Base de Datos
require '../../includes/app.php';

use App\Viaje;
use Intervention\Image\ImageManagerStatic as Image;
//Conexion base de datos
$db = conectarDB();

// Array con mensaje de errores
$errores = Viaje::getErrores();
//Array con opciones para mostrar
$incluye = [];

// Variables inicializadas vacias para que se asgine valor cuando se carga en el formulario
$destino = '';
$precio = '';
$icono1 = '';
$icono2 = '';
$icono3 = '';
$descripcion = '';
$categoria = '';
$continente = '';
$imagen1 = '';
$imagen2 = '';
$imagen3 = '';
$aereos = '';
$traslado = '';
$hotel = '';
$excursiones = '';

//Genera las variables a partir de los datos del array POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Instancia de la clase Viaje
    $viaje = new Viaje($_POST);

    //Crea la carpeta de imagenes
    //Genera un nombre unico para imagenes
    $nombreIcono1 = md5( uniqid( rand(), true)) . ".png";
    $nombreIcono2 = md5( uniqid( rand(), true)) . ".png";
    $nombreIcono3 = md5( uniqid( rand(), true)) . ".png";

    $nombreImagen1 = md5( uniqid( rand(), true)) . ".jpg";
    $nombreImagen2 = md5( uniqid( rand(), true)) . ".jpg";
    $nombreImagen3 = md5( uniqid( rand(), true)) . ".jpg"; 

    //Setea imagen
    /*Realiza un resize a la imagen con intervention*/
    if($_FILES ['icono1']['tmp_name']){
        $icono1 = Image::make($_FILES['icono1']['tmp_name'])->fit(50, 50);
        $viaje->setImagen1($nombreIcono1);
    }

    if($_FILES ['icono2']['tmp_name']){
        $icono2 = Image::make($_FILES['icono2']['tmp_name'])->fit(50, 50);
        $viaje->setImagen2($nombreIcono2);
    }
    if($_FILES ['icono3']['tmp_name']){
        $icono3 = Image::make($_FILES['icono3']['tmp_name'])->fit(50, 50);
        $viaje->setImagen3($nombreIcono3);
    }
    if($_FILES ['imagen1']['tmp_name']){
        $imagen1 = Image::make($_FILES['imagen1']['tmp_name'])->fit(650, 650);
        $viaje->setImagen4($nombreImagen1);
    }
    if($_FILES ['imagen2']['tmp_name']){
        $imagen2 = Image::make($_FILES['imagen2']['tmp_name'])->fit(650, 650);
        $viaje->setImagen5($nombreImagen2);
    }
    if($_FILES ['imagen3']['tmp_name']){
        $imagen3 = Image::make($_FILES['imagen3']['tmp_name'])->fit(650, 650);
        $viaje->setImagen6($nombreImagen3);
    }
    
    $errores = $viaje->validar();

    $incluye = $viaje->incluye();

    //Revisar que el array de errores este vacio para insertarlos en la base de datos
    if(empty($errores)){

    // Crear la carpta para subir las imagenes
    if(!is_dir(CARPETA_IMAGENES)){
        mkdir(CARPETA_IMAGENES);
    }

    //guarda la imagen en el servidor
    $icono1->save(CARPETA_IMAGENES . $nombreIcono1);
    $icono2->save(CARPETA_IMAGENES . $nombreIcono2);
    $icono3->save(CARPETA_IMAGENES . $nombreIcono3);
    $imagen1->save(CARPETA_IMAGENES . $nombreImagen1);
    $imagen2->save(CARPETA_IMAGENES . $nombreImagen2);
    $imagen3->save(CARPETA_IMAGENES . $nombreImagen3);

    //Mensaje de exito
    $resultado = $viaje->guardar();
    if($resultado){
        header('Location: ../?registrado=1');
        }
    }       
}
?>

<main class="content">
    <div>
        <h1>Crear</h1>
        <a href="../index.php" class="button button-verde">Volver</a>
        <!-- Se muestran errores si los hay -->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach;?>

        <section>
            <form class="formulario" method="POST" action="../../admin/propiedades/crear.php" enctype="multipart/form-data">
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
                </fieldset>

                <fieldset>
                    <legend>Tarjeta Informativa</legend>
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion"></textarea>

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
                    </fieldset>

                    <input type="submit" class="button button-verde" value="Crear Viaje">
                </form>
            </section>
        </div>
    </main>

<?php include '../../includes/templates/footer.php';?>