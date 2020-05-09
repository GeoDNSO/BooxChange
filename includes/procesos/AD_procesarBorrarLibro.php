<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

if(!isset($_SESSION['nombre'])){
    exit("No se encuentra el nombre en la sesion");
}

$app = appBooxChange::getInstance();

$idLibro = $_GET["id"];

if($app->procesarBorrarLibro($idLibro)){
    header("Location: ../../AD_listaLibros.php");
}
else{
    header("Location: ../../index.php");
}
