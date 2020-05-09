<?php
require_once(__DIR__ . "/includes/config.php");
$tema = ($_GET["Tema"]); //Titulo del tema, su tabla nada más olo tiene una columna
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

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TTema as TTema;

$vacio = "";

$app = appBooxChange::getInstance();
$listaDiscusionesTema = $app->discusionesTema($tema);
echo '<div id=board_index_table>';
echo "<table class='discusiones'";
echo "<tbody class= table_header_disc>";
echo "<tr>";
echo "<td colspan='3'>";
echo "<div class='divdiscusiones'>";
echo "<h1 class='tiDisc'>Lista de discusiones de $tema:</h1><br>";
echo "</div></td></tr></tbody>";
echo "<tbody class= 'discontent'>";



if ($listaDiscusionesTema != NULL) {
    echo '<tr>';
    foreach ($listaDiscusionesTema as $discusion) {
        $discusionTema = $discusion->getIdTema();
        $discusionId = $discusion->getIdDiscusion();
        $discusionIdusuario = $discusion->getIdUsuarioCreador();
        $discusionFecha = $discusion->getFecha();
        $discusionTitulo = $discusion->getTitulo();
        $contCom = $app->contadorComentarios($discusionId);
        $usuarionom = $app->getUserById($discusionIdusuario);
        $nombreusu = $usuarionom->getNombreUsuario();

        echo "<td class=tituloDiscusion><a href='PresentacionComentarios.php?Discusion=$discusionId'>$discusionTitulo</a><br> <small>Discusion creada por $nombreusu";
        echo "<td class=respuestas> Numero de respuestas: $contCom</td>";
        echo "<td class=creacion >Fecha de creación<br> <small>$discusionFecha</small></td>";
        echo '</tr>';
    }
} else {
    $vacio = "Vaya, parece que este tema no tiene discusiones. Prueba a añadir una.<br>";
}
echo "</table></tbody>";


if ($vacio != "") {
    echo "<p> $vacio </p>";
}

if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
    // echo '<br>';
    echo '<fieldset id="cajaformDisc">';
    echo '<legend id="anadirDisc">Crear discusion:</legend>';

    echo '<form method="post" action="includes/procesos/procesarDiscusion.php?tema=' . $tema . '">';

    echo '<label for="tituloDiscusion"><b>Discusion</b></label><br>';
    echo '<textarea id="tituloDiscusion" name="tituloDiscusion" rows="5" cols="50" placeholder="Escribe aquí el título de la discusión..."></textarea> <br>';

    echo '<button id="botondisc" type="submit">Crear discusión</button>';

    echo '</form>';
    echo '</fieldset>';
} else {
    echo 'Crear discusión: debes haber iniciado sesión para crear una discusión';
}




echo "</div>";
include_once(__DIR__ . "/includes/comun/footer.php");

?></html>
