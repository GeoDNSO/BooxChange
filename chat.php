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
        $imagenUser2 = $user2->getFotoPerfil();
        $event = "window.location='chat.php?idchat=$idChat';";
        echo "<div class='otherUserChat' onclick=$event>"; //Necesario js para que sea semanticamente correcto
        //echo "<a href='chat.php?idchat=$idChat'>";

        // Chat $idChat con user $nombreUser2  </a>, numMens = $numMensajes, mensajesSinLeer = $mensajesSinLeer <br> ";
        echo "<div class='otherUserChatImg' > <img src='$imagenUser2' alt='Imagen de $nombreUser2'/> </div>";
        echo "<div class='otherUserChatName'> $nombreUser2 </div>";
        //echo "</a>";
        echo "</div>";
    }
}

function textoEnvioChat()
{
    if (isset($_GET["idchat"])) {

        echo '<textarea placeholder="Escribe un mensaje aquí..." name="mensajeChatTexto" id="mensajeChatTextoEnviar" class="autoExpand" cols="40" rows="5"></textarea>';
        echo '<button type="button" id="botonEnviar" value="Enviar"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M1.101 21.757L23.8 12.028 1.101 2.3l.011 7.912 13.623 1.816-13.623 1.817-.011 7.912z"></path></svg></span> </button>';

    } else {
        //echo "¿Iniciar un chat?";
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

        //Mostrar Mensajes

        $app->disminuirMensajesSinLeer($idChat, $idUserSes);

        $mensajes = $app->getChatTexto($idChat);
        $mensajeAnterior = "";

        echo "<ol class='messages' id='messages'>";
        foreach ($mensajes as $mensaje) {
            $idUserMensaje = $mensaje->getIdUsuario();
            $textoMensaje = $mensaje->getTexto();
            $fechaMensaje = $mensaje->getFecha();
            $dt = DateTime::createFromFormat("Y-m-d H:i:s", $fechaMensaje);
            $horaDelMensaje = $dt->format('H:i');
            $fechaDelMensaje = $dt->format('Y-m-d');
            if ($mensajeAnterior !== $fechaDelMensaje)
                echo "<li class='chatCenter'><p class=chatCentrado><span class='textspanChat'>$fechaDelMensaje</span></p></li>";

            $mensajeAnterior = $fechaDelMensaje;
            if ($idUserMensaje == $_SESSION["id_Usuario"]) {
                echo "<li class='currentUserMessage mine'> <span class='textspanChat'>$textoMensaje <span class='hourspanChat'> $horaDelMensaje </span></span> </li>";
                // echo "<li> <div class='currentUserMessage'> $textoMensaje   from $idUserMensaje   y $fechaMensaje </div> </li>";
            } else {
                echo "<li  class='otherUserMessage'> <span class='textspanChat'>$textoMensaje <span class='hourspanChat'> $horaDelMensaje </span></span> </li>";
                //echo "<li> <div class='otherUserMessage'> $textoMensaje   from $idUserMensaje   y $fechaMensaje </div> </li>";
            }
        }
        echo "<ol>";
        if (empty($mensajes)) {
            echo "<div class='chatNoHayMensajes'> Aun no hay mensajes, empieza a chatear </div>";
        }
    } else {
        echo "<div class='mainChatEmpty'> <img src='./imagenes/IconoChat.png' alt='Imagen Chat Lobby' class='chatFoto'> </div>";
    }
}

function userProfile()
{

    $userImg = $_SESSION['fotoPerfil'];
    $userName = $_SESSION['nombreReal'];

    echo "<div class='userProfile'>";

    echo "<div class='userProfileImg' > <img src='$userImg' alt='Imagen de $userName'/> </div>";
    echo "<div class='userProfileName'> $userName </div>";

    echo "</div>";
}

function otherCurrentUser()
{

    if (isset($_GET["idchat"])) {

        $idUserSes = $_SESSION["id_Usuario"];
        $idChat = intval($_GET["idchat"]);

        $app = appBooxChange::getInstance();

        $chat = $app->getChatById($_GET["idchat"]);

        $otherUser = "";
        if ($chat->getIdUsuario1() != $idUserSes) {
            $otherUser = $app->getUserById($chat->getIdUsuario1());
        } else {
            $otherUser = $app->getUserById($chat->getIdUsuario2());
        }

        $nombreUser2 = $otherUser->getNombreReal();
        $imagenUser2 = $otherUser->getFotoPerfil();

        echo "<div class='otherUserProfile'>";

        echo "<div class='otherUserProfileImg' > <img src='$imagenUser2' alt='Imagen de $nombreUser2'/> </div>";
        echo "<div class='otherUserProfileName'> $nombreUser2 </div>";

        echo "</div>";
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
    <?php
    if (!isset($_COOKIE["estiloWeb"]) || $_COOKIE["estiloWeb"] == "claro") {
        echo '<link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root.css" />';
    } else {
        echo '<link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root_dark_mode.css" />';
    }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/config.js"></script>
    <script type="text/javascript" src="javascript/chat.js"></script>

</head>



<?php
require_once(__DIR__ . "/includes/comun/cabecera.php");
?>

<body>

    <div class="mainChatContent">

        <div class="mainUserChats">

            <?php
            userProfile();
            ?><div class="otherChatsMain">
                <?php
                chatsDelUsuario();
                ?></div>
        </div>


        <div class="mainUserCurrentChat">


            <div class="otherCurrentUser">
                <?php
                otherCurrentUser();
                ?></div>

            <div class="chatActual" id="chatActual">
                <?php
                mensajesChat();
                ?></div>

            <div class="textoChat">

                <?php
                textoEnvioChat();
                ?></div>

        </div>

    </div>

</body>

<?php
include("./includes/comun/footer.php");
?>

</html>