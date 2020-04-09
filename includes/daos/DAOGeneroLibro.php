<?php
namespace fdi\ucm\aw\booxchange\daos;


$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");


use fdi\ucm\aw\booxchange\transfers\TGenero as TGenero;
use fdi\ucm\aw\booxchange\transfers\TGeneroLibro as TGeneroLibro;

class DAOGeneroLibro extends DAO{

    private static $instance;

    function __construct(){
        parent::__construct();
    }
    
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOGeneroLibro();
        }
        return self::$instance;
    }


    //INSERT INTO `generolibros` (`id`, `idLibro`, `genero`) VALUES (NULL, '4', 'Drama');

    public function subirGeneroLibro($idLibro, $genero){
        $sql = "INSERT INTO `generolibros` (`id`, `idLibro`, `genero`) VALUES (NULL, '$idLibro', '$genero');";
        return mysqli_query(self::$instance->bdBooxChange, $sql);
    }

    public function getGenerosLibro($idLibro){
        $sql = "SELECT generolibros.genero FROM generolibros WHERE idLibro=$idLibro";

        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        while( $fila = $consulta->fetch_array()){
            $TGenero = new TGenero($fila[BD_GENERO_LIBRO_GENERO]);
            $array[] = $TGenero;
        }
        return $array;
    }

    public function borrarGenerosLibro($idLibro)
    {
        $sql = "SELECT generolibros.genero FROM generolibros WHERE idLibro=$idLibro";
        return mysqli_query(self::$instance->bdBooxChange, $sql);
    }
    
 

}

?>