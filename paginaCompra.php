<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BooxChange Compra</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
    </head>


    <?php

        include_once(__DIR__."/includes/comun/cabecera.php");

        include_once(__DIR__."./includes/constants.php");
        include_once(__DIR__."/includes/appBooxChange.php");
        include_once(__DIR__."/includes/transfers/TLibro.php");

        if(!isset($_GET['id'])){
            exit("No se ha proporcionado el id del producto");
        }
        else if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
            exit("Usuario no logeado, no se puede realizar la compra");
        }
        else{
            $app = appBooxChange::getInstance();
            $libro = $app->getLibroById($_GET['id']);
            $sLibro = serialize($libro);
            $_SESSION["libroCompra"] = $sLibro;
            //file_put_contents('libroCompra', $sLibro);
            
            $titulo = $libro->getTitulo();
            echo "<h1> Compra del Libro $titulo </h1>";
            $unidades = $libro->getUnidades();
        }
    ?>

    <form method="post" action="includes/procesos/procesarCompra.php">

    <label for="unidades"><b>Unidades</b></label><br>
    <input type="number" name="unidades" id="unidades" min="1" max="<?php echo $unidades; ?>" value="1" /><br><br>

    <label for="numtarjeta"><b>Número de Tarjeta</b></label><br>
    <input type="text" placeholder="" name="numtarjeta" id="numtarjeta" /><br><br>

    <label for="clave"><b>Clave</b></label><br>
    <input type="password" placeholder="" name="clave" id="clave" /><br><br>

    <input type="submit">

    </form>


</html>
