<?php

namespace App;

class Viaje {
    //Base de datos
    protected static $db;
    protected static $columnasDB= ['id', 'destino', 'precio', 'icono1', 'icono2', 'icono3',
                                    'descripcion', 'categoria','continente', 'imagen1', 'imagen2','imagen3',
                                    'aereos', 'traslado', 'hotel', 'excursiones'];

    //Incluye opciones
    public $incluye = [];
    //Errores
    protected static $errores = [];

    //Propiedades de la clase
    public $id;
    public $destino;
    public $precio;
    public $icono1;
    public $icono2;
    public $icono3;
    public $descripcion;
    public $categoria;
    public $continente;
    public $imagen1;
    public $imagen2;
    public $imagen3;
    public $aereos;
    public $traslado;
    public $hotel;
    public $excursiones;

    public function __construct($args = [])
        {
            $this -> id = $args['id'] ?? '';
            $this -> destino = $args['destino'] ?? '';
            $this -> precio = $args['precio'] ?? '';
            $this -> icono1 = $args['icono1'] ?? '';
            $this -> icono2 = $args['icono2'] ?? '';
            $this -> icono3 = $args['icono3'] ?? '';
            $this -> descripcion = $args['descripcion'] ?? '';
            $this -> categoria = $args['categoria'] ?? '';
            $this -> continente = $args['continente'] ?? '';
            $this -> imagen1 = $args['imagen1'] ?? '';
            $this -> imagen2 = $args['imagen2'] ?? '';
            $this -> imagen3 = $args['imagen3'] ?? '';
            $this -> aereos = $args['aereos'] ?? '';
            $this -> hotel = $args['hotel'] ?? '';
            $this -> excursiones = $args['excursiones'] ?? '';
        }
    
    public function guardar(){
        //Sanitizar atributos
        $atributos = $this->sanitizarAtributos();
        //Insertar en base de datos
        $query = "INSERT INTO viaje (";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ')";

        //debuger($query);
        $resultado = self::$db-> query($query);
        return $resultado;
    }

    //Conexion a la DB
    public static function setDB($database){
        //Self hace referencia a los atributos o propiedades estaticas, asi como this hace refrencia a las propiedades public
        self::$db = $database;
    }
    //Identifica y une los atributos de la base de datos
    public function atributos(){
        $atributos = [];
        foreach(self::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key=> $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //Subida de archivos de imagenes
    public function setImagen1($imagen1){
        if($imagen1){
            $this->icono1 = $imagen1;
        }
    }
    public function setImagen2($imagen2){
        if($imagen2){
            $this->icono2 = $imagen2;
        }
    }
    
    public function setImagen3($imagen3){
        if($imagen3){
            $this->icono3 = $imagen3;
        }
    }
    public function setImagen4($imagen3){
        if($imagen3){
            $this->imagen1 = $imagen3;
        }
    }
    public function setImagen5($imagen4){
        if($imagen4){
            $this->imagen2 = $imagen4;
        }
    }
    public function setImagen6($imagen5){
        if($imagen5){
            $this->imagen3 = $imagen5;
        }
    }

    //Validacion
    public static function getErrores(){
        return self::$errores;
    }

    //Agrego los valores en el array Incluye
    public function incluye(){
        if($this->aereos){
            $incluye[] = $this->aereos;
        }
        if($this->traslado){
            $incluye[] = $this->traslado;
        }
        if($this->hotel){
            $incluye[] = $this->hotel;
        }
        if($this->excursiones){
            $incluye[] = $this->excursiones;
        }
    }

    public function validar(){
        //Validacion de Formulario
        if(!$this->destino){
            self::$errores [] = "Agregar un Destino";
        }
        if(!$this->precio){
            self::$errores [] = "Agregar un Precio";
        }
        if(!$this->icono1){
            self::$errores [] = "Agregar un Icono1";
        }
        if(!$this->icono2){
            self::$errores [] = "Agregar un Icono2";
        }
        if(!$this->icono3){
            self::$errores [] = "Agregar un Icono3"; 
        }
        if(!$this->descripcion){
            self::$errores [] = "Agregar un Descripcion";
        }
        if(!$this->categoria){
            self::$errores [] = "Agregar un Categoria";
        }
        if(!$this->continente){
            self::$errores [] = "Agregar un Continente";
        }
        if(!$this->imagen1){
            self::$errores [] = "Agregar un Imagen1";
        }
        if(!$this->imagen2){
            self::$errores [] = "Agregar un Imagen2";
        }
        if(!$this->imagen3){
            self::$errores [] = "Agregar un Imagen3"; 
        }
        return self::$errores;
    }
};