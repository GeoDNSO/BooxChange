<?php

namespace fdi\ucm\aw\booxchange;

//include_once(__DIR__."/daos/DAOUsuario.php");
//include_once(__DIR__."/daos/DAOLibro.php");
//include_once(__DIR__."/daos/DAOCompras.php");
//include_once(__DIR__."/constants.php");
//include_once(__DIR__."/transfers/TLibro.php");

//use fdi\ucm\aw\booxchange\DAOLibro as DAOLibro;

require_once(__DIR__."/config.php");

use fdi\ucm\aw\booxchange\daos\DAO as DAO;
use fdi\ucm\aw\booxchange\daos\DAOChat as DAOChat;
use fdi\ucm\aw\booxchange\daos\DAOComentarios as DAOComentarios;
use fdi\ucm\aw\booxchange\daos\DAOCompras as DAOCompras;
use fdi\ucm\aw\booxchange\daos\DAODiscusion as DAODiscusion;
use fdi\ucm\aw\booxchange\daos\DAOFavoritos as DAOFavoritos;
use fdi\ucm\aw\booxchange\daos\DAOGenero as DAOGenero;
use fdi\ucm\aw\booxchange\daos\DAOIntercambio as DAOIntercambio;
use fdi\ucm\aw\booxchange\daos\DAOLibro as DAOLibro;
use fdi\ucm\aw\booxchange\daos\DAOLibroIntercambio as DAOLibroIntercambio;
use fdi\ucm\aw\booxchange\daos\DAOMensajeChat as DAOMensajeChat;
use fdi\ucm\aw\booxchange\daos\DAOTema as DAOTema;
use fdi\ucm\aw\booxchange\daos\DAOUsuario as DAOUsuario;
use fdi\ucm\aw\booxchange\daos\DAOValoracionLibro as DAOValoracionLibro;

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

    public function actualizarPerfil($idUsuario, $nombreReal, $correo, $password, $fotoPerfil, $ciudad, $direccion)
    {
        $bdBooxChange = DAOUsuario::getInstance();//Abrir/Inicializar base de datos
        return $bdBooxChange->actualizarPerfil($idUsuario, $nombreReal, $correo, $password, $fotoPerfil, $ciudad, $direccion);
        
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
            $_SESSION['id_Usuario'] = $TUsuario->getIdUsuario();
            $_SESSION['nombre'] =  $TUsuario->getNombreUsuario();
            $_SESSION['nombreReal'] = $TUsuario->getNombreReal();
            $_SESSION['password'] = $TUsuario->getPassword();
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

    public function getBooks(){
        $bdBooxChange = DAOLibro::getInstance();
        $libros = $bdBooxChange->getAllBooks();        
        $bdBooxChange->closeBD();
        return $libros;
    }

    public function getUsers(){
        $bdBooxChange = DAOUsuario::getInstance();
        $usuarios = $bdBooxChange->getAllUsers();        
        $bdBooxChange->closeBD();
        return $usuarios;
    }

    public function getUserById($id){
        $bdBooxChange = DAOUsuario::getInstance();
        $usuario = $bdBooxChange->getUserById($id);        
        $bdBooxChange->closeBD();
        return $usuario;
    }

    public function getLibroById($id){
        $bdBooxChange = DAOLibro::getInstance();
        $libro = $bdBooxChange->getLibroById($id);        
        $bdBooxChange->closeBD();
        return $libro;
    }

    public function procesarCambiarRol($idUsuario, $rol){
        $bdBooxChange = DAOUsuario::getInstance();
        return $bdBooxChange->actualizarRol($idUsuario, $rol);
    }

    public function procesarSubirLibro($titulolibro ,$autor, $precio, $imagen, $descripcion, $genero, $enTienda, $fecha, $idioma, $editorial, $descuento, $unidades){
        $bdBooxChange = DAOLibro::getInstance();
        return $bdBooxChange->subirLibro($titulolibro ,$autor, $precio, $imagen, $descripcion, $genero, $enTienda, $fecha, $idioma, $editorial, $descuento, $unidades);
    }

    public function procesarModificarLibro($idLibro, $titulolibro ,$autor, $precio, $imagen, $descripcion, $genero, $enTienda, $idioma, $editorial, $descuento, $unidades){
        $bdBooxChange = DAOLibro::getInstance();
        return $bdBooxChange->modificarLibro($idLibro, $titulolibro ,$autor, $precio, $imagen, $descripcion, $genero, $enTienda, $idioma, $editorial, $descuento, $unidades);
    }

    public function procesarBorrarLibro($idLibro) {
        $bdBooxChange = DAOLibro::getInstance();
        return $bdBooxChange->borrarLibro($idLibro);
    }

    public function procesarBorrarUsuario($idUsuario) {
        $bdBooxChange = DAOUsuario::getInstance();
        return $bdBooxChange->borrarUsuario($idUsuario);
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