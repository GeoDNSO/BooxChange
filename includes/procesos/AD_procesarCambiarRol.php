<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

if(!isset($_SESSION['nombre'])){
    exit("No se encuentra el nombre en la sesion");
}

$rol = $_POST["rol"];

$app = appBooxChange::getInstance();

$idUsuario = unserialize($_SESSION["modificarRol"]);

if($app->procesarCambiarRol($idUsuario ,$rol)){
    header("Location: ../../AD_listaUsuarios.php");
}
else{
    header("Location: ../../index.php");
}
