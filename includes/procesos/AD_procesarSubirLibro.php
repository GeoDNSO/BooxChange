<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

if (!isset($_SESSION['nombre'])) {
    exit("No se encuentra el nombre en la sesion");
}

$titulolibro = $_POST["titulolibro"];
$autor = $_POST["autor"];
//no van los decimales, nose porque
$precio = $_POST["precio"];

$descripcion = $_POST["descripcion"];
$genero = $_POST['generos'];

if (empty($genero)) {
    exit("No se ha seleccionado ningun genero");
}
$enTienda = $_POST["enTienda"];

$idioma = $_POST["idioma"];
$editorial = $_POST["editorial"];
$descuento = $_POST["descuento"];
$unidades = $_POST["unidades"];
$fechaDePublicacion = $_POST["fechaPublicacion"];

$fotoBD = "";

$hayErrores = false;

if (empty($titulolibro) || mb_strlen($titulolibro) < 3) {
    $hayErrores = true;
}

if (empty($autor) || mb_strlen($autor) < 3) {
    $hayErrores = true;
}

if (empty($descripcion) || mb_strlen($descripcion) < 10) {
    $hayErrores = true;
}
if (empty($idioma) || mb_strlen($idioma) < 3) {
    $hayErrores = true;
}
if (empty($editorial) || mb_strlen($editorial) < 3) {
    $hayErrores = true;
}

if ($hayErrores) {
    header("Location: ../../AD_subirLibro.php");
} else {
    //Subir imagen al servidor
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["name"] != "") {
        
        $_FILES["imagen"]["name"] = time() . '_' . rand(100, 999) . '.' . end(explode(".", $_FILES["imagen"]['name']));

        $fotoBD =  (IMG_DIRECTORY_LIBROS . $_FILES["imagen"]["name"]);
        $fotoBD = str_replace("\\", "/", $fotoBD);

        $archivoSubida = (SERVER_DIR . $fotoBD);

        move_uploaded_file($_FILES["imagen"]['tmp_name'], $archivoSubida);
    } else {
        $fotoBD = (IMG_DIRECTORY_LIBROS . IMG_DEFAULT_LIBRO);
    }


    //falla la fecha tambien
    date_default_timezone_set("Europe/Madrid");
    $fecha = date_default_timezone_get();
    $app = appBooxChange::getInstance();

    if ($app->procesarSubirLibro($titulolibro, $autor, $precio, $fotoBD, $descripcion, $genero, $enTienda, $idioma, $editorial, $descuento, $unidades, $fechaDePublicacion)) {
        echo "<script type='text/javascript'>document.location = '../../AD_listaLibros.php' </script>";
        //header("Location: ../../AD_listaLibros.php");
    } else {
        header("Location: ../../index.php");
    }
}
