

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BooxChange Tienda</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
    </head>


    <?php

        include_once(__DIR__."/includes/comun/cabecera.php");

        include_once(__DIR__."./includes/constants.php");
        include_once(__DIR__."/includes/appBooxChange.php");
        include_once(__DIR__."/includes/transfers/TLibro.php");

        $app = appBooxChange::getInstance();
        $librosTienda = $app->librosTienda();

        echo "<ul>";

        foreach($librosTienda as $libro){
            $titulo = $libro->getTitulo();
            $id = $libro->getIdLibro();
            $precio = $libro->getPrecio();

            if(isset($_SESSION['login']) && $_SESSION['login'] == true){
                echo "<li>$titulo   Precio: $precio   <a href='libroTienda.php?id=$id'>Ver Libro </a> <a href='paginaCompra.php?id=$id'> Comprar </a> </li>";            
            }
            else{
                echo "<li>$titulo   Precio: $precio   <a href='libroTienda.php?id=$id'>Ver Libro </a> <a href='login.php'> Comprar </a>(Tienes que logearte para poder comprar) </li>";            
            }
            
        }

        echo "</ul>";


    ?>



</html>