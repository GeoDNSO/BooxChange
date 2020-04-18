<?php
    require_once("./includes/config.php");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php
    include("./includes/comun/cabecera.php");
?>

<div class="botonAdmin">
    <a href= "AD_listaUsuarios.php"> Lista de Usuarios </a>
</div>

<div class="botonAdmin">
    <a href= "AD_subirLibro.php"> Subir un libro </a>
</div>

<div class="botonAdmin">
    <a href= "AD_listaLibros.php"> Lista de Libros </a>
</div>


</html>