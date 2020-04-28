<?php
require_once(__DIR__ . "/includes/config.php");
$tema = ($_GET["Tema"]); //Titulo del tema, su tabla nada más olo tiene una columna
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BooxChange Foro</title>
        <meta charset="UTF-8" />
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    </head>

<?php
  include_once(__DIR__."/includes/comun/cabecera.php");

  use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
  use fdi\ucm\aw\booxchange\transfers\TTema as TTema;


  $app = appBooxChange::getInstance();
  $listaDiscusionesTema = $app->discusionesTema($tema);
  echo "<table class='discusiones'";
  echo "<tbody class= table_header_disc>";
  echo "<tr>";
  echo "<td colspan='3'>";
  echo "<div class='discusiones'>";
  echo "<h1>Lista de discusiones de $tema:</h1><br>";
  echo "</div></td></tr></tbody>";
  echo "<tbody class= 'content'>";



  if ($listaDiscusionesTema != NULL){
    echo '<tr>';
      foreach($listaDiscusionesTema as $discusion){
            $discusionTema = $discusion->getIdTema();
          $discusionId = $discusion->getIdDiscusion();
          $discusionIdusuario = $discusion->getIdUsuarioCreador();
          $discusionFecha = $discusion->getFecha();
          $discusionTitulo = $discusion->getTitulo();
          echo "<td class=tituloDiscusion><a href='PresentacionComentarios.php?Discusion=$discusionId'>$discusionTitulo</a><br> <small>Discusion creada por usuario";
          echo "<td class=respuestas>'numero de respuestas'</td>";
          echo "<td class=creacion >Fecha de creación<br> <small>$discusionFecha</small></td>";
          echo '</tr>';
    }

  }

  else{

    echo "<p>Vaya, parece que este tema no tiene discusiones. Prueba a añadir una.</p><br>";
 }

	 if (isset($_SESSION["login"]) && $_SESSION["login"] == true){
	// echo '<br>';
      echo '<fieldset>';
      echo '<legend>Crear discusion:</legend>';

      echo '<form method="post" action="includes/procesos/procesarDiscusion.php?tema='. $tema. '">';

      echo '<label for="tituloDiscusion"><b>Discusion</b></label><br>';
      echo '<textarea id="tituloDiscusion" name="tituloDiscusion" rows="5" cols="50" placeholder="Escribe aquí el título de la discusión..."></textarea> <br>';

      echo '<button type="submit">Crear discusión</button>';

      echo '</form>';
      echo '</fieldset>';
  }
  else {
      echo '<p>Crear discusión: debes haber iniciado sesión para crear una discusión</p>';
  }
?>
