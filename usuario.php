<!DOCTYPE html>
<html lang="es">
    <head>
        <title>BooxChange</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
    </head>


    <?php
        include("includes/transfers/TUsuario.php");
        include("includes/comun/cabecera.php"); 
    ?>

    <div id="contenido">
        <?php
            echo "Nombre: ".$_SESSION['nombre']."<br>";
            echo "Nombre Real: ". $_SESSION['nombreReal']."<br>";
            echo "Correo: ".$_SESSION['correo']."<br>";
            echo "Foto? : ".$_SESSION['fotoPerfil']."<br>";
            echo "Ciudad: ". $_SESSION['ciudad']."<br>";
            echo "Direccion: ".$_SESSION['direccion']."<br>";
            echo "Fecha : ".$_SESSION['fechaDeCreacion']."<br>";
            echo "Rol : ".$_SESSION['rol']."<br>";
            
            //Lo mismo pero con un objeto, pero lo mismo es ilegal
            //$aux = unserialize($_SESSION['usuario']);
            //echo $pene->getNombreUsuario();

        ?>
    </div>



</html>