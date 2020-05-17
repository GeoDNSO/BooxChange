<?php
require_once(__DIR__ . "/includes/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
use fdi\ucm\aw\booxchange\formularios\FormularioValorar;


function ranking()
{
    $app = appBooxChange::getInstance();
    $librosValoracion = $app->librosValoracion();

    echo "<div class='leaderboard'>";

    echo "<h1>Libros mejor valorados</h1><ol>";
    
    foreach ($librosValoracion as $libro) {
        $titulo = $libro->getTitulo();
        $valoracion = $libro->getValoracion();
        $autor = $libro->getAutor();
        $idLibro = $libro->getIdLibro();

        echo "<li><mark><a href='libroTienda.php?id=$idLibro'> $titulo</a></mark><small>$autor</small><small>$valoracion/5</small></li>";
    }

    echo "</ol></div>";
}

?><!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/config.js"></script>
</head>

<?php
include("includes/comun/cabecera.php");
?><body>

    <?php
    ranking();
    include("./includes/comun/footer.php");
    ?></body></html>
