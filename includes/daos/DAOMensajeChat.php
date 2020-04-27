<?php

namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\transfers\TMensajeChat as TMensajeChat;



class DAOMensajeChat extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOMensajeChat();
        }
        return self::$instance;
    }

    //INSERT INTO `mensajechat` (`Id_Chat`, `Id_Mensaje_Chat`, `Id_Usuario`, `Texto`, `Fecha`) VALUES ('6', NULL, '5', 'Hola', current_timestamp());

    public function subirMensajeChat($idChat, $idUsuario, $texto){
        $sql = "INSERT INTO `mensajechat` (`Id_Chat`, `Id_Mensaje_Chat`, `Id_Usuario`, `Texto`, `Fecha`) VALUES ('$idChat', NULL, '$idUsuario', '$texto', current_timestamp());";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        return $consulta;
    }

    
}

?>