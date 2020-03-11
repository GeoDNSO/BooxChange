<?php
    
include_once("../appBooxChange.php");
include_once("../constants.php");

$app = appBooxChange::getInstance();


//Id se puede dejar nulo

$nombreUsuario = $_POST[LOG_USERNAME];
$password = $_POST[LOG_PASSWORD];


$app->logInUsuario($nombreUsuario, $password);
header("Location: ../../index.php");

?>