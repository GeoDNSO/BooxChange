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
    
    <!-- Pasar a php con constantes para name e id ?????--->
    <form action="includes/procesos/procesarRegistro.php" method="post">
        
        <fieldset>
            <legend>Login</legend>

            <label for="userRealName"><b>Nombre y Apellidos</b></label>
            <input type="text" placeholder="Nombre y Apellidos" name="userRealName" id="userRealName" />

            <label for="foto"><b>Foto de Perfil</b></label>
            <input type="text" placeholder="Foto, por ahora no funcional" name="foto"  id="foto"/>

            <label for="username"><b>Nombre de Usuario</b></label>
            <input type="text" placeholder="Escribe un nombre único, ej: Patata" name="username"  id="username"/>

            <label for="email"><b>Correo Electrónico</b></label>
            <input type="text" placeholder="patata@patatamail.com" name="email" id="email" />

            <label for="passwd"><b>Contraseña</b></label>
            <input type="password" placeholder="Escribe una contraseña..." name="passwd"  id="passwd"/>

            <label for="passwdR"><b>Repite Contraseña</b></label>
            <input type="password" placeholder="Repite la contraseña..." name="passwdR" id="passwdR"/>

            <label for="fechaNac"><b>Fecha de Nacimiento</b></label>
            <input type="date" name="fechaNac" id="fechaNac"/>
            
            <label for="ciudad"><b>Ciudad</b></label>
            <input type="text" placeholder="Ciudad en la que resides" name="ciudad" id="ciudad"/>

            <label for="direccion"><b>Dirección</b></label>
            <input type="text" placeholder="Ej: Calle Patata Nº 1" name="direccion" id="direccion"/>

            <button type="submit">Registrarse</button>
        </fieldset>


    </form>



</html>