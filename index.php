<?php
require_once(__DIR__ . "/includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php

include("includes/comun/cabecera.php");
?>



<body>

    <div class="main">

        

        <div class="mejoresLibros">

            <div class="libroPresentacion1">

                <div class="imgPresentacion">
                    <img src="./imagenes/libros/default.jpg" alt="adas">
                </div>

                <div class="descLibroPresentacion">
                    <h2>Libro 1 de Autor Apellidos </h2>
                    
                </div>
            </div>

            <div class="libroPresentacion2">

                <div class="descLibroPresentacion">
                    <h2>Libro 2 de Autor Apellidos</h2>
                </div>

                <div class="imgPresentacion">
                    <img src="./imagenes/libros/default.jpg" alt="adas">
                </div>


            </div>

        </div>

        <div class="presentacion">
            <h1>De que trata Booxchange</h1>
            <p>BooxChange es una web centrada en el intercambio y compraventa de libros, para así promover y divertirse con lectura ya sea intercambiando títulos con otras personas en las mismas condiciones, debatiendo en el foro o descubriendo nuevos libros.</p>
        </div>



</body>


<footer>
    <?php
    include("./includes/comun/footer.php")
    ?>
</footer>



</html>