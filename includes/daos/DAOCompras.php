<?php

namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");
//include_once($parentDir . "/transfers/TLibro.php");
//include_once($parentDir . "/transfers/TCompra.php");
//include_once($parentDir . "/constants.php");
//include_once(__DIR__ . "/DAO.php");

use fdi\ucm\aw\booxchange\transfers\TCompra as TCompra;

class DAOCompras extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOCompras();
        }
        return self::$instance;
    }

    public function registrarCompra($idLibro, $idUsuario, $ud, $numTarjeta, $coste){
        $sql = "INSERT INTO `compras` (`id`, `idUsuario`, `idLibro`, `unidades`, `numTarjeta`, `coste`) VALUES (NULL, '$idUsuario', '$idLibro', '$ud', '$numTarjeta', '$coste');";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        return $consulta;
    }
}
