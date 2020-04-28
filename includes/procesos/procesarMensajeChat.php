<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

$app = appBooxChange::getInstance();




$idChat = intval($_GET["idchat"]);
$texto = $_POST["mensajeChatTexto"];
$idUser = intval($_SESSION["id_Usuario"]);



$app->subirMensajeChat($idChat, $idUser, $texto);

$app->aumentarMensajesSinLeer($idChat, $idUser);


header('Location: ../../chat.php?idchat='.$idChat);

?>