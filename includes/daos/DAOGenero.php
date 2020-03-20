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

    public function getAllGerns(){
        
    }

    function buscarGenerosporNombreGenero($idGenero){

    }

    //Actualizar Datos
    function eliminarGenero($idGenero){

    }

}

?>