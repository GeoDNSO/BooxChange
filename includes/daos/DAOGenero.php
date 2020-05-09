<?php
namespace fdi\ucm\aw\booxchange\daos;


$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");


use fdi\ucm\aw\booxchange\transfers\TGenero as TGenero;
//include_once("../transfers/TGenero.php");
//include_once("DAO.php");

class DAOGenero extends DAO{

    private static $instance;

    function __construct(){
        parent::__construct();
    }
    
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOGenero();
        }
        return self::$instance;
    }
    
    //Buscar generos

    public function getAllGeneros(){
        $array = array();
        $sql = "SELECT * FROM genero";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        while( $fila = $consulta->fetch_array()){
            $TGenero = new TGenero($fila[BD_GENERO_GENERO]);
            $array[] = $TGenero;
        }
        return $array;
    }


    

    function buscarGenerosporNombreGenero($idGenero){

    }

    //Actualizar Datos
    function eliminarGenero($idGenero){

    }

}

?>