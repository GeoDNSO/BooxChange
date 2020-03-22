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
use fdi\ucm\aw\booxchange\daos\DAOIntercambios;
use fdi\ucm\aw\booxchange\daos\DAOLibro as DAOLibro;
use fdi\ucm\aw\booxchange\daos\DAOLibroIntercambio as DAOLibroIntercambio;
use fdi\ucm\aw\booxchange\daos\DAOMensajeChat as DAOMensajeChat;
use fdi\ucm\aw\booxchange\daos\DAONotificacion;
use fdi\ucm\aw\booxchange\daos\DAOTema as DAOTema;
use fdi\ucm\aw\booxchange\daos\DAOUsuario as DAOUsuario;
use fdi\ucm\aw\booxchange\daos\DAOValoracionLibro as DAOValoracionLibro;
use fdi\ucm\aw\booxchange\daos\DAOOfertasIntercambio as DAOOfertasIntercambio;


use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio;
use fdi\ucm\aw\booxchange\transfers\TIntercambio;
use fdi\ucm\aw\booxchange\transfers\TNotificacion;
use fdi\ucm\aw\booxchange\transfers\TOfertasIntercambio;
use fdi\ucm\aw\booxchange\transfers\TUsuario;

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

    /**
     * 
     * @param TLibroIntercambio $libroMisterioso libro con información incompleta
     * que se va a guardar en la base de datos para intercambiar
     * 
     * @return int devuelve un entero según se haya producido la subida del libro que viene acompañada con intercambio
     * si el valor devuelto es -1 que es que hubo un error durante la ejecución de la consulta, si es 0 es que no se ha podido 
     * encontrar un libro para intercambiar y si es 1 es que se ha encontrado y se ha intercambiado el libro
     */
    public function subirLibroMisterioso($libroMisterioso){

        //Subir libro misterioso
        $bdBooxChange = DAOLibroIntercambio::getInstance();
        $libroMisterioso = $bdBooxChange->subirLibroMisterioso($libroMisterioso);  
        

        if($libroMisterioso == null){
            return ERROR;
        }

        //Buscar si hay un libro disponible para intercambiar 
        $bdBooxChange = DAOIntercambios::getInstance();

        $idTargetUser = $libroMisterioso->getIdUsuario(); //Id del Usuario que quiere intercambiar un libro
        $intercambioEncontrado = $bdBooxChange->buscarIntercambioMisterioso($idTargetUser);  
        

        //Segun el objeto intercambio que devuelva se hace una cosa u otra

        //Registrarlo en intercambios dependiendo de si se ha encontrado o no
        if($intercambioEncontrado != null){
            $bdBooxChange = DAOIntercambios::getInstance();
            $intercambioEncontrado = $bdBooxChange->completarIntercambio($intercambioEncontrado, $libroMisterioso);
            
            //Si hay intercambio, se notifica al "primer" usuario

            //Conseguir id del primer usuario a partir del intercambio
            $usuario1 = "";
            $libro1 = "";
            $id = $this->getUserIdFromTrade($intercambioEncontrado, $libro1, $usuario1);

            //Notificamos al usuario que inicio el intercambio misterioso
            $bdBooxChange = DAOUsuario::getInstance();
            $usuario2 = $bdBooxChange->buscarUsuarioPorId($_SESSION["id_Usuario"]);    
            

            $bdBooxChange = DAONotificacion::getInstance();
            $notBien = $bdBooxChange->notificarUsuarioDeIntercambioMisterioso($intercambioEncontrado, $libro1, $libroMisterioso, $usuario1, $usuario2);
            
            
            if($notBien == false){
                exit("Algo ha salido mal en las notficaciones");
            }

            //Actualizar el valor de intercambiado de los libros intercambiados
            $bdBooxChange = DAOLibroIntercambio::getInstance();
            $bdBooxChange->actualizarLibroIntercambiado($libro1);
            $bdBooxChange->actualizarLibroIntercambiado($libroMisterioso);
            

            return INTERCAMBIO_ENCONTRADO;
        }
        else{
            $bdBooxChange = DAOIntercambios::getInstance();
            $bdBooxChange->crearIntercambioMisterioso($libroMisterioso); 
            
            return INTERCAMBIO_NO_ENCONTRADO;
        }
    }

    /**
     * @param TIntercambio $intercambio intercambio del que se busca el libro y el usuario inicial
     * @param TLibroIntercambio $libro1 libro del usuario que inició el intercambio
     * @param TUsuario $usuario1 usuario que inició el intercambio
     * @return int id del usuario1
     */
    private function getUserIdFromTrade($intercambio, &$libro1, &$usuario1)
    {

        $bdBooxChange = DAOLibroIntercambio::getInstance();
        $libro1 = $bdBooxChange->getLibro($intercambio->getIdLibro1());
        

        $bdBooxChange = DAOUsuario::getInstance();
        $usuario1 = $bdBooxChange->buscarUsuarioPorId($libro1->getIdUsuario());
        

        return $usuario1->getIdUsuario();
    }

    public function construirSeleccionDeCategorias(){
        $bdBooxChange = DAOGenero::getInstance();
        
        $generos = $bdBooxChange->getAllGeneros();
    
        $selectGeneros = "";
        foreach($generos as $genero){
            $generoTexto = $genero->getGenero();
            $selectGeneros .= "<option value='$generoTexto'>$generoTexto</option>\n";
        }
        $bdBooxChange->closeBD();
        return $selectGeneros;
    }

    public function notificacionesUsuario($idUsuario){
        $bdBooxChange = DAONotificacion::getInstance();
        $num = $bdBooxChange->getNumNotificacionesNoLeidas($idUsuario);
        //$bdBooxChange->closeBD();
        return $num;
    }




}
