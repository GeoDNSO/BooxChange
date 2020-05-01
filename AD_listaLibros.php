<?php
    require_once(__DIR__ . "/includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>

<?php
    include("includes/comun/cabecera.php");

    include("./includes/comun/funcionesAdmin.php");

    use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

    $app = appBooxChange::getInstance();
    $html = '<div id="buscaLibro" class = "border">';
    $html .= '<form method="post">';
    $html .= '<div class="fields">';
    $html .= '    <label for="titulo"><b>Buscar Libro por título:</b></label><br>';
    $html .= '     <div class="text"> <input type="text" placeholder="" name="titulo" id="titulo" /></div><br><br>';
    
    $html .= '    <select id="genero" name="genero"><br><br>';
    $html .=      $app->construirSeleccionDeCategorias();
    $html .= '    </select><br><br>';
    
    $html .= '    <button class="send-button">Buscar</button>';
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
    
    echo "<div class='listaTotalAdmin'><ol>";
    if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['rol'] == BD_TYPE_ADMIN){
        foreach($librosTienda as $libro){
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
            $fechaDePublicacion = $libro -> getFechaPublicacion();
            echo "<div class='listaAdminlista'>";
            echo "<div class='listaAdminlistacenter'><img src='$imagen' alt='Portada del Libro'  height='100' width='100'></div>";
            echo "<li><ul>
            <li>Titulo del Libro: $titulo</li>
            <li> Autor: $autor </li>
            <li> Precio: $precio </li>
            <li> Descripcion: $descripcion </li>
            <li> Genero: $genero </li>
            <li> En Tienda: $enTienda </li>
            <li> Fecha de subida de libro: $fecha </li>
            <li> Fecha de publicacion del libro: $fechaDePublicacion </li>
            <li> Idioma: $idioma </li>
            <li> Editorial: $editorial </li>
            <li> Descuento: $descuento </li>
            <li> Unidades: $unidades </li></ul>";
            echo "</li>";
            echo "<div class='adminboton listaAdminlistacenter'> <a href='./includes/procesos/AD_procesarBorrarLibro.php?id=$id'>Borrar Libro</a> 
            <a href='AD_modificarLibro.php?id=$id'>Modificar Libro</a></div>"; 
            echo "</div>";
        }
    }
    else{
        echo "No tienes permisos para ver lo que hay aqui";
    }
    echo "</ol></div>";
?>

<?php
    include("./includes/comun/footer.php");
?>
</html>