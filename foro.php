<?php
require_once(__DIR__ . "/includes/config.php");
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
  $temasForo = $app->temasForo();


  echo '<div id=boardindex_table>';
  echo '<table class= "table_list"';
  echo '<tbody class= "table_header">';
  echo '<tr>';
  echo '<td colspan="3">';
  echo '<div class=temas>';
  echo '<h1 class=titema>Temas del Foro</h1>';
  echo '</td></tr></tbody>';
  echo '<tbody class= content>';

  if ($temasForo != NULL){
    echo '<tr class=colu>';
    foreach($temasForo as $tema){
        $nombretema = $tema->getTema();
        $descripciontema=$tema->getDesc();
        $imagentema = $tema->getImagen();
        $contDisc = $app->contadorDiscusiones($nombretema);

        echo "<td class=imagen><img src='$imagentema' alt='Imagen del Tema' height='100' width='100'>  <br></td>";
        echo "<td class=info><a href='PresentacionDiscusiones.php?Tema=$nombretema'>$nombretema</a><br>$descripciontema</td>";
        echo "<td class=stats> Número de Discusiones: $contDisc </td>";
        echo '</tr>';

    }


  }

  else{
    echo "Vaya, parece que no existen temas en el foro. Deberás esperar a que esto sea solucionado por un administrador/moderador.<br>";
  }
  echo "</table></tbody>";
   if (isset($_SESSION["login"]) && $_SESSION["login"] == true && isset($_SESSION["rol"])){
      if ($_SESSION["rol"] == 0 || $_SESSION["rol"] == 2){
        // echo '<br>';
        echo '<fieldset id="cajaformTema">';
        echo '<legend id="anadirTema"Añadir tema:</legend>';

        echo '<form method="post" action="includes/procesos/procesarTema.php" enctype="multipart/form-data"> ';

        echo '<label for="foto"><b>Icono del Tema</b></label><br>';
        echo '<input type="file" name="foto" id="foto" accept="image/*" /> <br><br>';

        echo '<label for="tema"><b>Tema</b></label><br>';
        echo '<input type="text" id="imputtema" name="tema"  placeholder="Nombre del tema a añadir..." /> <br>';

        echo '<label for="desc"><b>Descripcion</b></label><br>';
        echo '<textarea id="desc" name="desc" rows="5" cols="50" placeholder="Escribe aquí sobre que va a tratar el tema..."></textarea> <br>';


        echo '<button type="submit">Añadir tema</button>';

        echo '</form>';
        echo '</fieldset>';
      }

  }
  echo "</table></div>";
  include_once(__DIR__."/includes/comun/footer.php");

?>
