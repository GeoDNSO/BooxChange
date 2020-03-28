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

    if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
        exit("Usuario no logeado, no se puede subir el libro");
    } else if ($_SESSION['rol'] != BD_TYPE_ADMIN){
        exit("No tienes permisos de admin");
    }
?>
    
    <form method="post" action="includes/procesos/AD_procesarSubirLibro.php">
    
        <label for="titulolibro"><b>Titulo del Libro</b></label><br>
        <input type="text" name="titulolibro" id="titulolibro" value="" /><br><br>

        <label for="autor"><b>Autor</b></label><br>
        <input type="text" name="autor" id="autor" value="" /><br><br>

        <label for="precio"><b>Precio</b></label><br>
        <input type="number" name="precio" id="precio" min="0" value="0" /><br><br>

        <label for="imagen"><b>Imagen</b></label><br>
        <input type="text" name="imagen" id="imagen" value="" /><br><br>

        <label for="descripcion"><b>Descripcion</b></label><br>
        <textarea name="descripcion" rows="4" cols="50" id="descripcion" value="" > </textarea><br><br>

        <label for="genero"><b>Genero</b></label><br>
        <select name="genero">
        <option value="Ciencia Ficción">Ciencia Ficción</option>
        <option value="Comedia">Comedia</option>
        <option value="Drama">Drama</option>
        <option value="Histórico">Histórico</option>
        <option value="Infantil">Infantil</option>
        <option value="Romántico">Romántico</option>
        <option value="Youtubers">Youtubers</option>
        </select> <br><br>
    
        <label for="enTienda"><b>En Tienda</b></label><br>
        <input type="radio" id="si" name="enTienda" value="1">
        <label for="1">Si</label>
        <input type="radio" id="no" name="enTienda" value="0" checked>
        <label for="0">No</label><br><br>
        
        <label for="idioma"><b>Idioma</b></label><br>
        <input type="text" name="idioma" id="idioma" value="" /><br><br>

        <label for="editorial"><b>Editorial</b></label><br>
        <input type="text" name="editorial" id="editorial" value="" /><br><br>

        <label for="descuento"><b>Descuento</b></label><br>
        <input type="number" name="descuento" id="descuento" min="0" max="100" value="0" /><br><br>

        <label for="unidades"><b>Unidades</b></label><br>
        <input type="number" name="unidades" id="unidades" min="0" value="0" /><br><br>

        <label for="fechaPublicacion"><b>Fecha de publicacion</b></label><br>
        <input type="date" name="fechaPublicacion" id="fechaPublicacion" /><br><br>
    
        <input type="submit">

    </form>
    <a href="admin.php"> Cancelar </a>

</html>