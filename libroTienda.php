<?php
    require_once(__DIR__."/includes/config.php");
?><!DOCTYPE html>
<html lang="es">
    <head>
        <title>BooxChange Tienda</title>
        <meta charset="UTF-8" />
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />
        
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/config.js"></script>
    </head>

<?php

    include_once(__DIR__."/includes/comun/cabecera.php");
    //include_once(__DIR__."./includes/constants.php");
    //include_once(__DIR__."/includes/appBooxChange.php");
    //include_once(__DIR__."/includes/transfers/TLibro.php");



    use \fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
    use fdi\ucm\aw\booxchange\formularios\FormularioValorar;
    echo "<body>";
    if(!isset($_GET['id'])){
        exit("No se ha proporcionado el id del producto");
    }
    else{
    	echo "<div class=contenidoLibroTienda>";
        echo "<div id='libro'>";
        $id = $_GET['id'];
        $app = appBooxChange::getInstance();
        $libro = $app->getLibroById($id);

        echo "<div id='portadaCompra'>";
        $imagen = $libro->getImagen();
        echo "<img src='$imagen' alt='Imagen del Libro' height='450' width='300'>  <br>";

        $precio = $libro->getPrecio();
        echo "<h3 class=marginTopPrecio> Precio: <span>$precio €</span></h3>";
        $unidades = $libro->getUnidades();
        echo "<h3 id='lastH3'> Unidades: <span>$unidades disponibles</span></h3>";
        if($unidades > 0){
            echo "<p class=botonCentrado><a class='libroTiendaBoton' href='paginaCompra.php?id=$id'> Comprar </a></p>";
        }
        else{
            echo "Existencias Agotadass";
        }
        echo "</div>";
        echo "<div id='datos'>";
        $titulo = $libro->getTitulo();
        echo "<h2 id='titulo'>$titulo </h2>";

        $autor = $libro->getAutor();
        echo "<h3>Autor/a:<span> $autor </span></h3>";

        $valoracion = $libro->getValoracion();
        $valoracion = round($valoracion, 2);
        $valoracionEstrellas = round($valoracion);
        echo "<h3> Valoración: ";
        for ($i = 0; $i < $valoracionEstrellas; $i++){
            echo "<span class='valoracion coloreada'>★</span>";
        }
        while ($i < 5){
            echo "<span class='valoracion'>★</span>";
            $i++;
        }
        echo "<span> $valoracion de 5</span>";


        echo "</h3>";

        /*
        $ranking = $libro->getRanking();
        echo "<h3> Ranking: $ranking </h3>";
*/

        $genero = $libro->getGenero();
        echo "<h3> Género: <span>$genero </span></h3>";

        $fechaPublicacion = $libro->getFechaPublicacion();
        echo "<h3> Fecha de publicación: <span>$fechaPublicacion </span></h3>";

        $idioma = $libro->getIdioma();
        echo "<h3> Idioma: <span>$idioma </span></h3>";

        $editorial = $libro->getEditorial();
        echo "<h3> Editorial: <span>$editorial </span></h3>";

        $descripcion = $libro->getDescripcion();
        echo "<h3> Descripción: <span>$descripcion</span> </h3>";

        echo "</div></div>";

        echo "<div id='valoraciones'>";
        echo "<div id='comentarios'>";

        $valoracionesLibro = $app->valoracionesLibro($id);
        $numValoraciones = count($valoracionesLibro);

        echo "<h1>Comentarios [$numValoraciones]</h1><ul>";

        foreach ($valoracionesLibro as $valoracionLibro) {
            $puntuacion = $valoracionLibro->getValoracion();
            $comentario = $valoracionLibro->getComentario();
            $idUsuario = $valoracionLibro->getIdUsuario();
            $usuario = $app->getUserById($idUsuario);
            $nombreUsuario = $usuario->getNombreUsuario();

            echo "<li><div class='todaValoracion'>";
            echo "<h2 class='nombreUsuario'>" . $nombreUsuario . "</h2>";

            $i=0;
            for ($i = 0; $i < $puntuacion; $i++){
                echo "<span class='valoracion coloreada'>★</span>";
            }
            while ($i < 5){
                echo "<span class='valoracion'>★</span>";
                $i++;
            }
            if ($comentario != null){
                echo "<p class='comentarioValoracion'>" . $comentario . "<br>";
            }
            echo "</div></li>";
        }
        echo "</ul></div>";

        $form = new FormularioValorar("valorarForm", array("action" =>"./includes/procesos/procesarValorar.php", "libroId" => $id));
        $form->gestiona();
        echo "</div>";
        echo "</div>";

    }

    echo "</body>";
    include("./includes/comun/footer.php");

?></html>
