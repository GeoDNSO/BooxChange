<?php
require_once(__DIR__ . "/includes/config.php");

use fdi\ucm\aw\booxchange\appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TOfertasIntercambio as TOfertasIntercambio;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ofertas Intercambio</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php
include("includes/comun/cabecera.php");
?>

<h1>Tus Ofertas para Intercambios</h1>

<?php


if (isset($_SESSION["login"]) || $_SESSION["login"] == false) {

    $app = appBooxChange::getInstance();
    $ofertas = $app->ofertasUsuario($_SESSION["id_Usuario"]);

    foreach ($ofertas as $oferta) {
        $idOferta = $oferta->getId();
        $idLibro1 = $oferta->getIdLibro1();

        //DATOS LIBRO
        $libro = $app->getLibroIntercambio($idLibro1);

        $idLibro = $libro->getIdLibroInter();
        $titulo = $libro->getTitulo();
        $idUsuario = $libro->getIdUsuario();
        $imagen = $libro->getImagen();
        $autor = $libro->getAutor();
        $desc = $libro->getDescripcion();
        $genero = $libro->getGenero();
        $fecha = $libro->getFecha();

        $numOfertas = $app->getNumOfertas($idLibro);
        echo "<div> <p>";
        $str_oferta= ($numOfertas == 1) ? "oferta" : "ofertas";
        echo "Tu libro $titulo, tiene $numOfertas $str_oferta<br>";
        echo "<a href='ofertasIntercambio.php?id=$idLibro1'>Ver Ofertas </a> <br>";
        echo "</div> </p>";
    }
} else {
    echo "<p> No puede realizar ofertas si no está logeado </p>";
}

?>

</html>