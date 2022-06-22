<?php
include '../../includes/templates/header.php'; 

//Base de Datos
require '../../includes/app.php';

use App\Viaje;
use Intervention\Image\ImageManagerStatic as Image;
//Conexion base de datos


$viaje = new Viaje;
// Array con mensaje de errores
$errores = Viaje::getErrores();
//Array con opciones para mostrar
$incluye = [];


//Genera las variables a partir de los datos del array POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    
    //Instancia de la clase Viaje
    $viaje = new Viaje($_POST['viaje']);


    
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
    if($_FILES['viaje']['tmp_name']['icono1']){
        $icono1 = Image::make($_FILES['viaje']['tmp_name']['icono1'])->fit(50, 50);
        $viaje->setImagen1($nombreIcono1);
    }

    if($_FILES['viaje']['tmp_name']['icono2']){
        $icono2 = Image::make($_FILES['viaje']['tmp_name']['icono2'])->fit(50, 50);
        $viaje->setImagen2($nombreIcono2);
    }
    if($_FILES['viaje']['tmp_name']['icono3']){
        $icono3 = Image::make($_FILES['viaje']['tmp_name']['icono3'])->fit(50, 50);
        $viaje->setImagen3($nombreIcono3);
    }
    if($_FILES['viaje']['tmp_name']['imagen1']){
        $imagen1 = Image::make($_FILES['viaje']['tmp_name']['imagen1'])->fit(650, 650);
        $viaje->setImagen4($nombreImagen1);
    }
    if($_FILES['viaje']['tmp_name']['imagen2']){
        $imagen2 = Image::make($_FILES['viaje']['tmp_name']['imagen2'])->fit(650, 650);
        $viaje->setImagen5($nombreImagen2);
    }
    if($_FILES['viaje']['tmp_name']['imagen3']){
        $imagen3 = Image::make($_FILES['viaje']['tmp_name']['imagen3'])->fit(650, 650);
        $viaje->setImagen6($nombreImagen3);
    }
    
    $errores = $viaje->validar();

    //$incluye = $viaje->incluye();

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

    
    
    $viaje->guardar();
    
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
                <?php include '../../includes/templates/formularioViajes.php' ;?>
                    <input type="submit" class="button button-verde" value="Crear Viaje">
                </form>
            </section>
        </div>
    </main>

<?php include '../../includes/templates/footer.php';?>