<?php
require_once(__DIR__ . "/includes/config.php");
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
  $temasForo = $app->temasForo();

  echo "<br><b>Lista de temas:</b><br>";

  if ($temasForo == NULL){
    echo "Vaya, parece que no existen temas en el foro. Deberás esperar a que esto sea solucionado por un administrador/moderador.<br>";
  }

  else{
      echo '<ul>';
      foreach($temasForo as $tema){
          $nombretema = $tema->getTema();
          echo "<li><a href='PresentacionDiscusiones.php?Tema=$nombretema'>$nombretema</a><br></li>";
      }
      echo '</ul>';
  }

   if (isset($_SESSION["login"]) && $_SESSION["login"] == true && isset($_SESSION["rol"])){
      if ($_SESSION["rol"] == 0 || $_SESSION["rol"] == 2){
        // echo '<br>';
        echo '<fieldset>';
        echo '<legend>Añadir tema:</legend>';

        echo '<form method="post" action="includes/procesos/procesarTema.php">';

        echo '<label for="tema"><b>Tema</b></label><br>';
        echo '<textarea id="tema" name="tema" rows="5" cols="50" placeholder="Escribe aquí el tema que quieras añadir..."></textarea> <br>';

        echo '<button type="submit">Añadir tema</button>';

        echo '</form>';
        echo '</fieldset>';
      }
  
  }

?>
