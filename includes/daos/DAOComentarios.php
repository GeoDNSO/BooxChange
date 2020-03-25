<?php

namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\transfers\TComentario as TComentario;
class DAOComentarios extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOComentarios();
        ////    exit();
        }
        return self::$instance;
    }

    function anadirComentario($id_Usuario, $texto, $tituloDiscusion)
    {

      $sql = "SELECT Id_Discusion FROM Discusion WHERE titulo = $tituloDiscusion";
      $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

      if (mysqli_num_rows($consulta) == 1) {
          $fila = $consulta->fetch_array();
          $id = $fila['BD_DISCUSION_ID'];

          $sql2 = "INSERT INTO Comentarios (Id_usuario, Texto, Fecha, Id_Discusion)
                  VALUES ($id_Usuario, $texto, current_timestamp(), $id)";
                  mysqli_query(self::$instance->bdBooxChange, $sql2);
      }
}
    function eliminarComentario($id_Comentario, $id_usuario){
    $sql = "DELETE FROM Comentarios WHERE Id_Comentario = $id_Comentario AND  Id_Usuario = $id_usuario;";
    }

    function getAllComentarios($id_Discusion){
        $array = array();
        $sql = "SELECT * FROM Comentarios WHERE Id_Discusion = $id_Discusion";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        while( $fila = $consulta->fetch_array()){
              $TComentarios = new TComentario(
                $fila[BD_COMENTARIOS_ID],
                $fila[BD_COMENTARIOS_ID_USUARIO],
                $fila[BD_COMENTARIOS_TEXTO],
                $fila[BD_COMENTARIOS_FECHA],
                $fila[BD_COMENTARIOS_ID_DISCUSION]
                );
            $array[] = $TComentarios;
        }
        return $array;
    }
  }

?>
