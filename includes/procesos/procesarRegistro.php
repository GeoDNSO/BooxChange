<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");
//include_once($parentDir."/appBooxChange.php");
//include_once($parentDir."/constants.php");
use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

$app = appBooxChange::getInstance();

$_SESSION[REG_PASS_EQ] = true;
$_SESSION[REG_DATA_NO_SET] = false;

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
