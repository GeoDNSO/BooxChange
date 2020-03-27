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
    use fdi\ucm\aw\booxchange\formularios\FormularioValorar;

    $app = appBooxChange::getInstance();
    $librosValoracion = $app->librosValoracion();

    echo "<table><tr><th>Libro</th><th>Autor</th><th>Valoracion</th></tr>";

    foreach($librosValoracion as $libro){
        $titulo = $libro->getTitulo();
        $valoracion = $libro->getValoracion();
        $autor = $libro->getAutor();

        echo "<tr><td>" . $titulo . "</td><td>" . $autor . "</td><td>" . $valoracion . "</td></tr>";
    }

    echo "</table>";

    $form = new FormularioValorar("valorarForm", array("action"=>null));
    $form->gestiona();
?>



</html>