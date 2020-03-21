<?php
require_once(__DIR__ . "/includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/header.css" />
</head>


<?php
include("includes/comun/cabecera.php");
?>

<div id="login">
    <form method="post" action="includes/procesos/procesarLogin.php">

        <label for="userRealName"><b>Nombre de usuario:</b></label><br>
        <input type="text" placeholder="" name="username" id="username" /><br><br>

        <label for="password"><b>Contraseña:</b></label><br>
        <input type="password" placeholder="" name="password" id="password" /><br><br>

        <input type="submit" value="Iniciar sesión" />
    </form>

    <?php
        
        use fdi\ucm\aw\booxchange\formularios\FormularioLogin;

        echo "NUEVO FORM";

        $form = new FormularioLogin("loginForm", array("action"=>null));

        $form->gestiona();
    ?>

</div>


</html>