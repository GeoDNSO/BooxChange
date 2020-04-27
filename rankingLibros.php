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
    use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
    use fdi\ucm\aw\booxchange\formularios\FormularioValorar;

    $app = appBooxChange::getInstance();
    $librosValoracion = $app->librosValoracion();

    echo "<div class='leaderboard'>";

    echo "<h1>Libros mejor valorados</h1><ol>";

    foreach($librosValoracion as $libro){
        $titulo = $libro->getTitulo();
        $valoracion = $libro->getValoracion();
        $autor = $libro->getAutor();
        $idLibro = $libro->getIdLibro();

        echo "<li><mark><a href='libroTienda.php?id=$idLibro'> $titulo</a></mark><small>$autor</small><small>$valoracion/10</small></li>";
    }

    echo "</ol></div>";

    $form = new FormularioValorar("valorarForm", array("action"=>null));
    $form->gestiona();
?>



</html>