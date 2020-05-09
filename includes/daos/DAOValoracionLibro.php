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

    public function valorarLibro($id, $valoracion, $idUsuario, $comentario){

        $comentario = self::$instance->bdBooxChange->real_escape_string($comentario);

        $sql = "SELECT * FROM valoracionlibro WHERE Id_Libro = $id AND Id_Usuario = $idUsuario";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        $sql2 = "";
        //El usuario ya ha valorado el libro
        if (mysqli_num_rows($consulta) == 1) {
            $sql2 = "UPDATE `valoracionlibro` SET `Valoracion` = '$valoracion', `Comentario` = '$comentario' WHERE `valoracionlibro`.`Id_Libro` = $id AND `valoracionlibro`.`Id_Usuario` = $idUsuario;";
        }else{//El usuario no lo ha valorado
            $sql2 = "INSERT INTO valoracionlibro (id_libro, id_usuario, valoracion, comentario) VALUES ($id, $idUsuario, $valoracion, '$comentario') ";
        }
  
        return mysqli_query(self::$instance->bdBooxChange, $sql2);

    }

    public function valoracionesLibro($idLibro){
        $sql = "SELECT * FROM valoracionlibro WHERE Id_Libro=$idLibro";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        $valoracionesLibro = array();

        while ($fila = mysqli_fetch_array($consulta)){
            $valoracionesLibro[] = new TValoracionLibro(
                $fila[BD_VALORACIONLIBRO_ID],
                $fila[BD_VALORACIONLIBRO_IDLIBRO],
                $fila[BD_VALORACIONLIBRO_IDUSUARIO],
                $fila[BD_VALORACIONLIBRO_VALORACION],
                $fila[BD_VALORACIONLIBRO_COMENTARIO]
            );
        }
        return $valoracionesLibro;
    }
}
?>