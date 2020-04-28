<?php

namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");

use fdi\ucm\aw\booxchange\transfers\TChat as TChat;


class DAOChat extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOChat();
        }
        return self::$instance;
    }

    //INSERT INTO `chat` (`Id_Chat`, `Id_Usuario1`, `Id_Usuario2`, `NumMensajes`, `mensajesSinLeer`) VALUES (NULL, '5', '4', '0', '0');
    public function crearChat($idUser1, $idUser2)
    {
        $sql = "INSERT INTO `chat` (`Id_Chat`, `Id_Usuario1`, `Id_Usuario2`, `NumMensajes`, `mensajesSinLeer`) VALUES (NULL, '$idUser1', '$idUser2', '0', '0');";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        return $consulta;
    }


    //SELECT * FROM chat WHERE Id_Usuario1=2 AND Id_Usuario2=3
    public function getChatWithUsers($idUser1, $idUser2)
    {
        $sql = "SELECT * FROM chat WHERE Id_Usuario1=$idUser1 AND Id_Usuario2=$idUser2";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 0) { //Hay que revisar también al reves, ya que depende de que usuario haya iniciado el chat
            $sql = "SELECT * FROM chat WHERE Id_Usuario1=$idUser2 AND Id_Usuario2=$idUser1";
            $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
            if (mysqli_num_rows($consulta) == 0) { //No hay chats para el usuario
                return false;
            }
        }

        $array = array();
        while ($fila = $consulta->fetch_array()) {
            $TChat = new TChat($fila[BD_CHAT_ID_CHAT], $fila[BD_CHAT_ID_USER1], $fila[BD_CHAT_ID_USER2], $fila[BD_CHAT_NUM_MENSAJES], $fila[BD_CHAT_MENSAJES_SIN_LEER_1], $fila[BD_CHAT_MENSAJES_SIN_LEER_2], $fila[BD_CHAT_FECHA_ACT]);
            $array[] = $TChat;
        }
        return $array;
    }


    public function getChatsFromUser($idUser)
    {
        $sql = "SELECT * FROM chat WHERE chat.Id_Usuario1=$idUser OR chat.Id_Usuario2=$idUser ORDER BY chat.fechaActividad DESC;";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        $array = array();
        if (mysqli_num_rows($consulta) != 0) {
            while ($fila = $consulta->fetch_array()) {
                $TChat = new TChat($fila[BD_CHAT_ID_CHAT], $fila[BD_CHAT_ID_USER1], $fila[BD_CHAT_ID_USER2], $fila[BD_CHAT_NUM_MENSAJES], $fila[BD_CHAT_MENSAJES_SIN_LEER_1], $fila[BD_CHAT_MENSAJES_SIN_LEER_2], $fila[BD_CHAT_FECHA_ACT]);
                $array[] = $TChat;
            }
        }

        return $array;
    }


    public function isChatOfUser($idChat)
    {

        $sql = "SELECT * FROM chat WHERE chat.Id_Chat=$idChat";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) != 0) {
            //$fila = $consulta->fetch_array();
            //$TChat = new TChat($fila[BD_CHAT_ID_CHAT], $fila[BD_CHAT_ID_USER1], $fila[BD_CHAT_ID_USER2], $fila[BD_CHAT_NUM_MENSAJES], $fila[BD_CHAT_MENSAJES_SIN_LEER_1], $fila[BD_CHAT_MENSAJES_SIN_LEER_2], $fila[BD_CHAT_FECHA_ACT]);
           return false;
        }
        return true;
    }
}
