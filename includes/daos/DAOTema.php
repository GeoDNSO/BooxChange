<?php

namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");

use fdi\ucm\aw\booxchange\transfers\TTema as TTema;

class DAOTema extends DAO
{

    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOTema();
        }
        return self::$instance;
    }

    function anadirTema($tema, $desc, $imagen)
    {
        $desc = self::$instance->bdBooxChange->real_escape_string($desc);
        $tema = self::$instance->bdBooxChange->real_escape_string($tema);
        $sql = "INSERT INTO tema (Tema, Descripcion, Imagen) VALUES ('$tema', '$desc', '$imagen')";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        return $consulta;
    }

    //Buscar generos

    public function getAllTemas()
    {
        $array = array();
        $sql = "SELECT * FROM tema";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        while ($fila = $consulta->fetch_array()) {
            $TTema = new TTema($fila[BD_TEMA], $fila[BD_TEMA_DESC], $fila[BD_TEMA_IMAGEN]);
            $array[] = $TTema;
        }

        return $array;
    }
}
