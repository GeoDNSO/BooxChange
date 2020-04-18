<?php
    require_once(__DIR__."/includes/config.php");
    use fdi\ucm\aw\booxchange\formularios\FormularioIntercambioMisterioso;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Intercambio Misterioso</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php

include("includes/comun/cabecera.php");

?>

<h1>Intercambio Misterioso</h1>

<p>Explicación de como funciona...</p>


<h2>Formulario...</h2>



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

?>


</html>