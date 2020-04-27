<?php
require_once(__DIR__ . "/includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />

</head>


<?php
include("includes/comun/cabecera.php");
?>

<div id="login" class="border">
    <div class="title">Inicio de sesión</div>
    <div class="sub-title">Introduzca sus credenciales por favor</div>
    <?php
        
        use fdi\ucm\aw\booxchange\formularios\FormularioLogin;

        

        $form = new FormularioLogin("loginForm", array("action"=>null));

        $form->gestiona();
    ?>

</div>


</html>