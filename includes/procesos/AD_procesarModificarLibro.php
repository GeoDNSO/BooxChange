<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

if(!isset($_SESSION['nombre'])){
    exit("No se encuentra el nombre en la sesion");
}

$titulolibro = $_POST["titulolibro"];
echo "<script type='text/JavaScript'>  prompt('$titulolibro'); </script>";

$autor = $_POST["autor"];
echo "<script type='text/JavaScript'>  prompt('$autor'); </script>";

//no van los decimales, nose porque
$precio = $_POST["precio"];
echo "<script type='text/JavaScript'>  prompt('$precio'); </script>";

$imagen = $_POST["imagen"];
echo "<script type='text/JavaScript'>  prompt('$imagen'); </script>";

$descripcion = $_POST["descripcion"];
echo "<script type='text/JavaScript'>  prompt('$descripcion'); </script>";

//fallos de que no se escoja ningun genero
$genero = $_POST['genero'];
echo "<script type='text/JavaScript'>  prompt('$genero'); </script>";

if(empty($genero)){
    exit("No se ha seleccionado ningun genero");
}
$enTienda = $_POST["enTienda"];
echo "<script type='text/JavaScript'>  prompt('$enTienda'); </script>";

$idioma = $_POST["idioma"];
echo "<script type='text/JavaScript'>  prompt('$idioma'); </script>";

$editorial = $_POST["editorial"];
echo "<script type='text/JavaScript'>  prompt('$editorial'); </script>";

$descuento = $_POST["descuento"];
echo "<script type='text/JavaScript'>  prompt('$descuento'); </script>";

$unidades = $_POST["unidades"];
echo "<script type='text/JavaScript'>  prompt('$unidades'); </script>";

$idLibro = unserialize($_SESSION['idLibro']);
echo "<script type='text/JavaScript'>  prompt('$idLibro'); </script>";

$app = appBooxChange::getInstance();

if($app->procesarModificarLibro($idLibro, $titulolibro ,$autor, $precio, $imagen, $descripcion, $genero, $enTienda, $idioma, $editorial, $descuento, $unidades)){
    header("Location: ../../admin.php");
}
else{
    header("Location: ../../index.php");
}
?>