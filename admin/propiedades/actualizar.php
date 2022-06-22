<?php

use App\Viaje;
use Intervention\Image\ImageManagerStatic as Image;

include '../../includes/templates/header.php'; ?>

<?php 

// Obtengo el id seleccionado 
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('location: ../index.php');
}

//Base de Datos
require '../../includes/app.php';


$viaje = Viaje::find($id);


// Array con mensaje de errores
$errores =  Viaje::getErrores();
$incluye = [];

/*
$aereos = $viaje['aereos'];
$traslado = $viaje['traslado'];
$hotel = $viaje['hotel'];
$excursiones = $viaje['excursiones'];*/


//Genera las variables a partir de los datos del array POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Asginar los atributos
    $args = $_POST['viaje'];
    
    $viaje->sincronizar($args);

    //Validacion
    $errores = $viaje->validar();

    //Array de la seccion "Incluye"
    /* if($aereos){
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
    } */

    //Revisar que el array de errores este vacio para insertarlos en la base de datos
    if(empty($errores)){

        if($_FILES['viaje']['tmp_name']['icono1']){
            //Genera nombr unico
            $nombreIcono1 = md5( uniqid( rand(), true)) . ".png";
            //Asigna IMAGE y el tamaño de las imagenes
            $icono1 = Image::make($_FILES['viaje']['tmp_name']['icono1'])->fit(50, 50);
            //Llama a la funcion setImagem para ingresar el nombre de la imagen
            $viaje->setImagen1($nombreIcono1);
            //Guarda la imagen asignada en la carpeta de imagenes
            $icono1->save(CARPETA_IMAGENES . $nombreIcono1);
        }

        if($_FILES['viaje']['tmp_name']['icono2']){
            $nombreIcono2 = md5( uniqid( rand(), true)) . ".png";
            $icono2 = Image::make($_FILES['viaje']['tmp_name']['icono2'])->fit(50, 50);
            $viaje->setImagen2($nombreIcono2);
            $icono2->save(CARPETA_IMAGENES . $nombreIcono2);
        }

        if($_FILES['viaje']['tmp_name']['icono3']){
            $nombreIcono3 = md5( uniqid( rand(), true)) . ".png";
            $icono3 = Image::make($_FILES['viaje']['tmp_name']['icono3'])->fit(50, 50);
            $viaje->setImagen3($nombreIcono3);
            $icono3->save(CARPETA_IMAGENES . $nombreIcono3);
        }

        if($_FILES['viaje']['tmp_name']['imagen1']){
            $nombreImagen1 = md5( uniqid( rand(), true)) . ".jpg";
            $imagen1 = Image::make($_FILES['viaje']['tmp_name']['imagen1'])->fit(650, 650);
            $viaje->setImagen4($nombreImagen1);
            $imagen1->save(CARPETA_IMAGENES . $nombreImagen1);
        }

        if($_FILES['viaje']['tmp_name']['imagen2']){
            $nombreImagen2 = md5( uniqid( rand(), true)) . ".jpg";
            $imagen2 = Image::make($_FILES['viaje']['tmp_name']['imagen2'])->fit(650, 650);
            $viaje->setImagen5($nombreImagen2);
            $imagen2->save(CARPETA_IMAGENES . $nombreImagen2);
        }

        if($_FILES['viaje']['tmp_name']['imagen3']){
            $imagen3 = Image::make($_FILES['viaje']['tmp_name']['imagen3'])->fit(650, 650);
            $viaje->setImagen6($nombreImagen3);
            $imagen3->save(CARPETA_IMAGENES . $nombreImagen3);
        }





        
    
    
        /* Subida de archivos imagenes*/     
        
        /* $icono1->save(CARPETA_IMAGENES . $nombreIcono1); */
        /*$icono2->save(CARPETA_IMAGENES . $nombreIcono2);
         */
        
        $resultado = $viaje->actualizar();

        
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
                <?php include '../../includes/templates/formularioViajes.php' ?>
                <input type="submit" class="button button-verde" value="Actualizar Viaje">
            </form>
        </section>
    </div>
</main>

<?php include '../../includes/templates/footer.php';?>