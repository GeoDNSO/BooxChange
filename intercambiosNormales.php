<?php
    require_once(__DIR__."/includes/config.php");
    use fdi\ucm\aw\booxchange\formularios\FormularioIntercambio;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Intercambios Normales</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/header.css" />
</head>


<?php

include("includes/comun/cabecera.php");

?>

<h1>Intercambios Normales</h1>


<?php

/*
if(!isset($_SESSION["login"])){
    echo '<p>';
    echo '    No puedes realizar intercambios sin no estas logeado. Si no tienes una cuenta puedes registrarte <a href="registro.php">aquí</a> ,';
    echo '    si ya estás registrado <a href="login.php">inicia sesión</a> .';
    echo '</p>';
}

else{
    $form = new FormularioIntercambio("registroForm", array("action"=>null));

    $form->gestiona();
}
*/

?>



</html>