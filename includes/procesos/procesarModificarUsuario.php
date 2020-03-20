<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");
//include_once($parentDir."/appBooxChange.php");
//include_once($parentDir."/constants.php");
use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

$app = appBooxChange::getInstance();

//Obtener y limpiar los datos 
$idUsuario = $_SESSION['id_Usuario'];
$nombreUsuario =$_SESSION['nombre'];
$nombreReal =  $_SESSION['nombreReal_reg'];
$correo = $_SESSION['correo_reg'];
$password = $_SESSION['password_reg'];
$fotoPerfil = $_SESSION['foto_reg'];
$ciudad = $_SESSION['ciudad_reg'];
$direccion= $_SESSION['direccion_reg'];


$password = password_hash($password, PASSWORD_BCRYPT);

if($app->actualizarPerfil($idUsuario, $nombreReal, $correo, $password, $fotoPerfil, $ciudad, $direccion)){
    //aqui deberia haber una funcion que lo modificase para que el usuario vea el cambio
    //$app->logInUsuario($nombreUsuario, $password);
    header("Location: ../../usuario.php");
}
else{
    header("Location: ../../index.php");
}


?>