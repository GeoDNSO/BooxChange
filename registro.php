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
    ?>
    
    <!-- Pasar a php con constantes para name e id 
    <form action="includes/procesos/procesarRegistro.php" method="post">--->
    <form action="registro.php" method="post">

        <?php
            //Lo que hacemos aquí es que si se ha escrito una variable en en un formulario anterior, lo guardamos para mostrarlo de nuevo
            //Y no tener que volver a escribirlo todo
            //Lo guardo en Sesdsion, para poder pasarlo a procesarRegistro, estas variables serán destruidas al comletarse el registro
            $nombreUsuario = $nombreReal = $correo = $foto = $password =  $passwordR = $fechaNacimiento = $ciudad = $direccion = "";
            
            if(isset($_POST['username'])){
                $_SESSION['nombreUsuario_reg'] = $nombreUsuario = $_POST['username'];
            }
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
            if(isset($_POST['fechaNac'])){
                $_SESSION['fechaNacimiento_reg'] = $fechaNacimiento = $_POST['fechaNac'];
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

        <fieldset>
            <legend>Login</legend>
            <form>
            <label for="userRealName"><b>Nombre y Apellidos</b></label><br>
            <input type="text" placeholder="" name="userRealName" id="userRealName" value="<?php echo $nombreReal; ?>" /><br><br>

            <label for="username"><b>Nombre de Usuario</b></label><br>
            <input type="text" placeholder="Nick o nombre único" name="username"  id="username"  value="<?php echo $nombreUsuario; ?>" /><br><br>

            <label for="foto"><b>Foto de Perfil</b></label><br>
            <input type="text" placeholder="Foto, por ahora no funcional" name="foto"  id="foto" /><br><br>

            <label for="email"><b>Correo Electrónico</b></label><br>
            <input type="text" placeholder="user@mail.com" name="email" id="email"  value="<?php echo $correo; ?>" /><br><br>

            <label for="passwd"><b>Contraseña</b></label><br>
            <input type="password" placeholder="Escribe una contraseña..." name="passwd"  id="passwd" /><br><br>

            <label for="passwdR"><b>Repite Contraseña</b></label><br>
            <input type="password" placeholder="Repite la contraseña..." name="passwdR" id="passwdR" /><br><br>

            <label for="fechaNac"><b>Fecha de Nacimiento</b></label><br>
            <input type="date" name="fechaNac" id="fechaNac" value="<?php echo $fechaNacimiento; ?>"/><br><br>
            
            <label for="ciudad"><b>Ciudad</b></label><br>
            <input type="text" placeholder="Ciudad en la que resides" name="ciudad" id="ciudad" value="<?php echo $ciudad; ?>" /><br><br>

            <label for="direccion"><b>Dirección</b></label><br>
            <input type="text" placeholder="Calle, Nº y piso" name="direccion" id="direccion" value="<?php echo $direccion; ?>" /><br><br>

            <button type="submit">Registrarse</button>
            </form>
        </fieldset>


    </form>

    <?php
        if(verifica_entrada()){
            if($password != $passwordR){
                echo "Asegúrese que ambas contraseñas son iguales";
            }
            else{
                echo "We are in bois: ";
                header("Location: /BooxChange/includes/procesos/procesarRegistro.php");
            }
        }
    ?>
    

</html>

<?php

/*Verifica que los datos del formulario son correctos
1. Comprueba que las dos contraseñas sean iguales
2. Comprueba que los parámatros indispensables están relenos:
    -Nombre
    -Contraseña (las 2)
    -Correo
    -Fecha de Nacimiento
*/

function verifica_entrada(){
    $correcto = true;
    if(!isset($_POST['username'])|| empty( $_POST['username'])){
        echo " -Nombre de usuario/nick <br>";
        $correcto = false;
    }
    if (!isset($_POST['userRealName'])|| empty( $_POST['userRealName'])){
        echo " -Nombre real <br>";
        $correcto = false;
    }
    if(!isset($_POST['email'])|| empty( $_POST['email'])){
        echo " -Correo <br>";
        $correcto = false;
    }
    if(!isset($_POST['passwd'])|| empty( $_POST['passwd'])){
        echo " -Contraseña <br>";
        $correcto = false;
    }
    if(!isset($_POST['passwdR'])|| empty( $_POST['passwdR'])){
        echo " -Repita la contraseña <br>";
        $correcto = false;
    }
    if(!isset($_POST['fechaNac'])|| empty( $_POST['fechaNac'])){
        echo " -Fecha de nacimiento <br>";
        $correcto = false;
    }
    if(!isset($_POST['ciudad'])|| empty( $_POST['ciudad'])){
        echo " -Ciudad <br>";
        $correcto = false;
    }
    if(!isset($_POST['direccion'])|| empty( $_POST['direccion'])){
        echo " -Dirección <br>";
        $correcto = false;
    }
    return $correcto;
}

?>