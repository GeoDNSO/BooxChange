<?php

namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");

use fdi\ucm\aw\booxchange\transfers\TIntercambio;
use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio;
use fdi\ucm\aw\booxchange\transfers\TNotificacion as TNotificacion;
use fdi\ucm\aw\booxchange\transfers\TUsuario;

class DAONotificacion extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAONotificacion();
        }
        return self::$instance;
    }

    /**
     * @param TIntercambio $intercambioEncontrado intercambio realizado
     * @param TLibroIntercambio $libro1 libro que ha intercambiado el usuario
     * @param TLibroIntercambio $libro2 libro que va a recibir el usuario1
     * @param TUsuario $usuario1 usuario que recibe la notificación tras realizar el intercambio
     * @param TUsuario $usuario2 usuario con el que se ha realizado el intercambio
     * 
     * @return bool 
     */
    public function notificarUsuarioDeIntercambioMisterioso($intercambioEncontrado, $libro1, $libro2, $usuario1, $usuario2)
    {
        //self::$instance = new DAONotificacion();

        $idUsuario1 = $usuario1->getIdUsuario();
        $nombreUsuario = self::$instance->bdBooxChange->real_escape_string($usuario2->getNombreUsuario());
        $titulo1 = self::$instance->bdBooxChange->real_escape_string($libro1->getTitulo());
        $titulo2 = self::$instance->bdBooxChange->real_escape_string($libro2->getTitulo());
        //$texto = self::$instance->bdBooxChange->real_escape_string($texto);

        $mensaje = "Ya se ha completado su intercambio misterioso con el usuario $nombreUsuario, ha recibido el libro $titulo2 a cambio de su libro $titulo1. Que suerte!!! Accede a tus chats para comenzar a conversar con él y terminar el trato";
        $sql = "INSERT INTO `notificaciones` (`idUsuario`, `mensaje`, `leido`, `fecha`) VALUES ('$idUsuario1', '$mensaje', '0', current_timestamp());";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        return  $consulta;
    }

    public function notificarUsuarioDeIntercambioRealizado($intercambio, $libroQuerido, $libroOfertado, $usuario1, $usuario2)
    {
        $idUsuario1 = $usuario1->getIdUsuario();
        $nombreUsuario = self::$instance->bdBooxChange->real_escape_string($usuario2->getNombreUsuario());
        $titulo1 = self::$instance->bdBooxChange->real_escape_string($libroQuerido->getTitulo());
        $titulo2 = self::$instance->bdBooxChange->real_escape_string($libroOfertado->getTitulo());

        $mensaje = "Ya se ha completado el intercambio entre usted y $nombreUsuario, se han intercambiado los libros $titulo2 y $titulo1";
        $sql = "INSERT INTO `notificaciones` (`idUsuario`, `mensaje`, `leido`, `fecha`) VALUES ('$idUsuario1', '$mensaje', '0', current_timestamp());";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        return  $consulta;
    }



    public function notificarOferta($libroQuerido, $libroOfertado, $usuarioQuerido, $usuarioOfertado)
    {
        $idUsuarioQuerido = $usuarioQuerido->getIdUsuario();
        $idLibroQuerido = $libroQuerido->getIdLibroInter();
        $nombreUsuarioOfertado = $usuarioOfertado->getNombreUsuario();
        $tituloQuerido = $libroQuerido->getTitulo();
        $tituloOfertado = $libroOfertado->getTitulo();

        $mensaje = "El usuario $nombreUsuarioOfertado te ha ofrecido el libro $tituloOfertado por tu libro $tituloQuerido, puedes ver esta oferta ;y otras más, en detalle <a href='ofertasIntercambio.php?id=$idLibroQuerido'>aquí</a>.";
        $sql = "INSERT INTO `notificaciones` (`idUsuario`, `mensaje`, `leido`, `fecha`) VALUES ('$idUsuarioQuerido', \"$mensaje\", '0', current_timestamp());";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        return  $consulta;
    }


    public function notificarCompra($libro, $ud, $coste, $idUsuario)
    {
        $titulo = $libro->getTitulo();
        $idTitulo = $libro->getIdLibro();

        $mensaje = "";
        if ($ud == 1) {
            $mensaje = "Has comprado el libro <a href='libroTienda.php?id=$idTitulo'>$titulo</a> por $coste €, muchas gracias por su compra";
        } else {
            $mensaje = "Has comprado $ud unidades del libro <a href='libroTienda.php?id=$idTitulo'>$titulo</a> por $coste €, muchas gracias por su compra";
        }

        $sql = "INSERT INTO `notificaciones` (`idUsuario`, `mensaje`, `leido`, `fecha`) VALUES ('$idUsuario', \"$mensaje\", '0', current_timestamp());";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        return  $consulta;
    }

    public function notificarChatCreado($usuario1, $usuario2, $idchat, $iniciador)
    {
        $nombreUser1 = $usuario1->getNombreUsuario();
        $nombreUser2 = $usuario2->getNombreUsuario();

        $mensaje = "";
        $sql = "";
        if ($iniciador) {
            $idUsuario = $nombreUser1->getIdUsuario();
            $mensaje = "Has iniciado un chat con el usuario $nombreUser2, puedes hablar con él a través de este <a href='chat.php?idchat=$idchat'>enlace</a>";
            $sql = "INSERT INTO `notificaciones` (`idUsuario`, `mensaje`, `leido`, `fecha`) VALUES ('$idUsuario', \"$mensaje\", '0', current_timestamp());";
        } else {
            $idUsuario = $nombreUser2->getIdUsuario();
            $mensaje = "El usuario $nombreUser1 ha iniciado un chat contigo, puedes hablar con él a través de este <a href='chat.php?idchat=$idchat'>enlace</a>";
            $sql = "INSERT INTO `notificaciones` (`idUsuario`, `mensaje`, `leido`, `fecha`) VALUES ('$idUsuario', \"$mensaje\", '0', current_timestamp());";
        }

        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        return  $consulta;
    }



    //INSERT INTO `notificaciones` (`id`, `idUsuario`, `mensaje`, `leido`, `fecha`) VALUES (NULL, '5', 'asd', '1', current_timestamp());
    //INSERT INTO `notificaciones` (`id`, `idUsuario`, `mensaje`, `leido`, `fecha`) VALUES (NULL, '5', 'errwerw', '0', current_timestamp());

    public function getNumNotificacionesNoLeidas($id)
    {
        $sql = "SELECT COUNT(notificaciones.idUsuario) FROM notificaciones WHERE notificaciones.leido=0 AND idUsuario=$id";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();
            return $fila[0];
        } else {
            return null;
        }
    }

    public function getNotificaciones($id)
    {
        $sql = "SELECT * FROM notificaciones WHERE notificaciones.idUsuario=$id ORDER BY fecha DESC";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        $array = array();
        while ($fila = $consulta->fetch_array()) {
            $tNotificacion = new TNotificacion($fila[BD_NOTIFICACION_ID], $fila[BD_NOTIFICACION_ID_USUARIO], $fila[BD_NOTIFICACION_MENSAJE], $fila[BD_NOTIFICACION_LEIDO], $fila[BD_NOTIFICACION_FECHA]);
            $array[] = $tNotificacion;
        }
        return $array;
    }

    public function actualizarNotificacionesALeido($id)
    {
        $sql = "UPDATE notificaciones SET notificaciones.leido=1 WHERE notificaciones.idUsuario=$id AND notificaciones.leido=0";
        return mysqli_query(self::$instance->bdBooxChange, $sql);
    }
}
