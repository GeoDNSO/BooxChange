<?php

session_start();

include_once("../daos/DAOUsuario.php");

class appBooxChange{

    private static $instance;
    private $bdBooxChange;

    public function __construct(){
        
    }
    
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new appBooxChange();
        }
        return self::$instance;
    }

    //Funciones que interactuen con las BD

    public function registrarUsuario($idUsuario, $nombreUsuario, $nombreReal, $correo, $password, $fotoPerfil, $fechaNacimiento, $rol, $ciudad, $direccion, $fechaDeCreacion)
    {
        $bdBooxChange = DAOUsuario::getInstance();//Abrir/Inicializar base de datos

        
        $bdBooxChange->closeBD();//Cerrar base de datos
    }

    //Los cambios se verán reflejados en $_SESSION
    public function logInUsuario($nombreUsuario, $password){
        $bdBooxChange = DAOUsuario::getInstance();
        $TUsuario = $bdBooxChange->verificarInicioSesion($nombreUsuario, $password);

        if ($TUsuario!= NULL){

            $_SESSION['login'] = true;
            $_SESSION['nombre'] =  $TUsuario->getNombreUsuario();
            $_SESSION['nombreReal'] = $TUsuario->getNombreReal();
            $_SESSION['correo'] = $TUsuario->getCorreo();
            $_SESSION['fotoPerfil'] = $TUsuario->getFotoPerfil();
            $_SESSION['ciudad'] = $TUsuario->getCiudad();
            $_SESSION['direccion'] = $TUsuario->getDireccion();
            $_SESSION['fechaDeCreacion'] = $TUsuario->getFechaDeCreacion();
            $_SESSION['rol'] = $TUsuario->getRol();

            $_SESSION['usuario'] = serialize($TUsuario);


        }
        //Cerramos la base de datos antes de irnos.
        $bdBooxChange->closeBD();
    }


}

?>