<?php
    require_once(__DIR__."/includes/config.php");
    use fdi\ucm\aw\booxchange\formularios\FormularioIntercambioMisterioso;
?><!DOCTYPE html>
<html lang="es">

<head>
    <title>Intercambio Misterioso</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/config.js"></script>
</head>


<?php

include("includes/comun/cabecera.php");

?><div id="reg" class="border-bigform">
    <div class="title">Intercambiar libro</div>
    <div class="sub-title">Introduzca los datos del libro que quieras intercambiar</div>



<?php

    if(!isset($_SESSION["login"])){
        echo '<p>';
        echo '    No puedes realizar intercambios si no estas logeado. Si no tienes una cuenta puedes registrarte <a href="registro.php">aquí</a> ,';
        echo '    si ya estás registrado <a href="login.php">inicia sesión</a> .';
        echo '</p>';
    }

    else{
        $form = new FormularioIntercambioMisterioso("registroForm", array("action"=>null));

        $form->gestiona();
    }

?></div>

<?php
  include("./includes/comun/footer.php");
?></html>
