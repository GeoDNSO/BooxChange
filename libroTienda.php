<?php
    require_once(__DIR__."/includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BooxChange Tienda</title>
        <meta charset="UTF-8" />
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
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
        echo "<div id='libro'>";
        $id = $_GET['id'];
        $app = appBooxChange::getInstance();
        $libro = $app->getLibroById($id);

        $titulo = $libro->getTitulo();
        echo "<h2> Libro: $titulo </h2>";

        $autor = $libro->getAutor();
        echo "<h3> Autor: $autor </h3>";

        $precio = $libro->getPrecio();
        echo "<h3> Precio: $precio </h3>";

        $valoracion = $libro->getValoracion();
        echo "<h3> Valoracion: $valoracion </h3>";

        $ranking = $libro->getRanking();
        echo "<h3> Ranking: $ranking </h3>";

        $imagen = $libro->getImagen();
        echo "<h3> Imagen </h3>";
        echo "<img src='$imagen' alt='Imagen del Libro' height='100' width='100'>  <br>";

        $descripcion = $libro->getDescripcion();
        echo "<h3> Descripcion: $descripcion </h3>";

        $genero = $libro->getGenero();
        echo "<h3> Genero: $genero </h3>";

        $fechaPublicacion = $libro->getFechaPublicacion();
        echo "<h3> Fecha de publicacion: $fechaPublicacion </h3>";

        $idioma = $libro->getIdioma();
        echo "<h3> Idioma: $idioma </h3>";

        $editorial = $libro->getEditorial();
        echo "<h3> Editorial: $editorial </h3>";

        $unidades = $libro->getUnidades();
        echo "<h3> Unidades: $unidades </h3>";
        if($unidades > 0){
            echo "<a href='paginaCompra.php?id=$id'> Comprar </a>";
        }
        else{
            echo "Existencias Agotadass";
        }
        echo "</div>";

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

    }

    echo "</body>";
    include("./includes/comun/footer.php");

?>

</html>