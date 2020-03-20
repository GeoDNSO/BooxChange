<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");
//include_once($parentDir."/appBooxChange.php");
//include_once($parentDir."/constants.php");
use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

$app = appBooxChange::getInstance();

$_SESSION[REG_PASS_EQ] = true;
$_SESSION[REG_DATA_NO_SET] = false;

//Id se puede dejar nulo

//Obtener y limpiar los datos 
$nombreUsuario = $_SESSION['nombreUsuario_reg'];
$nombreReal =  $_SESSION['nombreReal_reg'];
$correo = $_SESSION['correo_reg'];
$password = $_SESSION['password_reg'];
$fotoPerfil = $_SESSION['foto_reg'];
$fechaNacimiento = $_SESSION['fechaNacimiento_reg'];
$ciudad = $_SESSION['ciudad_reg'];
$direccion= $_SESSION['direccion_reg'];
$rol = BD_TYPE_NORMAL_USER; //Usuario normal por defecto

date_default_timezone_set("Europe/Madrid");
$fechaDeCreacion = date_default_timezone_get(); //REVIsAR FORMATO PARA LA BASE DE DATOS??


if(!$_SESSION[REG_DATA_NO_SET] && $_SESSION[REG_PASS_EQ]){

    $password = password_hash($password, PASSWORD_BCRYPT);
    //El id se ignorará, se asignara automáticamente
  
    if( $app->registrarUsuario($nombreUsuario, $nombreReal, $correo, $password, $fotoPerfil,
     $fechaNacimiento, $rol, $ciudad, $direccion, $fechaDeCreacion)){
        //echo "Ha sido registrado correctamente";

        //Cuando se crea una cuenta, te loguea automáticamente
        $app->logInUsuario($nombreUsuario, $password);
        header("Location: ../../index.php");
    }
    else{
        header("Location: ../../registro.php");
    }

}

?>