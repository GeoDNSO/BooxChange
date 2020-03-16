<?php

include_once(__DIR__."/daos/DAOUsuario.php");
include_once(__DIR__."/daos/DAOLibro.php");
include_once(__DIR__."/daos/DAOCompras.php");
include_once(__DIR__."/constants.php");
include_once(__DIR__."/transfers/TLibro.php");

$has_session = (session_status() == PHP_SESSION_ACTIVE);
if(!$has_session){
    session_start();
}


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

    public function registrarUsuario($nombreUsuario, $nombreReal, $correo, $password, $fotoPerfil, $fechaNacimiento, $rol, $ciudad, $direccion, $fechaDeCreacion)
    {
        $bdBooxChange = DAOUsuario::getInstance();//Abrir/Inicializar base de datos
        return $bdBooxChange->registrarUsuario($nombreUsuario, $nombreReal, $correo, $password, $fotoPerfil, $fechaNacimiento, $rol, $ciudad, $direccion, $fechaDeCreacion);
        
    }

    //Los cambios se verán reflejados en $_SESSION
    public function logInUsuario($nombreUsuario, $password){
        $bdBooxChange = DAOUsuario::getInstance();

       // $password = password_verify($password, password_hash($password, PASSWORD_BCRYPT));
       echo "$password";
        //$TUsuario = $bdBooxChange->verificarInicioSesion($nombreUsuario, $password);

        $TUsuario = $bdBooxChange->verificarInicioSesion($nombreUsuario, $password);

        $this->guardarDatosUsuarioSesion($TUsuario);
        
        //Cerramos la base de datos antes de irnos.
        $bdBooxChange->closeBD();
    }

    private function guardarDatosUsuarioSesion($TUsuario){
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

            return true;
        }
        return false;
    }

    public function librosTienda(){
        $bdBooxChange = DAOLibro::getInstance();
        $librosTienda = $bdBooxChange->librosTienda();        
        $bdBooxChange->closeBD();
        return $librosTienda;
    }

    public function getLibroById($id){
        $bdBooxChange = DAOLibro::getInstance();
        $libro = $bdBooxChange->getLibroById($id);        
        $bdBooxChange->closeBD();
        return $libro;
    }

    public function procesarCompra($idUsuario, $libro, $ud, $numTarjeta){

        //Procesar la compra en libros
        $bdBooxChange = DAOLibro::getInstance();
        $bdBooxChange->procesarCompra($libro, $ud);  
        $bdBooxChange->closeBD();
        
        $idLibro = $libro->getIdLibro();
        $coste = $libro->getPrecio()*$ud;

        $bdBooxChange = DAOCompras::getInstance();
        $bdBooxChange->registrarCompra($idLibro, $idUsuario, $ud, $numTarjeta ,$coste);
        $bdBooxChange->closeBD();

        return $libro;
    }

    /*

    public function getUdLibro($id){
        $bdBooxChange = DAOLibro::getInstance();
        $libro = $bdBooxChange->getLibroById($id);        
        $bdBooxChange->closeBD();
        return $libro;
    }
    */


}

?>