<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

if(!isset($_SESSION['nombre'])){
    exit("No se encuentra el nombre en la sesion");
}

$titulolibro = $_POST["titulolibro"];
$autor = $_POST["autor"];
//no van los decimales, nose porque
$precio = $_POST["precio"];
$imagen = $_POST["imagen"];
$descripcion = $_POST["descripcion"];
$genero = $_POST['genero'];

if(empty($genero)){
    exit("No se ha seleccionado ningun genero");
}
$enTienda = $_POST["enTienda"];

$idioma = $_POST["idioma"];
$editorial = $_POST["editorial"];
$descuento = $_POST["descuento"];
$unidades = $_POST["unidades"];
$fechaDePublicacion = $_POST["fechaPublicacion"];

$fotoBD = "";

//Subir imagen al servidor
if(isset($_FILES["imagen"]) && $_FILES["imagen"]["name"] != ""){
    $fotoBD =  (IMG_DIRECTORY_LIBROS . $_FILES["imagen"]["name"]);
    $fotoBD = str_replace("\\", "/", $fotoBD);

    move_uploaded_file( $_FILES["foto"]['tmp_name']  , $fotoBD);

}else{
    $fotoBD = (IMG_DIRECTORY_LIBROS . IMG_DEFAULT_LIBRO);
}


//falla la fecha tambien
date_default_timezone_set("Europe/Madrid");
$fecha = date_default_timezone_get();
$app = appBooxChange::getInstance();

if($app->procesarSubirLibro($titulolibro ,$autor, $precio, $fotoBD, $descripcion, $genero, $enTienda, $idioma, $editorial, $descuento, $unidades, $fechaDePublicacion)){
    header("Location: ../../admin.php");
}
else{
    header("Location: ../../index.php");
}
?>