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
 
        $nombreReal = $_SESSION['nombreReal'];
        $correo = $_SESSION['correo'];
        $foto = $_SESSION['fotoPerfil'];
        $password = "";
        $passwordR = "";
        $ciudad = $_SESSION['ciudad'];
        $direccion = $_SESSION['direccion']; 

        if (isset($_POST['userRealName'])){
            $_SESSION['nombreReal_reg'] = $nombreReal = $_POST['userRealName'];
        }
        if(isset($_POST['email'])){
            $_SESSION['correo_reg'] = $correo = $_POST['email'];
        }
        if(isset($_POST['passwd'])){
            $_SESSION['password_reg'] = $password = $_POST['passwd'];
        }
        if(isset($_POST['passwdR'])){
            $passwordR = $_POST['passwdR'];
        }
        if(isset($_POST['ciudad'])){
            $_SESSION['ciudad_reg'] = $ciudad = $_POST['ciudad'];
        }
        if(isset($_POST['direccion'])){
            $_SESSION['direccion_reg'] = $direccion = $_POST['direccion'];
        }
        if(isset($_POST['foto'])){
            $_SESSION['foto_reg'] = $foto = $_POST['foto'];
        }
    ?>

    <body>
        <form action="modificarUsuario.php" method="post">
        <p> Nombre Real: <input type="text" name="userRealName" id= "userRealName" value="<?php echo $nombreReal; ?>"/></p>
        <p> Contraseña: <input type="text" name="passwd" id= "passwd" value="<?php echo $password; ?>"/></p>
        <p> Repite contraseña: <input type="text" name="passwdR" id= "passwdR" value="<?php echo $passwordR; ?>"/></p>
        <p> Correo: <input type="text" name="email" id= "email" value="<?php echo $correo; ?>"/></p>
        <p> Foto: <input type="text" name="foto" id= "foto" value="<?php echo $foto; ?>"/></p>
        <p> Ciudad: <input type="text" name="ciudad" id= "ciudad" value="<?php echo $ciudad; ?>"/></p>
        <p> Direccion: <input type="text" name="direccion" id= "direccion" value="<?php echo $direccion; ?>"/></p>

        <p><input type="submit" name="accept" value="Cambiar" /></p>
        </form>
        <p><a href="usuario.php"> Cancelar </a></p>
    </body>

    <?php
    if(verifica_entrada()){
        if($password != $passwordR){
            echo "Asegúrese que ambas contraseñas son iguales";
        }
        else{
            header("Location: /BooxChange/includes/procesos/procesarModificarUsuario.php");
        }
    }


    function verifica_entrada(){
    $correcto = true;
    if (!isset($_POST['userRealName'])|| empty( $_POST['userRealName'])){
        $correcto = false;
    }
    if(!isset($_POST['email'])|| empty( $_POST['email'])){
        $correcto = false;
    }
    if(!isset($_POST['passwd'])|| empty( $_POST['passwd'])){
        $correcto = false;
    }
    if(!isset($_POST['passwdR'])|| empty( $_POST['passwdR'])){
        $correcto = false;
    }
    if(!isset($_POST['ciudad'])|| empty( $_POST['ciudad'])){
        $correcto = false;
    }
    if(!isset($_POST['direccion'])|| empty( $_POST['direccion'])){
        $correcto = false;
    }
    return $correcto;
}
    ?>

</html>