<?php
require_once(__DIR__ . "/includes/config.php");

use fdi\ucm\aw\booxchange\appBooxChange;
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

$app = appBooxChange::getInstance();

$idLibro1 = intval($_GET['id']);
$libro = $app->getLibroIntercambio($idLibro1);

$idLibro = $libro->getIdLibroInter();
$titulo = $libro->getTitulo();
$idUsuario = $libro->getIdUsuario();
$imagen = $libro->getImagen();
$autor = $libro->getAutor();
$desc = $libro->getDescripcion();
$genero = $libro->getGenero();
$fecha = $libro->getFecha();

echo "<h1> Ofertas para tu libro, $titulo </h1>";

if ($libro->getIdUsuario() != $_SESSION["id_Usuario"]) {
    header("Location: intercambiosNormales.php");
} else if (isset($_SESSION["login"]) || $_SESSION["login"] == false) {

   
    $ofertas = $app->ofertasLibro($idLibro1);

    foreach ($ofertas as $oferta) {
        $idOferta = $oferta->getId();
        $idLibro1 = $oferta->getIdLibro1();
        $idLibro2 = $oferta->getIdLibro2();

        //HAY QUE BUSCAR LOS DATOS DEL 2º LIBRO Y MOSTRARLO

        //DATOS LIBRO

        $libro2 = $app->getLibroIntercambio($idLibro2);


        $idLibro2 = $libro2->getIdLibroInter();
        $titulo2 = $libro2->getTitulo();
        $idUsuario2 = $libro2->getIdUsuario();
        $imagen2 = $libro2->getImagen();
        $autor2 = $libro2->getAutor();
        $desc2 = $libro2->getDescripcion();
        $genero2 = $libro2->getGenero();
        $fecha2 = $libro2->getFecha();

        $usuario = $app->getUserById($idUsuario);
        $nombreUsuario = $usuario->getNombreReal();

        echo "<div> <p>";
        echo "Fecha: $fecha2 <br>";
        echo "Lo ofrece: $nombreUsuario <br>";
        echo "$titulo2 <br>";
        echo "Autor: $autor2 <br>";
        echo "Genero: $genero2 <br>";
        echo "$desc2 <br>";
        echo "<a href='./includes/procesos/procesarOferta.php?aceptado=1&id=$idOferta&idLibro1=$idLibro1&idLibro2=$idLibro2'>Aceptar </a> <br>";
        echo "<a href='./includes/procesos/procesarOferta.php?aceptado=0&id=$idOferta&idLibro1=$idLibro1&idLibro2=$idLibro2'>Rechazar </a> <br>";
        echo "</div> </p>";
    }
} else {
    echo "<p> No puede realizar ofertas si no está logeado </p>";
}

?>

</html>