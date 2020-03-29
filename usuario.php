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

        //include("includes/transfers/TUsuario.php");
    ?>

    <div id="contenido">
        <?php
            echo 'Foto : <img src="'.$_SESSION['fotoPerfil'] .'" alt="Imagen de Perfil" height="100" width="100">  <br>';
            echo "Nombre: ".$_SESSION['nombre']."<br>";
            echo "Nombre Real: ". $_SESSION['nombreReal']."<br>";
            echo "Correo: ".$_SESSION['correo']."<br>";
            echo "Ciudad: ". $_SESSION['ciudad']."<br>";
            echo "Direccion: ".$_SESSION['direccion']."<br>";
            echo "Fecha : ".$_SESSION['fechaDeCreacion']."<br>";
            echo "Rol : ".$_SESSION['rol']."<br>";
            
            echo "<a href=modificarUsuario.php> Modificar Perfil </a>";
            //Lo mismo pero con un objeto, pero lo mismo es ilegal
            //$aux = unserialize($_SESSION['usuario']);
            //echo $pene->getNombreUsuario();

        ?>
    </div>



</html>