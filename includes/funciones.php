<?php 

define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');


function debuger($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Escapa / Sanitizar el HTML

function sanitizar($html){
    $sanitizar = htmlspecialchars($html);
    return $sanitizar;
}

?>