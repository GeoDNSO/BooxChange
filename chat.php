<?php

use fdi\ucm\aw\booxchange\appBooxChange;

use fdi\ucm\aw\booxchange\transfers\TChat as TChat;
use fdi\ucm\aw\booxchange\transfers\TMensajeChat as TMensajeChat;

require_once(__DIR__ . "/includes/config.php");



function chatsDelUsuario()
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
        echo "<a href='chat.php?idchat=$idChat'> Chat $idChat con user $nombreUser2  </a>, numMens = $numMensajes, mensajesSinLeer = $mensajesSinLeer <br> ";
    }
}



function textoEnvioChat()
{
    if (isset($_GET["idchat"])) {
        echo '<form method="post" action="includes/procesos/procesarMensajeChat.php?idchat=' . $_GET["idchat"] . '">';

        echo '<textarea name="mensajeChatTexto" id="" cols="40" rows="5"></textarea>';

        echo '<input type="submit" value="Enviar">';

        echo '</form>';
    } else {
        echo "¿Iniciar un chat?";
    }
}

function chatLegal()
{
    $app = appBooxChange::getInstance();
    if (isset($_GET["idchat"])) {
        if ($app->isChatOfUser($_GET["idchat"], $_SESSION["id_Usuario"]) == false) {
            exit("No es del usuario");
            header('Location: chat.php');
        }
    }
}


function mensajesChat()
{

    if (isset($_GET["idchat"])) {

        $idUserSes = $_SESSION["id_Usuario"];
        $idChat = intval($_GET["idchat"]);

        $app = appBooxChange::getInstance();

        $app->disminuirMensajesSinLeer($idChat, $idUserSes);

        $mensajes = $app->getChatTexto($idChat);


        foreach($mensajes as $mensaje){
            $idUserMensaje = $mensaje->getIdUsuario();
            $textoMensaje = $mensaje->getTexto();
            $fechaMensaje = $mensaje->getFecha();

            if($idUserMensaje == $_SESSION["id_Usuario"]){
                echo "$textoMensaje   from $idUserMensaje   y $fechaMensaje <br>";
            }
            else{
                echo "$textoMensaje   from $idUserMensaje   y $fechaMensaje <br>";
            }   
        }

        if(empty($mensajes)){
            echo " Aun no hay mensajes, empieza a chatear <br>";
        }
       
    }
    else{
        echo "Pipipipipip";
    }
}


chatLegal();
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
        chatsDelUsuario();
        ?>
    </div>

    <br>
    <p>-----------------------------------</p>
    <br>

    <div class="chatActual">
        <?php
        mensajesChat()
        ?>
    </div>

    <div class="textoChat">

        <?php
        textoEnvioChat();
        ?>

    </div>

</body>


</html>