<?php
require_once(__DIR__ . "/includes/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TTema as TTema;

function foro()
{

    $app = appBooxChange::getInstance();
    $temasForo = $app->temasForo();


    echo '<div id=boardindex_table>';
    echo '<table class= "table_list"';
    echo '<tbody class= "table_header">';
    echo '<tr>';
    echo '<td colspan="3">';


    if ($temasForo != NULL) {
      echo '<div class=temas>';
      echo '<h1 class=titema>Temas del Foro</h1>';
      echo '</td></tr></tbody>';
      echo '<tbody class= content>';
      echo '<tr class=colu>';
        foreach ($temasForo as $tema) {
            $nombretema = $tema->getTema();
            $descripciontema = $tema->getDesc();
            $imagentema = $tema->getImagen();
            $contDisc = $app->contadorDiscusiones($nombretema);

            echo "<td class=imagen><img src='$imagentema' alt='Imagen del Tema' height='100' width='100'></td>";
            echo "<td class=info><a href='PresentacionDiscusiones.php?Tema=$nombretema'><b>$nombretema</b></a><br>$descripciontema</td>";
            echo "<td class=stats> Número de Discusiones: $contDisc </td>";
            echo '</tr>';
        }
    } else {
        echo "<p class=noDiscusion> Vaya, parece que no existen temas en el foro.<br>Deberás esperar a que esto sea solucionado por un administrador o moderador.<p>";
    }
    echo "</table></tbody>";
    if (isset($_SESSION["login"]) && $_SESSION["login"] == true && isset($_SESSION["rol"])) {
        if ($_SESSION["rol"] == 0 || $_SESSION["rol"] == 2) {

            echo '<fieldset id="cajaformTema">';
            echo '<legend id="anadirTema">Añadir Tema</legend>';

            echo '<form method="post" class=foroForm action="includes/procesos/procesarTema.php" enctype="multipart/form-data"> ';

            
            echo '<label for="foto"><b>Icono del Tema</b></label>';
            echo '<input type="file" class=login name="foto" id="foto" accept="image/*" />';

            echo '<label for="tema"><b>Tema</b></label>';
            echo '<input type="text" class=login id="temaForoEstrecho" name="tema"  placeholder="Introduzca el nombre del tema..." />';

            echo '<label class=marginDescForo for="desc"><b>Descripcion</b></label>';
            echo '<textarea id="desc" class="blancoForo" name="desc" rows="5" cols="50" placeholder="Escriba una pequeña descripción del tema que desea añadir..."></textarea> ';

            echo '<br>';
            echo '<button type="submit" class=botonAnTema>Añadir tema</button>';

            echo '</form>';
            echo '</fieldset>';
        }
    }
    echo "</table></div>";
}


?><!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange Foro</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>

<?php
include_once(__DIR__ . "/includes/comun/cabecera.php");
?><body>

    <?php
    foro();
    ?></body>

<?php
include_once(__DIR__ . "/includes/comun/footer.php");
?></html>
