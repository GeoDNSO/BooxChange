<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;


function mensajesChat()
{
    $messages = array();

    $idUserSes = $_SESSION["id_Usuario"];
    $idChat = intval($_POST["idchat"]);

    $iniMensajes = $_POST["iniMensajes"];

    $app = appBooxChange::getInstance();

    //Mostrar Mensajes

    $app->disminuirMensajesSinLeer($idChat, $idUserSes);

    $mensajes = $app->getChatTexto($idChat);
    $mensajeAnterior = "";

    $messages = "";
    //$messages .=  "<ol class='messages'  id='messages'>";
    for ($i = $iniMensajes; $i < count($mensajes); $i++) {
        $idUserMensaje = $mensajes[$i]->getIdUsuario();
        $textoMensaje = $mensajes[$i]->getTexto();
        $fechaMensaje = $mensajes[$i]->getFecha();
        $dt = DateTime::createFromFormat("Y-m-d H:i:s", $fechaMensaje);
        $horaDelMensaje = $dt->format('H:i');
        $fechaDelMensaje = $dt->format('Y-m-d');

        $mensajeAnterior = $fechaDelMensaje;
        if ($idUserMensaje == $_SESSION["id_Usuario"]) {
            $messages .=  "<li class='currentUserMessage mine'> <span class='textspanChat'>$textoMensaje <span class='hourspanChat'> $horaDelMensaje </span></span> </li>";
            // messages[] =  "<li> <div class='currentUserMessage'> $textoMensaje   from $idUserMensaje   y $fechaMensaje </div> </li>";
        } else {
            $messages .=  "<li  class='otherUserMessage'> <span class='textspanChat'>$textoMensaje <span class='hourspanChat'> $horaDelMensaje </span></span> </li>";
            //messages[] =  "<li> <div class='otherUserMessage'> $textoMensaje   from $idUserMensaje   y $fechaMensaje </div> </li>";
        }
    }
    //$messages .=  "<ol>";
    if (empty($mensajes)) {
        $messages .=  "<div class='chatNoHayMensajes'> Aun no hay mensajes, empieza a chatear </div>";
    }
    return $messages;
}

if (!isset($_POST["function"])) {
    echo "error";
    exit();
}

$func = $_POST["function"];

switch ($func) {
    case 'getNumberOfMessages':
        $chat = appBooxChange::getInstance()->getChatById($_POST["idchat"]);
        $numMensajes = $chat->getNumMensajes();
        echo $numMensajes;
        break;
    case 'send':

        $app = appBooxChange::getInstance();

        $idChat = intval($_POST["idchat"]);
        $texto = $_POST["mensaje"];
        $idUser = intval($_SESSION["id_Usuario"]);

        $app->subirMensajeChat($idChat, $idUser, $texto);

        $app->aumentarMensajesSinLeer($idChat, $idUser);


        break;
    case 'update':
        echo mensajesChat();
        break;
    default:
        echo "Error";
        break;
}
