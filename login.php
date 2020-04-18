<?php
require_once(__DIR__ . "/includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php
include("includes/comun/cabecera.php");
?>

<div id="login">

    <?php
        
        use fdi\ucm\aw\booxchange\formularios\FormularioLogin;

        $form = new FormularioLogin("loginForm", array("action"=>null));

        $form->gestiona();
    ?>

</div>


</html>