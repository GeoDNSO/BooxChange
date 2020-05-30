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
    <link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/config.js"></script>
    <script type="text/javascript" src="javascript/popups_Foro.js"></script>
</head>

<?php
include_once(__DIR__ . "/includes/comun/cabecera.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TTema as TTema;

$vacio = "";

$app = appBooxChange::getInstance();
$listaDiscusionesTema = $app->discusionesTema($tema);
echo '<div id=boardindex_table>';


if ($listaDiscusionesTema != NULL) {
    echo "<table class='table_list'";
    echo "<tbody class= table_header>";
    echo "<tr>";
    echo "<td colspan='3'>";
    echo "<div class='temas'>";
    echo "<h1 class='titema'>Lista de discusiones de $tema</h1>";
    echo "</div></td></tr></tbody>";
    echo "<tbody class= 'content'>";
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

        echo "<td class=imagen><a href='PresentacionComentarios.php?Discusion=$discusionId'><b>$discusionTitulo</b></a><br> Discusion creada por $nombreusu";
        echo "<td class=info>Respuestas totales: $contCom</td>";
        echo "<td class=stats >$discusionFecha</small></td>";
        echo '</tr>';

    }

    echo "</table></tbody>";
}

else {
    echo "<p class=noDiscusion>Vaya, parece que este tema no tiene discusiones. Prueba a añadir una.</p><br>";
}



if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
    // echo '<br>';
    echo '<fieldset id="cajaformTema">';
    echo '<legend id="anadirTema">Crear discusion</legend>';

    echo '<form method="post" class=foroForm action="includes/procesos/procesarDiscusion.php?tema=' . $tema . '">';

    echo '<label for="tituloDiscusion"><b>Discusion</b></label>';
    echo '<textarea id="desc" class="blancoForo" name="tituloDiscusion" rows="5" cols="50" placeholder="Escribe aquí el título de la discusión..."></textarea> <br>';
    echo '<div class="popup" onmouseover="myBotonDisc()">';
    echo '<span class="popuptext" id="myPopupDisc">¿Seguro que quieres crear esta discusión?</span>';
    echo '<button class=botonAnTema type="submit" onclick="alertaDiscusion()">Crear discusión</button>';
    echo '</div>';


    echo '</form>';
    echo '</fieldset>';
} else {
    echo '<p class=noDiscusion>Crear discusión: debes haber iniciado sesión para crear una discusión</p>';
}

echo "</div>";
include_once(__DIR__ . "/includes/comun/footer.php");

?></html>
