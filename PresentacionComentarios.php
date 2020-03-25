<?php
require_once(__DIR__ . "/includes/config.php");
$idDiscusion = ($_GET["Discusion"]);
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BooxChange Foro</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
    </head>

<?php
  include_once(__DIR__."/includes/comun/cabecera.php");

  use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
  use fdi\ucm\aw\booxchange\transfers\TDiscusion as TDiscusion;


  $app = appBooxChange::getInstance();
  $listaComentariosDiscusion = $app->comentariosDiscusion($idDiscusion);
  foreach($listaComentariosDiscusion as $comentario){
      $comentarioId = $comentario->getIdUsuario();
      $comentarioTexto = $comentario->getTexto();
      $comentarioFecha = $comentario->getFecha();
      $comentarioDiscusionId = $comentario->getIdDiscusion();



      echo "$comentarioTexto "."$comentarioFecha<br>";
}
?>
