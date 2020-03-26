<?php
require_once(__DIR__ . "/includes/config.php");
$tema = ($_GET["Tema"]); //Titulo del tema, su tabla nada más olo tiene una columna
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
  $listaDiscusionesTema = $app->discusionesTema($tema);

  echo "<b>Lista de discusiones de $tema:</b><br>";

  if ($listaDiscusionesTema == NULL){
  	echo "Vaya, parece que este tema no tiene discusiones. Prueba a añadir una.<br>";
  }

  else{
		echo '<ul>';
  		foreach($listaDiscusionesTema as $discusion){
      			$discusionTema = $discusion->getIdTema();
			    $discusionId = $discusion->getIdDiscusion();
			    $discusionIdusuario = $discusion->getIdUsuarioCreador();
			    $discusionFecha = $discusion->getFecha();
			    $discusionTitulo = $discusion->getTitulo();
				echo "<li><a href='PresentacionComentarios.php?Discusion=$discusionId'>$discusionTitulo</a><br></li>";
		}
		echo '</ul>';
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
    echo 'Crear discusión: debes haber iniciado sesión para crear una discusión';
  }
?>
