<?php

namespace fdi\ucm\aw\booxchange;


require_once(__DIR__ . "/config.php");

use fdi\ucm\aw\booxchange\daos\DAO as DAO;
use fdi\ucm\aw\booxchange\daos\DAOChat as DAOChat;
use fdi\ucm\aw\booxchange\daos\DAOComentarios as DAOComentarios;
use fdi\ucm\aw\booxchange\daos\DAOCompras as DAOCompras;
use fdi\ucm\aw\booxchange\daos\DAODiscusion as DAODiscusion;
use fdi\ucm\aw\booxchange\daos\DAOFavoritos as DAOFavoritos;
use fdi\ucm\aw\booxchange\daos\DAOGenero as DAOGenero;
use fdi\ucm\aw\booxchange\daos\DAOGeneroLibro;
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
use fdi\ucm\aw\booxchange\transfers\TComentario;

$has_session = (session_status() == PHP_SESSION_ACTIVE);
if (!$has_session) {
    session_start();
}


class appBooxChange
{

    private static $instance;
    private $bdBooxChange;

    public function __construct()
    {
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
        $bdBooxChange = DAOUsuario::getInstance(); //Abrir/Inicializar base de datos
        return $bdBooxChange->registrarUsuario($nombreUsuario, $nombreReal, $correo, $password, $fotoPerfil, $fechaNacimiento, $rol, $ciudad, $direccion, $fechaDeCreacion);
    }

    public function actualizarPerfil($nombreUsuario, $nombreReal, $correo, $fotoPerfil, $ciudad, $direccion)
    {
        $bdBooxChange = DAOUsuario::getInstance();//Abrir/Inicializar base de datos
         
        $aux = $bdBooxChange->actualizarPerfil($nombreUsuario, $nombreReal, $correo, $fotoPerfil, $ciudad, $direccion);

        $_SESSION['nombreReal'] = $nombreReal;
        $_SESSION['correo'] = $correo;
        $_SESSION['fotoPerfil'] = $fotoPerfil;
        $_SESSION['ciudad'] = $ciudad;
        $_SESSION['direccion'] = $direccion;

        
        return $aux;
    }

    //Los cambios se verán reflejados en $_SESSION
    public function logInUsuario($nombreUsuario, $password)
    {
        $bdBooxChange = DAOUsuario::getInstance();

        $TUsuario = $bdBooxChange->verificarInicioSesion($nombreUsuario, $password);

        $this->guardarDatosUsuarioSesion($TUsuario);

        //Cerramos la base de datos antes de irnos.
        //$bdBooxChange->closeBD();
    }

