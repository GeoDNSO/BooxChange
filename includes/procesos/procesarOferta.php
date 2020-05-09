<?php


$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TOfertasIntercambio as TOfertasIntercambio;



$aceptado = intval($_GET["aceptado"]);
$aceptado = ($aceptado == 0) ? false : true;
$idOferta = intval($_GET["id"]);

$idLibroQuerido = intval($_GET["idLibro1"]);
$idLibroOfertado = intval($_GET["idLibro2"]);

$app = appBooxChange::getInstance();

$libroQuerido = $app->getLibroIntercambio($idLibroQuerido);
$libroOfertado = $app->getLibroIntercambio($idLibroOfertado);

$app->procesarResultadoOferta($aceptado, $idOferta, $libroQuerido, $libroOfertado);

header("Location: ../../intercambiosNormales.php");
