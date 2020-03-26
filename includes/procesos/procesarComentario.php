<?php
$parentDir = dirname(__DIR__, 1);
$idDiscusion = ($_GET["id"]);
require_once($parentDir."/config.php");


use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
//include_once($parentDir."/appBooxChange.php");
//include_once($parentDir."../constants.php");

$app = appBooxChange::getInstance();


//Id se puede dejar nulo

$comentario = $_POST["textoComentario"];

/*echo $comentario;
echo $idDiscusion;
exit();
*/

$app->anadirComentario($_SESSION["id_Usuario"], $comentario, $idDiscusion);
header("Location: ../../presentacionComentarios.php?Discusion=$idDiscusion");

?>