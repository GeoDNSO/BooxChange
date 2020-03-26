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
      $comentarioIdUsuario = $comentario->getIdUsuario();
      $comentarioTexto = $comentario->getTexto();
      $comentarioFecha = $comentario->getFecha();
      $comentarioDiscusionId = $comentario->getIdDiscusion();

      $usuario = $app->getUserById($comentarioIdUsuario);
      $nombreUsuario = $usuario->getNombreUsuario();
      echo "$comentarioTexto -$nombreUsuario $comentarioFecha<br>";
}


  if (isset($_SESSION["login"]) && $_SESSION["login"] == true){
      echo '<fieldset>';
      echo '<legend>Añadir comentario:</legend>';

      echo '<form method="post" action="includes/procesos/procesarComentario.php?id='. $idDiscusion. '">';

      echo '<label for="textoComentario"><b>Comentario</b></label><br>';
      echo '<textarea id="textoComentario" name="textoComentario" rows="5" cols="50" placeholder="Escribe aquí tu comentario..."></textarea> <br>';

      echo '<button type="submit">Subir comentario</button>';

      echo '</form>';
      echo '</fieldset>';
  }
  else {
    echo 'Debes registrarte si deseas añadir un comentario';
  }
?>


