<?php
namespace fdi\ucm\aw\booxchange\daos;


$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\transfers\TLibro as TLibro;

class DAOLibro extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOLibro();
        }
        return self::$instance;
    }

    public function librosTienda()
    {

        $sql = "SELECT * FROM libro WHERE libro.EnTienda = 1";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        $librosTienda = array();

        while ($fila = mysqli_fetch_array($consulta)) {
            $librosTienda[] = new TLibro(
                $fila[BD_LIBRO_ID_LIBRO],
                $fila[BD_LIBRO_TITULO],
                $fila[BD_LIBRO_AUTOR],
                $fila[BD_LIBRO_PRECIO],
                $fila[BD_LIBRO_VALORACION],
                $fila[BD_LIBRO_RANKING],
                $fila[BD_LIBRO_IMAGEN],
                $fila[BD_LIBRO_DESCRIPCIÓN],
                $fila[BD_LIBRO_GENERO],
                $fila[BD_LIBRO_EN_TIENDA],
                $fila[BD_LIBRO_FECHA],
                $fila[BD_LIBRO_IDIOMA],
                $fila[BD_LIBRO_EDITORIAL],
                $fila[BD_LIBRO_DESCUENTO],
                $fila[BD_LIBRO_UNIDADES],
                $fila[BD_LIBRO_FECHA_PUBLICACION]
            );
        }
        return $librosTienda;
    }

    public function getLibroById($id)
    {
        $sql = "SELECT * FROM libro WHERE libro.Id_Libro = $id";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();
            $libro = new TLibro(
                $fila[BD_LIBRO_ID_LIBRO],
                $fila[BD_LIBRO_TITULO],
                $fila[BD_LIBRO_AUTOR],
                $fila[BD_LIBRO_PRECIO],
                $fila[BD_LIBRO_VALORACION],
                $fila[BD_LIBRO_RANKING],
                $fila[BD_LIBRO_IMAGEN],
                $fila[BD_LIBRO_DESCRIPCIÓN],
                $fila[BD_LIBRO_GENERO],
                $fila[BD_LIBRO_EN_TIENDA],
                $fila[BD_LIBRO_FECHA],
                $fila[BD_LIBRO_IDIOMA],
                $fila[BD_LIBRO_EDITORIAL],
                $fila[BD_LIBRO_DESCUENTO],
                $fila[BD_LIBRO_UNIDADES],
                $fila[BD_LIBRO_FECHA_PUBLICACION]
            );
            return $libro;
        }

        return null;
    }

    public function procesarCompra($libro, $ud){
        $id = $libro->getIdLibro();
        $sql = "UPDATE libro SET unidades = unidades - $ud WHERE Id_Libro=$id";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        return $consulta;
    }
}

?>