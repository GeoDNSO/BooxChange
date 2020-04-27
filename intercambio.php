<?php
require_once(__DIR__ . "/includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Intercambios</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php

include("includes/comun/cabecera.php");

?>




<div class="mainIntercambio">

    <h1>Intercambios</h1>

    <div class="opcionesIntercambio">
        <div class="intercambioNormal">
            <h2>Intercambio Normal</h2>
            <p>
                Un intercambio normal y corriente, si estas aburrido de alguno de tus libros prueba a subirlo a nuestra web y pide un libro que te pueda interesar
                o por otro lado puedes buscar que libros quiere la gente e igual te apetece realizar un intercambio
            </p>

            <div class="imagen">
                <a href="intercambiosNormales.php">
                    <img src="imagenes/IconoInterNormal.png" alt="">
                </a>
            </div>

        </div>


        <div class="intercambioMisterioso">
            <h2>Intercambio Misterioso</h2>
            <p>
                Tienes algún libro cogiendo polvo y te da igual lo que le ocurra, prueba a intercambiarlo por algun libro desconocido de otro usuario
            </p>

            <div class="imagen">
                <a href="intercambioMisterioso.php">
                    <img src="imagenes/IconoInterMist.png" alt="">
                </a>
            </div>


        </div>
    </div>



</div>





</html>