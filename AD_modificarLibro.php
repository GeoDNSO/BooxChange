<?php
    require_once(__DIR__ . "/includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php
    include("includes/comun/cabecera.php");

    include("./includes/comun/funcionesAdmin.php");

    use \fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

    if (!isset($_GET['id'])) {
        exit("No se ha proporcionado el id del producto");
    } else if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
        exit("Usuario no logeado, no se puede modificar el libro");
    } else if ($_SESSION['rol'] != BD_TYPE_ADMIN){
        exit("No tienes permisos de admin");
    } else {
        $app = appBooxChange::getInstance();
        $libro = $app->getLibroById($_GET['id']);
        $_SESSION["idLibro"] = serialize($_GET['id']);
        $titulo = $libro -> getTitulo();
        $autor = $libro -> getAutor();
        $precio = $libro -> getPrecio();
        $imagen = $libro -> getImagen();
        $descripcion = $libro -> getDescripcion();
        $genero = $libro -> getGenero();
        $enTienda = $libro -> getEnTienda(); 
        $idioma = $libro -> getIdioma();
        $editorial = $libro -> getEditorial();
        $descuento = $libro -> getDescuento();
        $unidades = $libro -> getUnidades();
        $fechaPublicacion = $libro -> getFechaPublicacion();
    }
?>
    
    <form method="post" action="includes/procesos/AD_procesarModificarLibro.php" enctype="multipart/form-data">
    
        <label for="titulolibro"><b>Titulo del Libro</b></label><br>
        <input type="text" name="titulolibro" id="titulolibro" value="<?php echo $titulo; ?>" /><br><br>

        <label for="autor"><b>Autor</b></label><br>
        <input type="text" name="autor" id="autor" value="<?php echo $autor; ?>" /><br><br>

        <label for="precio"><b>Precio</b></label><br>
        <input type="text" name="precio" id="precio" value="<?php echo $precio; ?>" /><br><br>

        <label for="imagen"><b>Imagen</b></label><br>
        <input type="file" name="imagen" id="imagen" accept="image/*" /><br><br>

        <label for="descripcion"><b>Descripcion</b></label><br>
        <textarea rows="4" cols="50" name="descripcion" id="descripcion"> <?php echo $descripcion; ?>  </textarea><br><br>

        <label for="genero"><b>Genero</b></label><br>
        <select name="genero">
        <option value="<?php echo $genero; ?>"> <?php echo $genero; ?> </option>
        <option value="Ciencia Ficción">Ciencia Ficción</option>
        <option value="Comedia">Comedia</option>
        <option value="Drama">Drama</option>
        <option value="Histórico">Histórico</option>
        <option value="Infantil">Infantil</option>
        <option value="Romántico">Romántico</option>
        <option value="Youtubers">Youtubers</option>
        </select> <br><br>
        
        <label for="enTienda"><b>En Tienda</b></label><br>
        <?php
        if($enTienda == 0){
            echo '<input type="radio" id="si" name="enTienda" value="1">';
            echo '<label for="1">Si</label>';
            echo '<input type="radio" id="no" name="enTienda" value="0" checked>';
            echo '<label for="0">No</label><br><br>';
        }
        else{
            echo '<input type="radio" id="si" name="enTienda" value="1" checked>';
            echo '<label for="1">Si</label>';
            echo '<input type="radio" id="no" name="enTienda" value="0">';
            echo '<label for="0">No</label><br><br>';
        }
        ?>

        <label for="idioma"><b>Idioma</b></label><br>
        <input type="text" name="idioma" id="idioma" value="<?php echo $idioma; ?>" /><br><br>

        <label for="editorial"><b>Editorial</b></label><br>
        <input type="text" name="editorial" id="editorial" value="<?php echo $editorial; ?>" /><br><br>

        <label for="descuento"><b>Descuento</b></label><br>
        <input type="number" name="descuento" id="descuento" min="0" max="100" value="<?php echo $descuento; ?>" /><br><br>

        <label for="unidades"><b>Unidades</b></label><br>
        <input type="number" name="unidades" id="unidades" min="0" value="<?php echo $unidades; ?>" /><br><br>

        <label for="fechaPublicacion"><b>Fecha de publicacion</b></label><br>
        <input type="date" name="fechaPublicacion" id="fechaPublicacion" value="<?php echo $fechaPublicacion; ?>"/><br><br>
    
        <input type="submit" value="Modificar Libro">
    
    </form>

    <a href="AD_listaLibros.php"> Cancelar </a>

</html>