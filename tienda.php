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

include_once(__DIR__ . "/includes/comun/cabecera.php");



use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
use fdi\ucm\aw\booxchange\TLibro as TLibro;

$app = appBooxChange::getInstance();
$librosTienda = $app->librosTienda();

$html = '<div id="buscaLibro" class = "buscarTienda">';
$html .= '<form method="post">';
//$html .= '<div class="fields noWrapBuscar">';
//$html .= '    <label for="titulo"><b>Buscar Libro por título:</b><br></label><br>';
$html .= '<input class="" placeholder="Introduzca título del libro..." type=text name="titulo" id="titulo" />';

$html .= '    <div class= selectCentrado><select id="genero" class=marginGenero name="genero">';
$html .=      $app->construirSeleccionDeCategorias();
$html .= '    </select></div>';
$html .= '    <button class="send-buttonBuscar">Buscar</button>';
//$html .= '</div>';
$html .= '</form>';
$html .= '</div>';

echo $html;

$titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : null;
$genero = isset($_POST["genero"]) ? $_POST["genero"] : null;
if (!empty($titulo) || !empty($genero)) {
    $librosTienda = $app->buscarPorTitulo($titulo, $genero);
} else {
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

    //$genero = $libro->getGenero();
    $genero = $app->getGenerosLibro($id);

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
        if ($valoracion == null) {
            echo "<p>Valoracion: libro no valorado aún.</p>";
        } else {
            echo "<p>Valoracion: $valoracion/5</p>";
        }
        echo "<p class=genero>Género: ";
        $i = 0;
        $len = count($genero);
        foreach ($genero as $generos){
            if ($i != $len - 1)
                echo $generos->getGenero().", ";
            else
                echo $generos->getGenero();
            $i++;
        }
        echo "</p>";
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

        echo "<p class='euros centrado blanco'>$precio";
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
        if ($valoracion == null) {
            echo "<p>Valoración: Libro no valorado aún.</p>";
        } else {
            echo "<p>Valoración: $valoracion/10</p>";
        }
        echo "<p class=genero>Género: ";
        $i = 0;
        $len = count($genero);
        foreach ($genero as $generos){
            if ($i != $len - 1)
                echo $generos->getGenero().", ";
            else
                echo $generos->getGenero();
            $i++;
        }


        echo "</p><p> Descripción: ";
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

?>

</html>