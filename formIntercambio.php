<?php

use fdi\ucm\aw\booxchange\appBooxChange;
use fdi\ucm\aw\booxchange\formularios\FormularioIntercambio;


require_once(__DIR__."/includes/config.php");

?><!DOCTYPE html>
<html lang="es">

<head>
    <title>Subir Libro para Intercambiar</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php

    include("includes/comun/cabecera.php");

?><div id="reg" class="border-bigform">
    <div class="title">Intercambiar libro</div>
    <div class="sub-title">Introduzca los datos del libro que quieras intercambiar</div>

<?php
    if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
        echo '<p>';
        echo '    No puedes realizar intercambios si no estas logeado. Si no tienes una cuenta puedes registrarte <a href="registro.php">aquí</a> ,';
        echo '    si ya estás registrado <a href="login.php">inicia sesión</a> .';
        echo '</p>';
    }
    else{
        $form = new FormularioIntercambio("registroForm", array("action"=>null));

        $form->gestiona();
    }
    echo '</div></div>';
  include("./includes/comun/footer.php");

?></html>
