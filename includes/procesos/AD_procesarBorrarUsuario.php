<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

if(!isset($_SESSION['nombre'])){
    exit("No se encuentra el nombre en la sesion");
}

$app = appBooxChange::getInstance();

$idUsuario = $_GET["id"];
if($idUsuario == $_SESSION["id_Usuario"]){
    exit("No te puedes borrar a ti mismo");
}
else {
    if($app->procesarBorrarUsuario($idUsuario)){
        header("Location: ../../AD_listaUsuarios.php");
    }
    else{
        header("Location: ../../index.php");
    }
}
