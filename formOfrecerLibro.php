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


    echo '<div class="intercambioAlfa"><div class="title">';
    echo $titulo;
    echo '</div><div class="sub-title">';
    echo    "Ofrecido por $nombreUsuario </div><br>

        <p>
            Autor: $autor <br>
            Genero: $genero <br><br>
            $desc <br>
        </p>

    </div>";


}

function formulario(){

    global $app, $idLibroIntercambio;

    $html = "<form class='formOfrecerClass' method='post' enctype='multipart/form-data' action='includes/procesos/procesarSubidaOferta.php?libroQuerido=$idLibroIntercambio'>";



    $html .= '<div class="intercambiOmega"><div class="fields">';

    $html .= ' <div class="title">Propuesta de intercambio</div>
    <div class="sub-title">Describe el libro que quieres dar a cambio</div><br>';

    $html .= '<label for="titulo"><b>Titulo</b></label><br>';
    $html .= '<input class="line" type="text" placeholder="Título que propones" name="titulo" id="titulo" value="" /><br><br>';


    $html .= '<label for="autor"><b>Autor</b></label>';
    $html .= '<input class="line" type="text" placeholder="Autor del libro" name="autor"  id="autor"  value="" /><br>';

    $html .= '<label for="fotoLibro"><b>Foto del Libro</b></label><br>';
    $html .= '<input type="file" name="fotoLibro" id="fotoLibro" accept="image/*"/> <br><br>';

    $html .= '    <label for="genero"><b>Género</b></label><br>';
    //Seleccion de Generos
    $html .= '    <select id="genero" name="genero"><br><br>';
    $html .= $app->construirSeleccionDeCategorias();
    $html .= '    </select><br><br>';

    $html .= '<label for="descripcion"><b>Descripcion</b></label><br>';
    $html .= '<textarea class="line" id="descripcion" name="descripcion" rows="5" cols="50" placeholder="Escribe aquí algo interesante que pueda hacer que tu libro sea más atractivo para el usuario al que se lo ofreces..."></textarea> <br>';
    $html .= '    <button class="send-button">Proponer intercambio</button>';

    $html .= '</div></div>';
    $html .= "</form>";

    return $html;
}

?><!DOCTYPE html>
<html lang="es">

<head>
    <title>Ofertas Intercambio</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php
include("includes/comun/cabecera.php");


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

?></html>
