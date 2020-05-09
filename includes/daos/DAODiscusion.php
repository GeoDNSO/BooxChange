<?php
namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\transfers\TDiscusion as TDiscusion;
class DAODiscusion extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAODiscusion();
        }
        return self::$instance;
    }

    function anadirDiscusion($id_Usuario_Creador, $tema, $titulo)
    {
        $sql = "INSERT INTO Discusion (id_Usuario_Creador, Fecha, Tema, Titulo, NumComentarios, NumVisitas) VALUES
                              ('$id_Usuario_Creador', current_timestamp(), '$tema', '$titulo', 0, 0)";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
    }

    function eliminarDiscusion($id_Discusion){
    $sql = "DELETE FROM Discusion WHERE Id_Discusion = $id_Discusion;";
    }

    public function getAllDiscusiones($tema){
        $array = array();
        $sql = "SELECT * FROM Discusion WHERE Tema = '$tema'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
      //  var_dump(self::$instance->bdBooxChange);
        while( $fila = $consulta->fetch_array()){
            $TDiscusion = new TDiscusion(
                $fila[BD_DISCUSION_ID],
                $fila[BD_DISCUSION_USUARIO_CREADOR],
                $fila[BD_DISCUSION_FECHA],
                $fila[BD_DISCUSION_TEMA],
                $fila[BD_DISCUSION_TITULO],
                $fila[BD_DISCUSION_NUMCOMENTARIOS],
                $fila[BD_DISCUSION_NUMVISITAS]
                );
            $array[] = $TDiscusion;
        }
        return $array;
    }

    public function getDiscusionById($id_Discusion){
        $sql = "SELECT * FROM Discusion WHERE Id_Discusion = $id_Discusion;";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();
            $Discusion = new TDiscusion(
               $fila[BD_DISCUSION_ID],
                $fila[BD_DISCUSION_USUARIO_CREADOR],
                $fila[BD_DISCUSION_FECHA],
                $fila[BD_DISCUSION_TEMA],
                $fila[BD_DISCUSION_TITULO],
                $fila[BD_DISCUSION_NUMCOMENTARIOS],
                $fila[BD_DISCUSION_NUMVISITAS]
                );
            return $Discusion;
        }
                
        return null;
    }
}
?>
