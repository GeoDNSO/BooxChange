<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

//session_start();

if(!isset($_SESSION['nombre'])){
    exit("No se encuentra el nombre en la sesion");
}

$parentDir = dirname(__DIR__, 1);

include_once($parentDir."./constants.php");
include_once($parentDir."/appBooxChange.php");
include_once($parentDir."/transfers/TLibro.php");

$libro = unserialize($_SESSION["libroCompra"]);
$titulo = $libro->getTitulo();

$udAComprar = $_POST["unidades"];
$numTarjeta = $_POST["numtarjeta"];

$udA = 0;
$ud = 0;

$app = appBooxChange::getInstance();

$usuario = unserialize($_SESSION["usuario"]);
$idUsuario = $usuario->getIdUsuario();


$app->procesarCompra($idUsuario ,$libro, $udAComprar, $numTarjeta);

header("Location: ../../index.php");

?>