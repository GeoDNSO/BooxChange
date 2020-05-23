<?php
require_once(__DIR__ . "/includes/config.php");
?><!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/config.js"></script>
</head>


<?php
include("includes/comun/cabecera.php");
?><div id="login" class="border">
    <div class="title">Inicio de sesión</div>
    <div class="sub-title">Introduzca sus credenciales por favor</div>
    <?php
        use fdi\ucm\aw\booxchange\formularios\FormularioLogin;

        $form = new FormularioLogin("loginForm", array("action"=>null));

        $form->gestiona();
    ?></div></html>
