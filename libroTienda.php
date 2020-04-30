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

    if(!isset($_GET['id'])){
        exit("No se ha proporcionado el id del producto");
    }
    else{
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

    echo "<div id=formValorar>";
    $form = new FormularioValorar("valorarForm", array("action" => null, "libroId" => $id));
    $form->gestiona();
    echo "</div>";
    echo "<div id=comentarios>";
    echo "<h1>Comentarios</h1>";
    echo "</div>";
    }

    include("./includes/comun/footer.php");

?>

</html>