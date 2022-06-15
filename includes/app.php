<?php

require "config/database.php";
require __DIR__ . "../../vendor/autoload.php";
require "funciones.php";

//Conexion base de datos
$db = conectarDB();

use App\Viaje;

Viaje::setDB($db);


