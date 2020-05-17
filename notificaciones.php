<?php

use fdi\ucm\aw\booxchange\appBooxChange;

require_once(__DIR__."/includes/config.php");
use \fdi\ucm\aw\booxchange\transfers\TNotificacion;
?><!DOCTYPE html>
<html lang="es">

<head>
    <title>Notificaciones</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/config.js"></script>
</head>


<?php
include("includes/comun/cabecera.php");
?><h1 class="notificacionesTitulo">Tus notificaciones</h1>

<?php

$app = appBooxChange::getInstance();
$notificaciones = $app->getNotificaciones($_SESSION["id_Usuario"]);

foreach($notificaciones as $notificacion){

    $leido = $notificacion->getLeido();
    $fecha = $notificacion->getFecha();
    $mensaje = $notificacion->getMensaje();

    echo "<div class='notificacionesTotal'>";

    echo "<p class='notificacionesCenter notificacionesCenterHora'> $fecha </p><br>";

    echo "<p class='notificacionesCenter'> $mensaje <br></p>";
    echo "</div>";
}

$app->notificacionesLeidas($_SESSION["id_Usuario"]);

include("./includes/comun/footer.php");

?></html>
