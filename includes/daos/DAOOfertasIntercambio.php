<?php
namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\transfers\TOfertasIntercambio as TOfertasIntercambio;
use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio;


class DAOOfertasIntercambio extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOOfertasIntercambio();
        }
        return self::$instance;
    }

    //INSERT INTO `ofertasintercambio` (`id`, `idLibroIntercambio`, `idLibroOferta`, `ofertaAceptada`) VALUES (NULL, '3', '48', NULL);
    
    public function subirOferta($libroQuerido, $libroOfertado)
    {
        $idLibroQuerido = $libroQuerido->getIdLibroInter();
        $idLibroOfertado = $libroOfertado->getIdLibroInter();
        $estado = OFERTA_DISPONIBLE;

        $sql = "INSERT INTO `ofertasintercambio` (`id`, `idLibroIntercambio`, `idLibroOferta`, `ofertaAceptada`)
                 VALUES (NULL, '$idLibroQuerido', '$idLibroOfertado', $estado);";
        
        return mysqli_query(self::$instance->bdBooxChange, $sql);
    }

    public function actualizarOferta($ofertaAceptada, $idOferta){

        $opt = ($ofertaAceptada == true) ? "1" : "0";
        $sql = "UPDATE `ofertasintercambio` SET `ofertaAceptada` = '$opt' WHERE `ofertasintercambio`.`id` = $idOferta;";
        
        return mysqli_query(self::$instance->bdBooxChange, $sql);
    }


    //SELECT DISTINCT id, idLibroIntercambio FROM ofertasintercambio JOIN librointercambio ON ofertasintercambio.idLibroIntercambio=librointercambio.Id_Libro_Inter WHERE librointercambio.Id_Usuario=6
    public function getOfertas($idUsuario)
    {
        $sql = "SELECT DISTINCT id, idLibroIntercambio FROM ofertasintercambio 
                JOIN librointercambio ON ofertasintercambio.idLibroIntercambio=librointercambio.Id_Libro_Inter 
                WHERE librointercambio.Id_Usuario=$idUsuario;";
        
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        $array = array();
        while( $fila = $consulta->fetch_array()){
            $tOferta = new TOfertasIntercambio($fila[BD_OFERTA_INTER_ID], $fila[BD_OFERTA_INTER_ID_LIBRO_INTER], null, null);
            $array[] = $tOferta;
        }
                
        return $array;

    }

    public function getOfertasLibro($id)
    {
        $vDisponible = OFERTA_DISPONIBLE;
        $sql = "SELECT * FROM ofertasintercambio 
                JOIN librointercambio ON ofertasintercambio.idLibroIntercambio=librointercambio.Id_Libro_Inter 
                WHERE librointercambio.Id_Libro_Inter=$id AND ofertasintercambio.ofertaAceptada=$vDisponible;";
        
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        $array = array();
        while( $fila = $consulta->fetch_array()){
            $tOferta = new TOfertasIntercambio($fila[BD_OFERTA_INTER_ID], $fila[BD_OFERTA_INTER_ID_LIBRO_INTER], $fila[BD_OFERTA_INTER_ID_LIBRO_OFERTA], $fila[BD_OFERTA_INTER_OFERTA_ACEPTADA]);
            $array[] = $tOferta;
        }
                
        return $array;

    }

    public function getNumOfertas($idLibro)
    {
        $sql = "SELECT COUNT(idLibroIntercambio) FROM ofertasintercambio WHERE ofertaAceptada = 2 AND ofertasintercambio.idLibroIntercambio=$idLibro";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();
            return $fila[0];
        } else {
            return null;
        }
    }

}



?>