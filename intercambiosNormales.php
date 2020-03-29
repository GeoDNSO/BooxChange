<?php

use fdi\ucm\aw\booxchange\appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio;

require_once(__DIR__ . "/includes/config.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Intercambios Normales</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/header.css" />
</head>


<?php

include("includes/comun/cabecera.php");

?>

<h1>Intercambios Normales</h1>

<ul>
    <li> <a href="formIntercambio.php">Subir Libro Para Intercambiar</a> </li>
    <?php
        if (isset($_SESSION["login"]) && $_SESSION["login"]== true) {
            echo "<li> <a href='ofertas.php'>Ver Ofertas</a> </li>";
        }
    ?>
</ul>

<?php


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

        echo "<div>";
        echo "<p>";
        echo "<img src='$imagen' alt='Imagen de Libro' height='100' width='100'>  <br>";
        echo "Fecha: $fecha <br>";
        echo "Lo ofrece: $nombreUsuario <br>";
        echo "$titulo <br>";
        echo "Autor: $autor <br>";
        echo "Genero: $genero <br>";
        echo "$desc <br>";
        if(isset($_SESSION["id_Usuario"]) && $_SESSION["id_Usuario"] == $idUsuario){
            echo "Este libro lo has ofrecido tú, <a href='ofertasIntercambio.php?id=$idLibro'> ver ofertas disponibles <a>";
        }else{
            echo "<a href='formOfrecerLibro.php?id=$idLibro'> Ofrecer Libro <a>";
        }

        echo "</p>";
        echo "</div>";
    }
}

?>

</html>