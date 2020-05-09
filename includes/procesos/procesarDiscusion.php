<?php
$parentDir = dirname(__DIR__, 1);
$tema = ($_GET["tema"]);
require_once($parentDir."/config.php");


use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
//include_once($parentDir."/appBooxChange.php");
//include_once($parentDir."../constants.php");

$app = appBooxChange::getInstance();


//Id se puede dejar nulo

$discusion = $_POST["tituloDiscusion"];
/*
echo $tema;
echo $discusion;
exit();
*/

$app->anadirDiscusion($_SESSION["id_Usuario"], $tema, $discusion);
header("Location: ../../presentacionDiscusiones.php?Tema=$tema");
