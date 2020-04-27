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
    use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
    use fdi\ucm\aw\booxchange\formularios\FormularioValorar;

    $app = appBooxChange::getInstance();
    $librosValoracion = $app->librosValoracion();

    echo "<table><tr><th>Libro</th><th>Autor</th><th>Valoracion</th></tr>";

    foreach($librosValoracion as $libro){
        $titulo = $libro->getTitulo();
        $valoracion = $libro->getValoracion();
        $autor = $libro->getAutor();
        $idLibro = $libro->getIdLibro();

        echo "<tr><td><a href='libroTienda.php?id=$idLibro'> $titulo</a> </td><td> $autor </td><td> $valoracion/10</td></tr>";
    }

    echo "</table>";

    $form = new FormularioValorar("valorarForm", array("action"=>null));
    $form->gestiona();
?>



</html>