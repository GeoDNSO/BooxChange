<?php
require_once(__DIR__."/includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
<title>Resultado Intercambio Misterioso</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="css/header.css" />
</head>

<?php

include("includes/comun/cabecera.php");

?>

<h1>Resultado del Intercambio Misterioso</h1>


<?php

$rst = intval($_GET["resultado"]);

if($rst == 0){
    echo '<p>';
    echo '    No hay libros disponibles para el intercambio misterioso, pero tranquilo tu libro se ha registrado';
    echo '    en cuanto encontremos a alguien buscando un libro misterioso se te notificará por la página web';
    echo '</p>';
}
else{
    echo '<p>Intercambio con exito</p>';
}

?>


</html>