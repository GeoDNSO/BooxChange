<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
//include_once($parentDir."/appBooxChange.php");
//include_once($parentDir."../constants.php");

$app = appBooxChange::getInstance();


//Id se puede dejar nulo

$nombreUsuario = $_POST[LOG_USERNAME];
$password = $_POST[LOG_PASSWORD];


$app->logInUsuario($nombreUsuario, $password);
header("Location: ../../index.php");

?>