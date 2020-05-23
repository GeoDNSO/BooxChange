<?php
include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/config.js"></script>
</head>

<?php
include("includes/comun/cabecera.php");
?><body>



    <div class="whiteBorder">
        <div class="title">¡Gracias por su compra!</div>
        <div class="sub-title">Su pedido llegará en los próximos días</div>
        <a href="index.php" class="noDeco">
            <img class="media" src="imagenes\media\camion.gif" alt="">
        </a>
    </div>



</body>


<?php
    include("./includes/comun/footer.php");
?></html>
