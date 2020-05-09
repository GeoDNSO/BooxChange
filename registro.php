<?php
require_once(__DIR__ . "/includes/config.php");
?><!DOCTYPE html>
<html lang="es">
    <head>
        <title>BooxChange</title>
        <meta charset="UTF-8" />
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    </head>

    <?php
        include("includes/comun/cabecera.php");
    ?><div id="reg" class="border">
    <div class="title">Registro</div>
    <div class="sub-title">Aquí comienza tu aventura en Booxchange</div> <br>
    <?php
        use fdi\ucm\aw\booxchange\formularios\FormularioRegistro;

        $form = new FormularioRegistro("registroForm", array("action"=>null));

        $form->gestiona();
    ?></div>

<?php
  include("./includes/comun/footer.php");
?></html>
