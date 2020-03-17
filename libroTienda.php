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
    echo "<h3> Imagen: $imagen </h3>";

    $descripcion = $libro->getDescripcion();
    echo "<h3> Descripcion: $descripcion </h3>";

    $genero = $libro->getGenero();
    echo "<h3> Genero: $genero </h3>";

    $fecha = $libro->getFecha();
    echo "<h3> Fecha: $fecha </h3>";

    $idioma = $libro->getIdioma();
    echo "<h3> Idioma: $idioma </h3>";

    $editorial = $libro->getEditorial();
    echo "<h3> Editorial: $editorial </h3>";

    $unidades = $libro->getUnidades();
    echo "<h3> Unidades: $unidades </h3>";

    echo "<a href='paginaCompra.php?id=$id'> Comprar </a>";
    }

?>

</html>