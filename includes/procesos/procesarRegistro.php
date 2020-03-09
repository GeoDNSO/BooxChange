<?php
    
include_once("../appBooxChange.php");
include_once("../constants.php");

$app = appBooxChange::getInstance();

$_SESSION[REG_PASS_EQ] = true;
$_SESSION[REG_DATA_NO_SET] = false;

//Id se puede dejar nulo

//Obtener y limpiar los datos 
$nombreUsuario = htmlspecialchars($_POST[REG_USERNAME]);
$nombreReal = htmlspecialchars($_POST[REG_REALNAME]);
$correo = htmlspecialchars($_POST[REG_EMAIL]);
$password = htmlspecialchars($_POST[REG_PASS]);
$passwordR = htmlspecialchars($_POST[REG_PASSR]);
$fotoPerfil = htmlspecialchars($_POST[REG_FOTO]); 
$fechaNacimiento = htmlspecialchars($_POST[REG_FECHA_NAC]);
$rol = BD_TYPE_NORMAL_USER; //Usuario normal por defecto
$ciudad = htmlspecialchars($_POST[REG_CIUDAD]);
$direccion= htmlspecialchars($_POST[REG_DIRECCION]) ;


//Comprobar con la funcion empty
//Comprobar si se han introducido los datos
if(!isset($nombreUsuario) || !isset($nombreReal) || !isset($correo) || 
    !isset($password) || !isset($passwordR) || !isset($fechaNacimiento) || !isset($ciudad) || !isset($direccion)){
        echo "algun campo vacio o nulo";
        $_SESSION[REG_DATA_NO_SET] = true;
}


if($passwordR != $password){
    echo "Contraseñas diferentes";
    $_SESSION[REG_PASS_EQ] = false;
}


date_default_timezone_set("Europe/Madrid");
$fechaDeCreacion = date_default_timezone_get(); //REVIsAR FORMATO PARA LA BASE DE DATOS??

if($_SESSION[REG_DATA_NO_SET] == false && $_SESSION[REG_PASS_EQ] == true){
    echo "Registro bien";
    $password = password_hash($password, PASSWORD_BCRYPT);
    //El id se ignorará, se asignara automáticamente
    $app->registrarUsuario("", $nombreUsuario, $nombreReal, $correo, $password, $fotoPerfil, $fechaNacimiento, $rol, 
                                $ciudad, $direccion, $fechaDeCreacion);

}



?>