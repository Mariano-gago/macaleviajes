<?php

namespace App;

class Viaje {
    //Base de datos
    protected static $db;
    protected static $columnasDB= ['idViaje', 'destino', 'precio', 'icono1', 'icono2', 'icono3',
                                    'descripcion', 'categoria','continente', 'imagen1', 'imagen2','imagen3',
                                    'aereos', 'traslado', 'hotel', 'excursiones'];

    //Incluye opciones
    public $incluye = [];
    //Errores
    protected static $errores = [];

    //Propiedades de la clase
    public $idViaje;
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
            $this -> idViaje = $args['idViaje'] ?? '';
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
            $this -> traslado = $args['traslado'] ?? '';
            $this -> hotel = $args['hotel'] ?? '';
            $this -> excursiones = $args['excursiones'] ?? '';
        }
    

    public function guardar(){
        if(!is_null($this->idViaje)){
            //Crea nuevo registro
            $this->crear();
        }else{
            //Actualizar
            $this->actualizar();
        }
    }


    public function crear(){
        //Sanitizar atributos
        $atributos = $this->sanitizarAtributos();
        //Insertar en base de datos
        $query = "INSERT INTO viaje (";
        $query .= join(', ',array_keys($atributos));
        $query .= " ) VALUES ('"; 
        $query .= join("','",array_values($atributos));
        $query .= "')";
        $resultado = self::$db-> query($query);
        
        if($resultado){
            header('Location: ../?registrado=1');
            }
    }

    public function actualizar(){
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key =>$value){
            $valores[] = "{$key}='{$value}'";

        }
        $query = " UPDATE viaje SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE idViaje = '" . self::$db->escape_string($this->idViaje) . "' ";

        $resultado = self::$db->query($query);
        
        return $resultado;
        
    }

    //Conexion a la DB
    public static function setDB($database){
        //Self hace referencia a los atributos o propiedades estaticas, asi como this hace refrencia a las propiedades public
        self::$db = $database;
    }

    //Eliminar un registro
    public function eliminar(){
        $query = "DELETE FROM viaje WHERE idViaje = " . self::$db->escape_string($this->idViaje) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado){
            unlink(CARPETA_IMAGENES . $this->icono1);
            unlink(CARPETA_IMAGENES . $this->icono2);
            unlink(CARPETA_IMAGENES . $this->icono3);
            unlink(CARPETA_IMAGENES . $this->imagen1);
            unlink(CARPETA_IMAGENES . $this->imagen2);
            unlink(CARPETA_IMAGENES . $this->imagen3);
            
            header('location: ../admin?registrado=3');
        }
    }
    //Identifica y une los atributos de la base de datos
    public function atributos(){
        $atributos = [];
        foreach(self::$columnasDB as $columna){
            if($columna === 'idViaje') continue;
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
    public function setImagen1($nombreIcono1){
        //Recibe un nombre de imagen
        //Elimina imagen anterior
        if($this->idViaje){
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->icono1);
            if($existeArchivo){
                unlink(CARPETA_IMAGENES . $this->icono1);
            }
        }
        //Asgina el nombre a la imagen
        if($nombreIcono1){
            $this->icono1 = $nombreIcono1;
        }
    }

    public function setImagen2($nombreIcono2){
        if($this->idViaje){
            //Comprobar si existe
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->icono2);
            if($existeArchivo){
                unlink(CARPETA_IMAGENES . $this->icono2);
            }
        }
        if($nombreIcono2){
            $this->icono2 = $nombreIcono2;
        }
    }
    
    public function setImagen3($nombreIcono3){
        if($this->idViaje){
            //Comprobar si existe
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->icono3);
            if($existeArchivo){
                unlink(CARPETA_IMAGENES . $this->icono3);
            }
        }
        if($nombreIcono3){
            $this->icono3 = $nombreIcono3;
        }
    }
    public function setImagen4($nombreImagen1){
        if($this->idViaje){
            //Comprobar si existe
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen1);
            if($existeArchivo){
                unlink(CARPETA_IMAGENES . $this->imagen1);
            }
        }
        if($nombreImagen1){
            $this->imagen1 = $nombreImagen1;
        }
    }
    public function setImagen5($nombreImagen2){
        if($this->idViaje){
            //Comprobar si existe
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen2);
            if($existeArchivo){
                unlink(CARPETA_IMAGENES . $this->imagen2);
            }
        }
        if($nombreImagen2){
            $this->imagen2 = $nombreImagen2;
        }
    }
    public function setImagen6($nombreImagen3){
        if($this->idViaje){
            //Comprobar si existe
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen3);
            if($existeArchivo){
                unlink(CARPETA_IMAGENES . $this->imagen3);
            }
        }
        if($nombreImagen3){
            $this->imagen3 = $nombreImagen3;
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

    //Muestra los viajes
    public static function all(){
        $query = " SELECT * FROM viaje";
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function destacado(){
        $query = " SELECT * FROM viaje WHERE categoria = 'destacado'";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    
    //Buscar por id
    public static function find($idViaje){
        $query = "SELECT * FROM viaje WHERE idViaje = ${idViaje}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        //Consultar base de datos
        $resultado = self::$db->query($query);
        //Iterar resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }
        //liberar memoria
        $resultado -> free();
        //retornar resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new self;

        foreach($registro as $key =>$value){
            if(property_exists($objeto, $key)){
                $objeto->$key  = $value;

            }
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria
    public function sincronizar($args = []){
        foreach($args as $key=>$value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
};