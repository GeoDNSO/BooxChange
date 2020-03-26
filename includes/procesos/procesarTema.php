<?php
$parentDir = dirname(__DIR__, 1);
//$idDiscusion = ($_GET["id"]);
require_once($parentDir."/config.php");


use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
//include_once($parentDir."/appBooxChange.php");
//include_once($parentDir."../constants.php");

$app = appBooxChange::getInstance();


//Id se puede dejar nulo

$tema = $_POST["tema"];

//echo $tema;
//exit();
/*
echo $idDiscusion;
exit();
*/

$app->anadirTema($tema);
header("Location: ../../foro.php");

?>