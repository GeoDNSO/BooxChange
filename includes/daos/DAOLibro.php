<?php

$parentDir = dirname(__DIR__, 1);
include_once($parentDir."/transfers/TLibro.php");
include_once($parentDir."/constants.php");
include_once(__DIR__."/DAO.php");

class DAOLibro extends DAO{
    private static $instance;

    function __construct(){
        parent::__construct();
    }
    
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOLibro();
        }
        return self::$instance;
    }

    public function librosTienda(){

        $sql = "SELECT * FROM libro WHERE libro.EnTienda = 1";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        $librosTienda = array();

        while($fila = mysqli_fetch_array($consulta)){
            $librosTienda[] = new TLibro($fila[BD_LIBRO_ID_LIBRO], $fila[BD_LIBRO_TITULO], $fila[BD_LIBRO_AUTOR], $fila[BD_LIBRO_PRECIO], 
                                        $fila[BD_LIBRO_VALORACION], $fila[BD_LIBRO_RANKING], $fila[BD_LIBRO_IMAGEN], 
                                        $fila[BD_LIBRO_DESCRIPCIÓN], $fila[BD_LIBRO_GENERO], $fila[BD_LIBRO_EN_TIENDA], 
                                        $fila[BD_LIBRO_FECHA], $fila[BD_LIBRO_IDIOMA], $fila[BD_LIBRO_EDITORIAL], $fila[BD_LIBRO_DESCUENTO]);
        }
        
        return $librosTienda;
    }

}

?>