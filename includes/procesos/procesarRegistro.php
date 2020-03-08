<?php
    
include_once("includes/appBooxChange.php");
include_once("includes/constants.php");

$app = appBooxChange::getInstance();


//Id se puede dejar nulo

$nombreUsuario = $_POST[REG_USERNAME];
$nombreReal = $_POST[REG_REALNAME];
$correo = $_POST[REG_EMAIL];
$password = $_POST[REG_PASS];
$passwordR = $_POST[REG_PASSR];
$fotoPerfil = $_POST[REG_FOTO]; 
$fechaNacimiento= $_POST[REG_FECHA_NAC];
$rol = BD_TYPE_NORMAL_USER; //Usuario normal por defecto
$ciudad= $_POST[REG_CIUDAD];
$direccion= $_POST[REG_DIRECCION];

date_default_timezone_set("Europe/Madrid");
$fechaDeCreacion = date_default_timezone_get(); //REVIsAR FORMATO PARA LA BASE DE DATOS??

$app->registrarUsuario($idUsuario, $nombreUsuario, $nombreReal, $correo, $password, $fotoPerfil, $fechaNacimiento, $rol, $ciudad, $direccion, $fechaDeCreacion)

?>