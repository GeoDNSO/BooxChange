<?php

namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");

use fdi\ucm\aw\booxchange\transfers\TIntercambio as TIntercambio;
use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio;

class DAOIntercambios extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOIntercambios();
        }
        return self::$instance;
    }


    /**
     * @param int $id id del usuario buscando un intercambio
     * La funcion intenta encontrar un intercambio para el usuario con el id designado
     */
    public function buscarIntercambioMisterioso($idTargetUser)
    {

        //$sql = "SELECT * FROM intercambios WHERE intercambios.Id_Libro_Inter2 IS NULL AND intercambios.EsMisterioso=1 LIMIT 1";
        $sql = "SELECT * FROM intercambios 
                JOIN librointercambio ON librointercambio.Id_Libro_Inter = intercambios.Id_Libro_Inter1 
                JOIN usuario ON usuario.Id_Usuario=librointercambio.Id_Usuario 
                WHERE intercambios.Id_Libro_Inter2 IS NULL AND intercambios.EsMisterioso=1  AND librointercambio.Id_Usuario != $idTargetUser LIMIT 1";

        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();
            $intercambio = new TIntercambio($fila[BD_INTERCAMBIOS_ID_LIBRO1], $fila[BD_INTERCAMBIOS_ID_LIBRO2], $fila[BD_INTERCAMBIOS_ES_MISTERIOSO], $fila[BD_INTERCAMBIOS_ID], $fila[BD_INTERCAMBIOS_FECHA]);
            return $intercambio;
        } else {
            return null;
        }
    }


    /**
     * @param TLibroIntercambio $libroMisterioso libro sobre el que se va a crear el intercambio
     */
    public function crearIntercambioMisterioso($libroMisterioso)
    {
        $idLibro = $libroMisterioso->getIdLibroInter();
        $sql = "INSERT INTO `intercambios` (`Id_Libro_Inter1`, `Id_Libro_Inter2`, `EsMisterioso`, `Id_Intercambio`, `Fecha`) 
                VALUES ('$idLibro', NULL, '1', NULL, current_timestamp());";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        return $consulta;
    }


    
    /**
     * @param TLibroIntercambio $libro libro sobre el que se va a crear el intercambio
     */
    public function crearIntercambioNormal($libro)
    {
        $idLibro = $libro->getIdLibroInter();
        $sql = "INSERT INTO `intercambios` (`Id_Libro_Inter1`, `Id_Libro_Inter2`, `EsMisterioso`, `Id_Intercambio`, `Fecha`) 
                VALUES ('$idLibro', NULL, '0', NULL, current_timestamp());";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        return $consulta;
    }

    /**
     * 
      SELECT * FROM intercambios 
      JOIN librointercambio ON librointercambio.Id_Libro_Inter = intercambios.Id_Libro_Inter1 
      WHERE intercambios.Id_Libro_Inter2 IS NULL AND intercambios.EsMisterioso=1 LIMIT 1
     */

    /**
     * Actualiza los valores de un intercambio con el segundo id nulo, y así
     * completar el intercambio entre dos usuarios, devuelve el intercambio con 
     * los valores actualizados
     * 
     * @param TIntercambio $intercambioEncontrado
     * @param TLibroIntercambio $libro2
     * 
     * @return TIntercambio
     */
    public function completarIntercambio($intercambioEncontrado, $libro2)
    {
        $idInter = $intercambioEncontrado->getIdIntercambio();
        $idLibro = $libro2->getIdLibroInter();
        $sql = "UPDATE `intercambios` SET `Id_Libro_Inter2` = '$idLibro' WHERE `intercambios`.`Id_Intercambio` = $idInter;";

        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if($consulta == true){
            return $this->buscarIntercambio($idInter);
        }
        return null;
    }

    public function buscarIntercambio($id)
    {
        $sql = "SELECT * FROM intercambios WHERE intercambios.Id_Intercambio = $id";

        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();
            $intercambio = new TIntercambio($fila[BD_INTERCAMBIOS_ID_LIBRO1], $fila[BD_INTERCAMBIOS_ID_LIBRO2], $fila[BD_INTERCAMBIOS_ES_MISTERIOSO], $fila[BD_INTERCAMBIOS_ID], $fila[BD_INTERCAMBIOS_FECHA]);
            return $intercambio;
        } else {
            return null;
        }
    }

    public function buscarIntercambioPorLibro($idLibro)
    {
        $sql = "SELECT * FROM intercambios WHERE intercambios.Id_Libro_Inter1=$idLibro";

        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();
            $intercambio = new TIntercambio($fila[BD_INTERCAMBIOS_ID_LIBRO1], $fila[BD_INTERCAMBIOS_ID_LIBRO2], $fila[BD_INTERCAMBIOS_ES_MISTERIOSO], $fila[BD_INTERCAMBIOS_ID], $fila[BD_INTERCAMBIOS_FECHA]);
            return $intercambio;
        } else {
            return null;
        }
    }

    /*
    SELECT * FROM intercambios WHERE intercambios.Id_Libro_Inter2 IS NULL AND intercambios.EsMisterioso=1

    UPDATE `intercambios` SET `Id_Libro_Inter2` = '3' WHERE `intercambios`.`Id_Intercambio` = 3;
    */

    /*
    INSERT INTO `intercambios` (`Id_Libro_Inter1`, `Id_Libro_Inter2`, `EsMisterioso`, `Id_Intercambio`, `Fecha`) VALUES ('1', NULL, '1', NULL, current_timestamp());
    */

    /*
    INSERT INTO `intercambios` (`Id_Libro_Inter1`, `Id_Libro_Inter2`, `EsMisterioso`, `Id_Intercambio`, `Fecha`) VALUES ('3', '2', '1', NULL, current_timestamp());
    */
}

?>