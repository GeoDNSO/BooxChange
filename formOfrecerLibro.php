<?php
require_once(__DIR__ . "/includes/config.php");

use fdi\ucm\aw\booxchange\appBooxChange;

$app = appBooxChange::getInstance();
$idLibroIntercambio = intval($_GET["id"]);

function mostrarDatosLibroQuerido(){

    global $app, $idLibroIntercambio;

    $libro = $app->getLibroIntercambio($idLibroIntercambio);


    $idLibro = $libro->getIdLibroInter();
    $titulo = $libro->getTitulo();
    $idUsuario = $libro->getIdUsuario();
    $imagen = $libro->getImagen();
    $autor = $libro->getAutor();
    $desc = $libro->getDescripcion();
    $genero = $libro->getGenero();
    $fecha = $libro->getFecha();
    
    $usuario = $app->getUserById($idUsuario);
    $nombreUsuario = $usuario->getNombreUsuario();
    
    echo "<h1> Oferta para el libro $titulo de $nombreUsuario</h1>";
    
    echo "<div>";
    echo "<p>";
    
    echo "Fecha: $fecha <br>";
    echo "Lo ofrece: $nombreUsuario <br>";
    echo "$titulo <br>";
    echo "Autor: $autor <br>";
    echo "Genero: $genero <br>";
    echo "$desc <br>";
    echo "</p>";
    echo "</div>";

}

function formulario(){

    global $app, $idLibroIntercambio;

    $html = "<form method='post' action='includes/procesos/procesarSubidaOferta.php?libroQuerido=$idLibroIntercambio'>";
    $html .= '<fieldset>';
    $html .= '<legend>Libro Que Ofreces para el Intercambio</legend>';
    $html .= '<label for="titulo"><b>Titulo</b></label><br>';
    $html .= '<input type="text" placeholder="Titulo del libro que vas a intercambiar" name="titulo" id="titulo" value="" /><br><br>';
    $html .= '<label for="fotoLibro"><b>Foto del Libro</b></label><br>';
    $html .= '<input type="text" placeholder="" name="fotoLibro" id="fotoLibro" value="" /><br><br>';
    $html .= '<label for="autor"><b>Autor</b></label><br>';
    $html .= '<input type="text" placeholder="Autor del libro" name="autor"  id="autor"  value="" /><br><br>';

    $html .= '    <label for="genero"><b>Género</b></label><br>';
    //Seleccion de Generos
    $html .= '    <select id="genero" name="genero"><br><br>';
    $html .= $app->construirSeleccionDeCategorias();
    $html .= '    </select><br><br>';

    $html .= '<label for="descripcion"><b>Descripcion</b></label><br>';
    $html .= '<textarea id="descripcion" name="descripcion" rows="5" cols="50" placeholder="Escribe aquí algo interesante que pueda hacer que tu libro sea más atractivo para el usuario al que se lo ofreces..."></textarea> <br>';
    $html .= '<button type="submit">Subir Libro</button>';
    $html .= '</fieldset>';
    $html .= "</form>";

    return $html;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ofertas Intercambio</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php
include("includes/comun/cabecera.php");
?>

<?php

$libro = $app->getLibroIntercambio($idLibroIntercambio);

if(isset($_SESSION["login"]) &&  $libro->getIdUsuario() == $_SESSION["id_Usuario"]){
    header("Location: intercambiosNormales.php");
}
else if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
    mostrarDatosLibroQuerido();
    echo formulario();
} else {
    echo "<p> No puede realizar ofertas si no está logeado </p>";
}

  include("./includes/comun/footer.php");

?>

</html>