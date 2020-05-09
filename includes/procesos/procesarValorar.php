<?php
$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");


use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

$app = appBooxChange::getInstance();

$idLibro = $_POST['libro'];
$valoracion = $_POST['estrellas'];
$idUsuario = $_SESSION['id_Usuario'];
$comentario = isset($_POST['comentario']) ? $_POST['comentario'] : null;
$comentario = make_safe($comentario);

$app->valorarLibro($idLibro, $valoracion, $idUsuario, $comentario);

header("Location: ../../libroTienda.php?id=$idLibro");
