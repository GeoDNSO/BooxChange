<?php

use fdi\ucm\aw\booxchange\appBooxChange;

require_once(__DIR__."/includes/config.php");
use \fdi\ucm\aw\booxchange\transfers\TNotificacion;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Notificaciones</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php
include("includes/comun/cabecera.php");
?>

<h1>Tus notificaciones</h1>

<?php

$app = appBooxChange::getInstance();
$notificaciones = $app->getNotificaciones($_SESSION["id_Usuario"]);

foreach($notificaciones as $notificacion){

    $leido = $notificacion->getLeido();
    $fecha = $notificacion->getFecha();
    $mensaje = $notificacion->getMensaje();

    echo "<div>";
    echo "<p>";

    echo "Hora: $fecha <br>";
    echo "Mensaje: $mensaje <br>";

    echo "</p>";
    echo "</div>";
}

$app->notificacionesLeidas($_SESSION["id_Usuario"]);

?>





</html>