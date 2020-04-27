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

    <?php
        use \fdi\ucm\aw\booxchange\formularios\FormularioModificarPerfil;

        $form = new FormularioModificarPerfil("formModPerfil", array("action"=>null));

        $form->gestiona();

    ?>

</html>