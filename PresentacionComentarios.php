<?php
require_once(__DIR__ . "/includes/config.php");
$idDiscusion = ($_GET["Discusion"]);
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
  use fdi\ucm\aw\booxchange\transfers\TDiscusion as TDiscusion;


  $app = appBooxChange::getInstance();
  $listaComentariosDiscusion = $app->comentariosDiscusion($idDiscusion);

  $discusion = $app->getDiscusionById($idDiscusion);
  $tituloDiscusion = $discusion->getTitulo();

  echo "<div class='generalCom'>";
  echo "<div class='tituloCom'>";
  echo "<h1 class='titCom'>Comentarios de $tituloDiscusion:</h1>";
  echo " </div>";
  if ($listaComentariosDiscusion == NULL){
    echo "Vaya, parece que esta discusión no tiene comentarios. Prueba a añadir uno.<br>";
  }

  else{

      foreach($listaComentariosDiscusion as $comentario){
          $comentarioIdUsuario = $comentario->getIdUsuario();
          $comentarioTexto = $comentario->getTexto();
          $comentarioFecha = $comentario->getFecha();
          $comentarioDiscusionId = $comentario->getIdDiscusion();

          $usuario = $app->getUserById($comentarioIdUsuario);
          $rolUsuario = $usuario->getRol();
          $fotoUsu = $usuario->getFotoPerfil();
          $nombreUsuario = $usuario->getNombreUsuario();
          echo "<div class='comentarioCom'>";
          echo "<div class='fechaCom'>";
          echo $comentarioFecha;
          echo "</div>";
          echo "<div class='usuCom'>";
          echo "<div class='usuComVert'>";
          echo "<p class=usuariocomvert>" . $nombreUsuario . "</p>";
          echo "<p class=rolusuariocomvert>";
          switch ($rolUsuario){
            case 0:
            echo "administrador";
              break;
            case 1:
            echo "usuario registrado";
              break;
            case 2:
            echo "moderador";
              break;
            default:
            echo "error al identificar rol";
              break;
          }
          echo"</p>";
          echo '<img src="' . $fotoUsu . '"alt="Imagen de Usuario" height="100" width="100">';
          echo "</div>";
          echo "<div class='comentarioVert'>";
          echo "<p class='titComVert'><b>$tituloDiscusion</b></p>";
          echo "<p class='cuerpoComVert'>$comentarioTexto</p>";
          echo "</div></div></div>";



      }


}
      echo "</div>";
  if (isset($_SESSION["login"]) && $_SESSION["login"] == true){
      //echo '<br>';
      echo '<fieldset id="cajaformcomment">';
      echo '<legend id="anadircomment">Añadir comentario:</legend>';

      echo '<form method="post" action="includes/procesos/procesarComentario.php?id='. $idDiscusion. '">';

      echo '<label for="textoComentario"><b>Comentario</b></label><br>';
      echo '<textarea id="textoComentario" name="textoComentario" rows="5" cols="50" placeholder="Escribe aquí tu comentario..."></textarea> <br>';

      echo '<button id="botontema" type="submit">Subir comentario</button>';

      echo '</form>';
      echo '</fieldset>';
  }
  else {
    echo 'Añadir comentario: debes haber iniciado sesión para añadir un comentario';
  }

  include_once(__DIR__."/includes/comun/footer.php");
?>
