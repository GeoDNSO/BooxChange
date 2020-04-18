<?php

use fdi\ucm\aw\booxchange\appBooxChange;
use fdi\ucm\aw\booxchange\formularios\FormularioIntercambio;


require_once(__DIR__."/includes/config.php");
    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Subir Libro para Intercambiar</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php

include("includes/comun/cabecera.php");

?>

<h1>Libro que vas a intercambiar</h1>


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

?>


</html>