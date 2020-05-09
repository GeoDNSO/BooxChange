<?php
require_once(__DIR__ . "/includes/config.php");
?><!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange Tienda</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <link rel="stylesheet" type="text/css" href="css/salvio.css" />
</head>



<?php

include_once(__DIR__ . "/includes/comun/cabecera.php");



use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
use fdi\ucm\aw\booxchange\TLibro as TLibro;

$app = appBooxChange::getInstance();
$librosTienda = $app->librosTienda();

$html = '<div id="buscaLibro" class = "buscarTienda">';
$html .= '<form method="post">';
+$html .= '<div class="fields noWrapBuscar">';
+//$html .= '    <label for="titulo"><b>Buscar Libro por título:</b><br></label><br>';
+$html .= '     <div class="text ancho"> <input class="login" placeholder="   Introduzca título del libro..." type=text name="titulo" id="titulo" /></div>';
+
+$html .= '    <div class= selectCentrado><select id="genero" class=marginGenero name="genero">';
$html .=      $app->construirSeleccionDeCategorias();
$html .= '    </select></div>';
$html .= '    <button class="send-button noEnorme marginTop">Buscar</button>';
$html .= '</div>';
$html .= '</form>';
$html .= '</div>';

echo $html;

$titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : null;
$genero = isset($_POST["genero"]) ? $_POST["genero"] : null;
if (!empty($titulo) || !empty($genero)) {
    $librosTienda = $app->buscarPorTitulo($titulo, $genero);
}
else{
    $librosTienda = $app->librosTienda();
}

//echo "<ul>";
echo "<div class=box>";
foreach ($librosTienda as $libro) {
    $titulo = $libro->getTitulo();
    $id = $libro->getIdLibro();
    $precio = $libro->getPrecio();
    $unidades = $libro->getUnidades();
    $imagen = $libro->getImagen();
    $autor = $libro->getAutor();
    $valoracion = $libro->getValoracion();
    $descripcion = $libro->getDescripcion();
    $genero = $libro->getGenero();

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {

        //echo "<li>";
        echo "<div class=libro>";
        echo "<div class=fila>";
        //**************
        //ARREGLAR el TAMAÑO cuando la imagen sea visible
        echo "<div class=imagen>";
        echo "<a href='libroTienda.php?id=$id'>";
        echo "<img src='$imagen' alt='Imagen del Libro' width=100%>";
        //cho "<img src='imagenes/usuarios/gon.jpg' alt='Imagen del Libro' height=100% width=100%>";
        echo "</a>";
        echo "</div>";

        echo "<div class=atributos>";
        echo "<p class=titulo> $titulo </p>";
        echo "<p class='autor gris'>$autor</p>";
        if ($valoracion == null){
        	 echo "<p>Valoracion: libro no valorado aún.</p>";
        }
        else{
        	echo "<p>Valoracion: $valoracion/5</p>";
        }
        echo "<p class=genero>Género: $genero</p>";
      	echo "<p> Descripcion: ";
        //$valoracion;

        if (strlen($descripcion) < 100) {
            echo $descripcion;
        } else {
            $i = 0;
            while ($i < 100) {
                echo $descripcion[$i];
                $i++;
            }

            echo "... ";
            echo "<a class=gris href='libroTienda.php?id=$id'>Leer más</a>";
        }
        echo "</p>";

        //echo "<p>$desc100</p>";
        //echo "<p class=precio>Precio: $precio</p>";
        echo "</div>"; //fila
        echo "</div>";

        echo "<div class=botones>";
        echo "<div class=precio>";

        //echo "<p class='blanco centrado'><a class=blanco href='libroTienda.php?id=$id'>Ver Libro</a></p>";

        echo "<p class='euros centrado'>$precio";
        echo "€</p>";

        echo "</div>";



        if ($unidades > 0) {
            echo "<div class=enlace>";
            echo "<p class='blanco centrado'><a class=blanco href='paginaCompra.php?id=$id'>Comprar</a>";
        } else {
            echo "<div class=agotado>";
            echo "<p class='grisClaro centrado'>Existencias Agotadas";
        }

        echo "</p>";
        echo "</div>"; //botones
        echo "</div>"; //enlace
        echo "</div>"; //libro

        //echo "</li>";
        //echo "</div>";
    } else {

        //echo "<li>";
        echo "<div class=libro>";
        echo "<div class=fila>";
        //**************
        //ARREGLAR el TAMAÑO cuando la imagen sea visible
        echo "<div class=imagen>";
        echo "<a href='libroTienda.php?id=$id'>";
        echo "<img src='$imagen' alt='Imagen del Libro'width=100%>";
        echo "</a>";
        echo "</div>";

        echo "<div class=atributos>";
        echo "<p class=titulo> $titulo </p>";
        echo "<p class='autor gris'>$autor</p>";
        if ($valoracion == null){
        	 echo "<p>Valoracion: libro no valorado aún.</p>";
        }
        else{
        	echo "<p>Valoracion: $valoracion/10</p>";
        }
        echo "<p class=genero>Género: $genero</p>";
      	echo "<p> Descripcion: ";
        //$valoracion;

        if (strlen($descripcion) < 100) {
            echo $descripcion;
        } else {
            $i = 0;
            while ($i < 100) {
                echo $descripcion[$i];
                $i++;
            }

            echo "... ";
            echo "<a class=gris href='libroTienda.php?id=$id'>Leer más</a>";
        }


        //echo "<p>$desc100</p>";
        //echo "<p class=precio>Precio: $precio</p>";
        echo "</div>"; //fila
        echo "</div>";

        echo "<div class=nologin>";
        echo "<div class=enlace>";
        echo "<p class='blanco centrado'><a class=blanco href='libroTienda.php?id=$id'>Mas información</a>";
		echo "</p>";
        echo "</div>";
        echo "<div class=enlace>";
        echo "<p class='blanco centrado'><a class=blanco href='login.php'>Comprar</a>";
		echo "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}
echo "</div>"; //box

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    //echo "<br>";
    echo "<div class=aviso>";
    echo "<p class=blanco>*Debes haber <a class=blanco href='login.php'>iniciado sesión</a> para comprar.</p>";
    echo "</div>";
}

//echo "</ul>";
// echo "</div>";
include("./includes/comun/footer.php");

?></html>
