<?php
    require_once(__DIR__ . "/includes/config.php");
?><!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>

<?php
    include("includes/comun/cabecera.php");

    include("./includes/comun/funcionesAdmin.php");

    use \fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

    if (!isset($_GET['id'])) {
        exit("No se ha proporcionado el id del user");
    } else if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
        exit("Usuario no logeado, no se puede modificar el rol");
    } else if ($_SESSION['rol'] != BD_TYPE_ADMIN){
        exit("No tienes permisos de admin");
    } else {
        $app = appBooxChange::getInstance();
        $user = $app->getUserById($_GET['id']);
        $_SESSION["modificarRol"] = serialize($_GET['id']);

        $nombreReal = $user -> getNombreReal();
        $rol = $user -> getRol();
    }

    echo "<div class='modifPerfil'>";
    echo "<h3 class=nombreReal>Nombre Real: $nombreReal</h3>";
?><form method="post" action="includes/procesos/AD_procesarCambiarRol.php" enctype="multipart/form-data">

        <label for="rol"><b>Seleccionar rol</b></label><br>
        <?php

        if($rol == 0){
            echo '<input type="radio" class=marginTopRol id="0" name="rol" value="0" checked>';
            echo '&nbsp<label for="0">Administrador</label><br>';
            echo '<input type="radio" class=marginTopRol id="1" name="rol" value="1">';
            echo '&nbsp<label for="1">Usuario registrado</label><br>';
            echo '<input type="radio" class=marginTopRol id="2" name="rol" value="2">';
            echo '&nbsp<label for="2">Moderador</label><br><br>';
        }

        else if($rol == 2){
            echo '<input type="radio" class=marginTopRol id="0" name="rol" value="0">';
            echo '&nbsp<label for="0">Administrador</label><br>';
            echo '<input type="radio" class=marginTopRol id="1" name="rol" value="1">';
            echo '&nbsp<label for="1">Usuario registrado</label><br>';
            echo '<input type="radio" class=marginTopRol id="2" name="rol" value="2" checked>';
            echo '&nbsp<label for="2">Moderador</label><br><br>';
        }

        else{
            echo '<input type="radio" class=marginTopRol id="0" name="rol" value="0">';
            echo '&nbsp<label for="0">Administrador</label><br>';
            echo '<input type="radio" class=marginTopRol id="1" name="rol" value="1" checked>';
            echo '&nbsp<label for="1">Usuario registrado</label><br>';
            echo '<input type="radio" class=marginTopRol id="2" name="rol" value="2">';
            echo '&nbsp<label for="2">Moderador</label><br><br>';
        }
        ?><input type="submit" class="send-button noEnorme">

    </form>
    <a class="send-button cancelar" href="AD_listaUsuarios.php"> Cancelar </a>
    </div>

<?php
include("./includes/comun/footer.php");
?></html>
