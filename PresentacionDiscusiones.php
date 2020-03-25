<?php
require_once(__DIR__ . "/includes/config.php");
$idTema = ($_GET["Tema"]);
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
  use fdi\ucm\aw\booxchange\transfers\TTema as TTema;


  $app = appBooxChange::getInstance();
  $listaDiscusionesTema = $app->discusionesTema($idTema);
  foreach($listaDiscusionesTema as $discusion){
      $discusionTema = $discusion->getIdTema();
      $discusionId = $discusion->getIdDiscusion();
      $discusionIdusuario = $discusion->getIdUsuarioCreador();
      $discusionFecha = $discusion->getFecha();
      $discusionTitulo = $discusion->getTitulo();


      echo "<a href='PresentacionComentarios.php?Discusion=$discusionId'>$discusionTitulo</a><br>";
}
?>
