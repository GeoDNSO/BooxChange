<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

$app = appBooxChange::getInstance();




$idUser = $_SESSION["id_Usuario"];
$idUser2 = $_GET["idUserChat"];

//existe chat??
$chat = $app->existeChatWithUsers($idUser, $idUser2);

if(!$chat){


    $idChat = $app->crearChat($idUser, $idUser2);


    if($idChat == false){
        exit("Algo fue mal al crear el usuario");
    }

    header('Location: ../../chat.php?idchat='.$idChat);


}else{
    header('Location: ../../chat.php?idchat='.$chat->getIdChat());

}
