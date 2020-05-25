<!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
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
</head>

<?php
include("includes/comun/cabecera.php");
?><body>



    <div class="whiteBorder">

        <div class="title">La sesión se ha cerrado correctamente</div>
        <div class="sub-title">Tu aventura comienza ahora</div><br>
        <img class="media" src="imagenes\media\leer.gif" alt="">

    </div>


    <meta http-equiv="refresh" content="3; url=index.php" />

</body>


<?php
    include("./includes/comun/footer.php");
?></html>
