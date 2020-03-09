<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BooxChange</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
    </head>


    <?php
        include("includes/comun/cabecera.php")
    ?>

    <div id="login">
    <form method = "post" action="includes/procesos/procesarLogin.php">
        Nombre de usuario:
        <input type="text" name="username"/>
        <br>
        Contraseña:
        <input type="password" name="password"/>
        <br>
        <input type="submit" value="Iniciar sesión"/>
    </div>


</html>