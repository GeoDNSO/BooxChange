<?php
require_once(__DIR__ . "/includes/config.php");
?><!DOCTYPE html>
<html lang="es">

<head>
    <title>Resultado Intercambio Misterioso</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/config.js"></script>
</head>

<?php

include("includes/comun/cabecera.php");

?>


<?php

$rst = intval($_GET["resultado"]);

if ($rst == 0) {
    echo '    <div class="whiteBorder">
    <a href="index.php" class="noDeco">
        <div class="title">¡Tu libro se ha registrado!</div>
        <div class="sub-title">en cuanto encontremos a alguien buscando un libro misterioso se te notificará por la página web</div>
        <img class="media" src="imagenes\media\sabrinaCat.gif" alt="">
    </a>
</div>';
}

else {

    echo '    <div class="whiteBorder">
                <a href="index.php" class="noDeco">
                    <div class="title">¡Intercambio con exito!</div>
                    <div class="sub-title">Revisa tus notificaciones</div>
                    <img class="media" src="imagenes\media\surprise.gif" alt="">
                </a>
            </div>';
}

include("./includes/comun/footer.php");

?></html>
