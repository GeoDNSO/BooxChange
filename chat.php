<?php

use fdi\ucm\aw\booxchange\appBooxChange;

use fdi\ucm\aw\booxchange\transfers\TChat as TChat;
use fdi\ucm\aw\booxchange\transfers\TMensajeChat as TMensajeChat;

require_once(__DIR__ . "/includes/config.php");



function chatDelUsuario()
{
    $app = appBooxChange::getInstance();
    $chats = $app->getChatsFromUser($_SESSION["id_Usuario"]);

    foreach ($chats as $chat) {
        $idChat = $chat->getIdChat();
        $idUser1 = $chat->getIdUsuario1();
        $idUser2 = $chat->getIdUsuario2();
        $numMensajes = $chat->getNumMensajes();
        $numMenSinLeer1 = $chat->getNumMensajesSinLeer();
        $numMenSinLeer2 = $chat->getNumMensajesSinLeer2();
        $fechaAct = $chat->getFechaActividad();

        $user2 = "";
        $mensajesSinLeer = 0;
        if ($idUser1 == $_SESSION["id_Usuario"]) {
            $user2 = $app->getUserById($idUser2);
            $mensajesSinLeer = $numMenSinLeer1;
        } else {
            $user2 = $app->getUserById($idUser1);
            $mensajesSinLeer = $numMenSinLeer2;
        }

        $nombreUser2 = $user2->getNombreReal();
        echo "Chat $idChat con user $nombreUser2 , numMens = $numMensajes, mensajesSinLeer = $mensajesSinLeer <br>";
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Chat</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>



<?php
require_once(__DIR__ . "/includes/comun/cabecera.php");
//idchat  --> id get

?>

<body>

    <h1>Chat</h1>

    <div class="chats">
        <?php
        chatDelUsuario();
        ?>
    </div>

    <br>
    <p>-----------------------------------</p>
    <br>

    <div class="chatActual">
        chat actual
    </div>

    <div class="textoChat">

        <?php
        echo '<form method="post" action="includes/procesos/procesarMensajeChat.php?idchat='. $_GET["idchat"] . '">';

        echo '<textarea name="mensajeChatTexto" id="" cols="40" rows="5"></textarea>';

        echo '<input type="submit" value="Enviar">';

        echo '</form>';

        ?>


    </div>


</body>


</html>