<?php
    require_once(__DIR__ . "/includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/header.css" />
</head>


<?php
    include("includes/comun/cabecera.php");
    use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

    $app = appBooxChange::getInstance();
    $libros = $app->getBooks();
    
    echo "<ol>";
    if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['rol'] == BD_TYPE_ADMIN){
        foreach($libros as $libro){
            $id = $libro -> getIdLibro();
            $titulo = $libro -> getTitulo();
            $autor = $libro -> getAutor();
            $precio = $libro -> getPrecio();
            $imagen = $libro -> getImagen();
            $descripcion = $libro -> getDescripcion();
            $genero = $libro -> getGenero();
            $enTienda = $libro -> getEnTienda(); 
            $fecha = $libro -> getFecha();
            $idioma = $libro -> getIdioma();
            $editorial = $libro -> getEditorial();
            $descuento = $libro -> getDescuento();
            $unidades = $libro -> getUnidades();
            echo "<li><ul>
            <li>Titulo del Libro: $titulo</li>
            <li> Autor: $autor </li>
            <li> Precio: $precio </li>
            <li> Imagen: $imagen </li>
            <li> Descripcion: $descripcion </li>
            <li> Genero: $genero </li>
            <li> En Tienda: $enTienda </li>
            <li> Fecha de subida de libro: $fecha </li>
            <li> Idioma: $idioma </li>
            <li> Editorial: $editorial </li>
            <li> Descuento: $descuento </li>
            <li> Unidades: $unidades </li></ul>
            <a href='./includes/procesos/AD_procesarBorrarLibro.php?id=$id'>Borrar Libro</a> 
            <a href='AD_modificarLibro.php?id=$id'>Modificar Libro</a> </li>"; 
        }
    }
    else{
        echo "No tienes permisos para ver lo que hay aqui";
    }
    echo "</ol>";
?>


</html>