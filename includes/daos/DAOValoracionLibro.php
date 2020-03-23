<?php

namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\transfers\TValoracionLibro as TValoracionLibro;


class DAOValoracionLibro extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOValoracionLibro();
        }
        return self::$instance;
    }

    public function valorarLibro($titulo, $valoracion, $idUsuario){

        $sql = "SELECT id_libro FROM libro WHERE titulo = $titulo";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();
            $id = $fila['id_libro'];

            $sql2 = "INSERT INTO valoracionlibro ('id_libro', 'id_usuario', 'valoracion')
                    VALUES ('$id', '$idUsuario', '$valoracion')";
            mysqli_query(self::$instance->bdBooxChange, $sql2);
        }

        }

}
?>