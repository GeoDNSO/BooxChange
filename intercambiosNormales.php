<?php

use fdi\ucm\aw\booxchange\appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio;

require_once(__DIR__ . "/includes/config.php");

function printBooks()
{

    $app = appBooxChange::getInstance();
    $librosIntercambio = $app->getLibrosIntercambiosDisponibles();

    if (count($librosIntercambio) == 0) {
        echo "<p> Parece que no hay libros para intercambiar, por qué no ofreces tú uno? Puedes hacerlo en con opción de Subir Libro Para Intercambiar </p> <br>";
    } else {
        foreach ($librosIntercambio as $libro) {
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

            echo "<div class='libroInter'>";

            echo "<div class='imagenLibroInter'> <img src='$imagen' alt='Imagen de Libro'> </div>";

            echo "<p>";
            
            echo "Fecha: $fecha <br>";
            echo "Lo ofrece: $nombreUsuario <br>";
            echo "$titulo <br>";
            echo "Autor: $autor <br>";
            echo "Genero: $genero <br>";
            echo "$desc <br>";
            if (isset($_SESSION["id_Usuario"]) && $_SESSION["id_Usuario"] == $idUsuario) {
                echo "Este libro lo has ofrecido tú, <a href='ofertasIntercambio.php?id=$idLibro'> ver ofertas disponibles <a>";
            } else {
                echo "<a href='formOfrecerLibro.php?id=$idLibro'> Ofrecer Libro <a>";
            }

            echo "</p>";

            echo "</div>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Intercambios Normales</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php

include("includes/comun/cabecera.php");

?>

<body>
    <!--<li> <a href="formIntercambio.php">Subir Libro Para Intercambiar</a> </li>-->


    <div class="interNormMain">
        <h1>Intercambios Normales</h1>

        <div class="tiendaLibrosInter">
            <?php
            printBooks();
            ?>
        </div>

    </div>


</body>


</html>