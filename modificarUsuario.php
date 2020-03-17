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

    <body>
        <!--falta la direccion y que luego cambie en la base de datos-->
        <form action="accion.php" method="post">
        <p> Nombre Real: <input type="text" name="nombreReal" value="<?php echo $_SESSION['nombreReal']; ?>"/></p>
        <p> Correo: <input type="text" name="correo" value="<?php echo $_SESSION['correo']; ?>"/></p>
        <p> Foto: <input type="text" name="foto" value="<?php echo $_SESSION['fotoPerfil']; ?>"/></p>
        <p> Ciudad: <input type="text" name="ciudad" value="<?php echo $_SESSION['ciudad']; ?>"/></p>
        <p> Direccion: <input type="text" name="direccion" value="<?php echo $_SESSION['direccion']; ?>"/></p>

        <p><input type="submit" name="accept" value="Cambiar" /></p>
        <p><input type="button" name="cancel" value="Cancelar" onClick="window.location.href='usuario.php';" /></p>
        </form>
    </body>

</html>