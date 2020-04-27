<?php
require_once(__DIR__ . "/includes/config.php");
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BooxChange Tienda</title>
        <meta charset="UTF-8" />
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="css/salvio.css" />
    </head>


    <?php

        include_once(__DIR__."/includes/comun/cabecera.php");


        use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
        use fdi\ucm\aw\booxchange\TLibro as TLibro;

        $app = appBooxChange::getInstance();
        $librosTienda = $app->librosTienda();

        //echo "<ul>";
        echo "<div class=box>";
        foreach($librosTienda as $libro){
            $titulo = $libro->getTitulo();
            $id = $libro->getIdLibro();
            $precio = $libro->getPrecio();
            $unidades = $libro->getUnidades();
            $imagen = $libro->getImagen();

            if(isset($_SESSION['login']) && $_SESSION['login'] == true){
                
               	//echo "<li>";
               	echo "<div class=libro>";

               	//**************
               	//ARREGLAR el TAMAÑO cuando la imagen sea visible
               	echo "<img src='$imagen' alt='Imagen del Libro' height='100' width='100'><br>";
               
               	echo "<p class=titulo> $titulo </p>";
               	echo "<p class=precio>Precio: $precio</p>";

               	echo "<div class=botones>";
               	echo "<div class=enlace>";
               	echo "<p class='blanco centrado'><a class=blanco href='libroTienda.php?id=$id'>Ver Libro</a></p>";
               	echo "</div>";
              	echo "<div class=enlace>";
               

             	
            	if($unidades > 0){
                	echo "<p class='blanco centrado'><a class=blanco href='paginaCompra.php?id=$id'>Comprar</a>";

                }
                else{
                    echo "<p class='gris centrado'>Existencias Agotadas"; 
                }
				echo "</p>";
               	echo "</div>";
               	echo "</div>";
               	echo "</div>";
                //echo "</li>";
                //echo "</div>"; 
            }
            else{

                //echo "<li>";
                echo "<div class=libro>";
                echo "<p class=titulo> $titulo </p>";
                echo "<p class=precio>Precio: $precio</p>";
                //echo "<br>";
                echo "<div class=botones>";
                echo "<div class=enlace>";
                echo "<p class='blanco centrado'><a class=blanco href='libroTienda.php?id=$id'>Ver Libro</a></p>";
                echo "</div>";
                echo "<div class=enlace>";
                echo "<p class='blanco centrado'><a class=blanco href='login.php'>Comprar</a>*</p>";
                echo "</div>";
                echo "</div>";
               echo "</div>";
            }
        }
        echo "</div>";

        if(!isset($_SESSION['login']) || $_SESSION['login'] != true){
        	//echo "<br>";
        	echo "<div class=aviso>";
        	echo "<p class=blanco>*Debes haber iniciado sesión para comprar.</p>";
        	echo "</div>";
		}

        //echo "</ul>";
       // echo "</div>";


    ?>



</html>