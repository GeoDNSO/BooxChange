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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/config.js"></script>
    <script type="text/javascript" src="javascript/preValidacion.js"></script>
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
