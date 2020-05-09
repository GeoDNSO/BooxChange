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
    $i=0;
    
    foreach ($librosValoracion as $libro) {

        if($i++ > 9)break;

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
</head>

<?php
include("includes/comun/cabecera.php");
?><body>

    <?php
    ranking();
    include("./includes/comun/footer.php");
    ?></body></html>
