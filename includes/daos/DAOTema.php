<?php

namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\transfers\TTema as TTema;
class DAOTema extends DAO{

    private static $instance;

    function __construct(){
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOTema();
        }
        return self::$instance;
    }

    function anadirTema($tema)
    {
          $sql = "INSERT INTO tema (Tema) VALUES ('$tema')";
          $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
          return $consulta;
    }

    //Buscar generos

    public function getAllTemas(){
        $array = array();
        $sql = "SELECT * FROM tema";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        while( $fila = $consulta->fetch_array()){
            $TTema = new TTema($fila[BD_TEMA]);
            $array[] = $TTema;
        }
        return $array;
    }
}
?>