    private function guardarDatosUsuarioSesion($TUsuario)
    {
        if ($TUsuario != NULL) {

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

    public function librosTienda()
    {
        $bdBooxChange = DAOLibro::getInstance();
        $librosTienda = $bdBooxChange->librosTienda();
        return $librosTienda;
    }

    public function getBooks()
    {
        $bdBooxChange = DAOLibro::getInstance();
        $libros = $bdBooxChange->getAllBooks();
        return $libros;
    }

    public function buscarPorTitulo($titulo){  
        $bdBooxChange = DAOLibro::getInstance();
        $libros = $bdBooxChange->findBookTitulo($titulo);
        return $libros;
    }

    public function getUsers()
    {
        $bdBooxChange = DAOUsuario::getInstance();
        $usuarios = $bdBooxChange->getAllUsers();
        return $usuarios;
    }

    public function getUserById($id)
    {
        $bdBooxChange = DAOUsuario::getInstance();
        $usuario = $bdBooxChange->getUserById($id);
        return $usuario;
    }

    public function getLibroById($id)
    {
        $bdBooxChange = DAOLibro::getInstance();
        $libro = $bdBooxChange->getLibroById($id);
        $bdBooxChange->closeBD();
        return $libro;
    }

    public function procesarCambiarRol($idUsuario, $rol)
    {
        $bdBooxChange = DAOUsuario::getInstance();
        return $bdBooxChange->actualizarRol($idUsuario, $rol);
    }

    public function procesarSubirLibro($titulolibro, $autor, $precio, $imagen, $descripcion, $generos, $enTienda, $idioma, $editorial, $descuento, $unidades, $fechaDePublicacion)
    {
        $bdBooxChange = DAOLibro::getInstance();
        $rst = $bdBooxChange->subirLibro($titulolibro, $autor, $precio, $imagen, $descripcion, $generos[0], $enTienda, $idioma, $editorial, $descuento, $unidades, $fechaDePublicacion);
        $idLibro = $bdBooxChange->lastInsertedId();

        $bdBooxChange = DAOGeneroLibro::getInstance();

        foreach($generos as $genero){
            $bdBooxChange->subirGeneroLibro($idLibro, $genero);
        }

        return $rst;
    }

    public function procesarModificarLibro($idLibro, $titulolibro, $autor, $precio, $imagen, $descripcion, $genero, $enTienda, $idioma, $editorial, $descuento, $unidades, $fechaDePublicacion)
    {
        $bdBooxChange = DAOLibro::getInstance();
        return $bdBooxChange->modificarLibro($idLibro, $titulolibro, $autor, $precio, $imagen, $descripcion, $genero, $enTienda, $idioma, $editorial, $descuento, $unidades, $fechaDePublicacion);
    }

    public function procesarBorrarLibro($idLibro)
    {
        $bdBooxChange = DAOLibro::getInstance();
        return $bdBooxChange->borrarLibro($idLibro);
    }

    public function procesarBorrarUsuario($idUsuario)
    {
        $bdBooxChange = DAOUsuario::getInstance();
        return $bdBooxChange->borrarUsuario($idUsuario);
    }

    public function procesarCompra($idUsuario, $libro, $ud, $numTarjeta)
    {

        //Procesar la compra en libros
        $bdBooxChange = DAOLibro::getInstance();
        $bdBooxChange->procesarCompra($libro, $ud);
        $bdBooxChange->closeBD();

        $idLibro = $libro->getIdLibro();
        $coste = $libro->getPrecio() * $ud;

        $bdBooxChange = DAOCompras::getInstance();
        $bdBooxChange->registrarCompra($idLibro, $idUsuario, $ud, $numTarjeta, $coste);
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
    public function subirLibroMisterioso($libroMisterioso)
    {

        //Subir libro misterioso
        $bdBooxChange = DAOLibroIntercambio::getInstance();
        $libroMisterioso = $bdBooxChange->subirLibro($libroMisterioso);


        if ($libroMisterioso == null) {
            return ERROR;
        }

        //Buscar si hay un libro disponible para intercambiar 
        $bdBooxChange = DAOIntercambios::getInstance();

        $idTargetUser = $libroMisterioso->getIdUsuario(); //Id del Usuario que quiere intercambiar un libro
        $intercambioEncontrado = $bdBooxChange->buscarIntercambioMisterioso($idTargetUser);


        //Segun el objeto intercambio que devuelva se hace una cosa u otra

        //Registrarlo en intercambios dependiendo de si se ha encontrado o no
        if ($intercambioEncontrado != null) {
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

            //Notificamos a ambos usuarios
            $bdBooxChange = DAONotificacion::getInstance();
            $bdBooxChange->notificarUsuarioDeIntercambioMisterioso($intercambioEncontrado, $libro1, $libroMisterioso, $usuario1, $usuario2);
            $bdBooxChange->notificarUsuarioDeIntercambioMisterioso($intercambioEncontrado, $libroMisterioso, $libro1, $usuario2, $usuario1);



            //Actualizar el valor de intercambiado de los libros intercambiados
            $bdBooxChange = DAOLibroIntercambio::getInstance();
            $bdBooxChange->actualizarLibroIntercambiado($libro1);
            $bdBooxChange->actualizarLibroIntercambiado($libroMisterioso);


            return INTERCAMBIO_ENCONTRADO;
        } else {
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

    public function construirSeleccionDeCategorias()
    {
        $bdBooxChange = DAOGenero::getInstance();

        $generos = $bdBooxChange->getAllGeneros();

        $selectGeneros = "";
        foreach ($generos as $genero) {
            $generoTexto = $genero->getGenero();
            $selectGeneros .= "<option value='$generoTexto'>$generoTexto</option>\n";
        }
        $bdBooxChange->closeBD();
        return $selectGeneros;
    }


    public function construirCheckBoxCategoria()
    {
        $bdBooxChange = DAOGenero::getInstance();

        $generos = $bdBooxChange->getAllGeneros();

        $checkBoxesGenero = "<div class='listaCategorias'>";
        foreach ($generos as $genero) {
            $generoTexto = $genero->getGenero();
            $checkBoxesGenero .= "<label class='checkBoxContainer'>$generoTexto";
            $checkBoxesGenero .= "<input type='checkbox' name='generos[]' value='$generoTexto'>";
            $checkBoxesGenero .= "<span class='checkmark'></span>";
            $checkBoxesGenero .= "</label>";
        }
        $checkBoxesGenero .= "</div>";

        return $checkBoxesGenero;
    }

    public function notificacionesUsuario($idUsuario)
    {
        $bdBooxChange = DAONotificacion::getInstance();
        $num = $bdBooxChange->getNumNotificacionesNoLeidas($idUsuario);
        //$bdBooxChange->closeBD();
        return $num;
    }
    public function valorarLibro($titulo, $valoracion, $idUsuario, $comentario){
        $bdBooxChange = DAOValoracionLibro::getInstance();
        $bdBooxChange->valorarLibro($titulo, $valoracion, $idUsuario, $comentario);

    }

    public function librosValoracion(){
        $bdBooxChange = DAOLibro::getInstance();
        $librosValoracion = $bdBooxChange->librosValoracion();
      //  $bdBooxChange->closeBD();
        return $librosValoracion;
    }

    public function temasForo(){
        $bdBooxChange = DAOTema::getInstance();
        $listaTemas = $bdBooxChange->getAllTemas();
        return $listaTemas;
    }

    public function discusionesTema($tema){
        $bdBooxChange = DAODiscusion::getInstance();
        //var_dump($tema);
        $listaDiscusionesTema = $bdBooxChange->getAllDiscusiones($tema);
        return $listaDiscusionesTema;
    }

     public function anadirTema($tema, $desc, $img) {
        $bdBooxChange = DAOTema::getInstance();
        $result = $bdBooxChange->anadirTema($tema, $desc, $img);
        return $result;
      }

    public function anadirDiscusion($id_Usuario_Creador, $tema, $titulo) {
        $bdBooxChange = DAODiscusion::getInstance();
        $result = $bdBooxChange->anadirDiscusion($id_Usuario_Creador, $tema, $titulo);
        return $result;
      }
    public function eliminarDiscusion($id_Discusion){
        $bdBooxChange = DAODiscusion::getInstance();
        return $bdBooxChange->eliminarDiscusion($id_Discusion);
      }

    public function comentariosDiscusion($id_Discusion){
        $bdBooxChange = DAOComentarios::getInstance();
        //var_dump($bdBooxChange);
        $listaComentariosDiscusion = $bdBooxChange->getAllComentarios($id_Discusion);
        return $listaComentariosDiscusion;
    }

    public function getDiscusionById($id)
    {
        $bdBooxChange = DAODiscusion::getInstance();
        $Discusion = $bdBooxChange->getDiscusionById($id);
        return $Discusion;
    }

    public function anadirComentario($id_Usuario, $texto, $idDiscusion) {
        $bdBooxChange = DAOComentarios::getInstance();
        $result = $bdBooxChange->anadirComentario($id_Usuario, $texto, $idDiscusion);
        return $result;
        //return $bdBooxChange->anadirComentario($id_Usuario, $texto, $idDiscusion);
      }

    public function eliminarComentario($id_Comentario, $id_usuario) {
        $bdBooxChange = DAOComentarios::getInstance();
        return $bdBooxChange->eliminarComentario($id_Comentario, $id_usuario);
      }


    public function getNotificaciones($id)
    {
        $bdBooxChange = DAONotificacion::getInstance();
        $notificaciones = $bdBooxChange->getNotificaciones($id);

        return $notificaciones;
    }

    public function notificacionesLeidas($id)
    {
        $bdBooxChange = DAONotificacion::getInstance();
        $bdBooxChange->actualizarNotificacionesALeido($id);
    }

    public function getLibrosIntercambiosDisponibles()
    {
        $bdBooxChange = DAOLibroIntercambio::getInstance();
        return $bdBooxChange->getLibrosIntercambiosDisponibles();
    }

    public function subirLibroIntercambio($libro)
    {
        //Se sube a la BD y se recibe el ID asignado para despues poder realizar el registro en intercambios
        $bdBooxChange = DAOLibroIntercambio::getInstance();
        $libro = $bdBooxChange->subirLibro($libro);


        //Registrarlo entre los intercambios
        $bdBooxChange = DAOIntercambios::getInstance();
        $result2 = $bdBooxChange->crearIntercambioNormal($libro);

        return $result2;
    }


    public function ofertasUsuario($idUsuario)
    {
        $bdBooxChange = DAOOfertasIntercambio::getInstance();
        return $bdBooxChange->getOfertas($idUsuario);
    }

    public function ofertasLibro($idLibro)
    {
        $bdBooxChange = DAOOfertasIntercambio::getInstance();
        return $bdBooxChange->getOfertasLibro($idLibro);
    }



    public function subirOfertaLibro($libroQuerido, $libroOfertado)
    {
        //Subimos el libro a la base de datos
        $bdBooxChange = DAOLibroIntercambio::getInstance();
        $libroOfertado = $bdBooxChange->subirLibro($libroOfertado);

        //Subimos la oferta a la base de datos
        $bdBooxChange = DAOOfertasIntercambio::getInstance();
        $result = $bdBooxChange->subirOferta($libroQuerido, $libroOfertado);

        $bdBooxChange = DAOUsuario::getInstance();
        $usuario = $bdBooxChange->getUserById($libroQuerido->getIdUsuario());

        //Notificamos al usuario del libro querido
        $bdBooxChange = DAONotificacion::getInstance();
        $bdBooxChange->notificarOferta($libroQuerido, $libroOfertado, $usuario);

        return $result;
    }

    public function getLibroIntercambio($id)
    {
        $bdBooxChange = DAOLibroIntercambio::getInstance();
        return $bdBooxChange->getLibro($id);
    }

    public function getNumOfertas($idLibro)
    {
        $bdBooxChange = DAOOfertasIntercambio::getInstance();
        return $bdBooxChange->getNumOfertas($idLibro);
    }

    public function procesarResultadoOferta($ofertaAceptada, $idOferta, $libroQuerido, $libroOfertado)
    {

        if ($ofertaAceptada == true) {
            //Actualizar el atributo intercambiado de los libros en la base de datos
            $bdBooxChange = DAOLibroIntercambio::getInstance();
            $bdBooxChange->actualizarLibroIntercambiado($libroQuerido);
            $bdBooxChange->actualizarLibroIntercambiado($libroOfertado);

            //Subir el intercambio a la base de datos
            $bdBooxChange = DAOIntercambios::getInstance();
            $intercambio = $bdBooxChange->buscarIntercambioPorLibro($libroQuerido->getIdLibroInter());
            $intercambio = $bdBooxChange->completarIntercambio($intercambio, $libroOfertado);

            //Notificamos a ambos usuarios
            $bdBooxChange = DAOUsuario::getInstance();
            $usuario1 = $bdBooxChange->buscarUsuarioPorId($libroQuerido->getIdUsuario());
            $usuario2 = $bdBooxChange->buscarUsuarioPorId($libroOfertado->getIdUsuario());

            $bdBooxChange = DAONotificacion::getInstance();
            $bdBooxChange->notificarUsuarioDeIntercambioRealizado($intercambio, $libroQuerido, $libroOfertado, $usuario1, $usuario2);
            $bdBooxChange->notificarUsuarioDeIntercambioRealizado($intercambio, $libroOfertado, $libroQuerido, $usuario2, $usuario1);
        } else {
            //Actualizar el atributo intercambiado de los libros en la base de datos a RECHAZADO
            $bdBooxChange = DAOLibroIntercambio::getInstance();
            $bdBooxChange->actualizarLibroRechazado($libroOfertado);
        }

        //Actualizar la oferta como rechazada o aceptada
        $bdBooxChange = DAOOfertasIntercambio::getInstance();
        $bdBooxChange->actualizarOferta($ofertaAceptada, $idOferta);
    }


    public function getTwoBooks() {
        $bdBooxChange = DAOLibro::getInstance();
        return $bdBooxChange->getTwoBooks();
    }

    public function getChatsFromUser($idUser)
    {
        $bdBooxChange = DAOChat::getInstance();
        return $bdBooxChange->getChatsFromUser($idUser);
    }
    
}
