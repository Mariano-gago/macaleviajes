<?php 

//Conexion base de datos
require 'includes/config/database.php';
$db = conectarDB();

//Autenticar el usuario

$errores = [];

if($_SERVER ['REQUEST_METHOD'] === 'POST'){

    /* echo "<pre>";
                var_dump($_POST);
                echo"</pre>"; */
    $email = mysqli_real_escape_string ($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ;
    $password = mysqli_real_escape_string($db, $_POST['password']);

    var_dump($email);
    if (!$email){
        $errores[] = "El email es obligatorio";
    }
    if (!$password){
        $errores[] = "El password es obligatorio";
    }
    var_dump($errores);
    if(empty($errores)){
        $query = "SELECT * FROM usuarios WHERE email= '${email}'";
        $resultado = mysqli_query($db, $query);
        var_dump($resultado);

        if($resultado -> num_rows){
            $usuario = mysqli_fetch_assoc($resultado);
            //Verificar password
            $auth = password_verify($password, $usuario['password']);

            if( $auth ){
                session_start();

                
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;
                echo "<pre>";
                var_dump($_SESSION);
                echo"</pre>";
                
            }else{
                $errores[] = "El password es incorrecto";
            }
        }else{
            $errores[] = "El usuario no existe";
        }
    }
}

?>




<!DOCTYPE html>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MacaleViajes</title>
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
                    <a href="#"><img src="build/img/face.png" alt="Icono Facebook"></a>
                    <a href="#"><img src="build/img/instagram.png" alt="Icono Instagram"></a>
                    <a href="#"><img src="build/img/wp.png" alt="Icono Whats app"></a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="titulo content">
            <h1 class="titulo-lineas">Iniciar Sesion</h1>
        </div>
        
            <?php foreach ($errores as $error): ?>
                <div class="alerta error">
                    <?php echo $error;?>
                </div>
            <?php endforeach;?>
        
        <section class="content">
            <form method="POST" class="formulario content content-center">
                <fieldset>
                    <legend>Email y Password</legend>
    
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Tu Email" >
                    
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" >
                    
                </fieldset>

                <input type="submit" value="Iniciar Sesion" class="button button-celeste">
            </form>
        </section>
        
    </main>


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