<?php

namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");

use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio as TLibroIntercambio;
use mysqli;

class DAOLibroIntercambio extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOLibroIntercambio();
        }
        return self::$instance;
    }

    /**
     * @param TLibroIntercambio
     * Se almacena el libro en la base de datos
     * @return TLibroIntercambio o nulo si hubo algun problema con la consulta
     */
    public function subirLibroMisterioso($libroMisterioso)
    {
        $autor = $libroMisterioso->getAutor();
        $idUser = $libroMisterioso->getIdUsuario();
        $imagen = $libroMisterioso->getImagen();
        $titulo = $libroMisterioso->getTitulo();
        $desc = $libroMisterioso->getDescripcion();
        $genero = $libroMisterioso->getGenero();
        $intercambiado = $libroMisterioso->getIntercambiado();
        $esOferta = $libroMisterioso->getOfertado();

        //id y fecha tiene valores por defecto y automaticos
        $sql = "INSERT INTO `librointercambio` (`Id_Libro_Inter`, `AutorLibInter`, `Imagen`, `Descripcion`, `Genero`, `Id_Usuario`, `Titulo`, `Intercambiado`, `esOferta`, `Fecha`) 
                VALUES ('', '$autor', '$imagen', '$desc', '$genero', '$idUser', '$titulo', '$intercambiado', '$esOferta', current_timestamp());";

        if (mysqli_query(self::$instance->bdBooxChange, $sql) == true) {
            $id = self::$instance->bdBooxChange->insert_id;
            return $this->getLibro($id);
            /*
            $sql = "SELECT * FROM librointercambio WHERE librointercambio.Id_Libro_Inter = $id";
            $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

            if (mysqli_num_rows($consulta) == 1) {
                $fila = $consulta->fetch_array();
                $libro = new TLibroIntercambio($fila[BD_LIBRO_INTER_ID], $fila[BD_LIBRO_INTER_ID_USER], $fila[BD_LIBRO_INTER_TITULO], $fila[BD_LIBRO_INTER_IMG], $fila[BD_LIBRO_INTER_AUTOR], $fila[BD_LIBRO_INTER_DESCRIPCION], $fila[BD_LIBRO_INTER_GENERO], $fila[BD_LIBRO_INTER_INTERCAMBIADO], $fila[BD_LIBRO_INTER_ES_OFERTA], $fila[BD_LIBRO_INTER_FECHA]);
                return $libro;
            } else {
                return null;
            }
            */
        }

        return null;
    }

    public function getLibro($id)
    {
        $sql = "SELECT * FROM librointercambio WHERE librointercambio.Id_Libro_Inter = $id";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();
            $libro = new TLibroIntercambio($fila[BD_LIBRO_INTER_ID], $fila[BD_LIBRO_INTER_ID_USER], $fila[BD_LIBRO_INTER_TITULO], $fila[BD_LIBRO_INTER_IMG], $fila[BD_LIBRO_INTER_AUTOR], $fila[BD_LIBRO_INTER_DESCRIPCION], $fila[BD_LIBRO_INTER_GENERO], $fila[BD_LIBRO_INTER_INTERCAMBIADO], $fila[BD_LIBRO_INTER_ES_OFERTA], $fila[BD_LIBRO_INTER_FECHA]);
            return $libro;
        } else {
            return null;
        }
    }


     /**
     * @param TLibroIntercambio
     * Se actualiza el libro como intercambiado en la base de datos
     * @return bool 
     */
    public function actualizarLibroIntercambiado($libro){

        $idLibro = $libro->getIdLibroInter();
        $sql = "UPDATE `librointercambio` SET `Intercambiado` = '1' WHERE `librointercambio`.`Id_Libro_Inter` = $idLibro;";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        return $consulta;
    }
}
?>