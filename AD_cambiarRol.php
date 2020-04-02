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
    echo "<h3>Nombre Real: $nombreReal</h3>";
?>

    <form method="post" action="includes/procesos/AD_procesarCambiarRol.php" enctype="multipart/form-data">

        <label for="rol"><b>Rol</b></label><br>
        <?php
        if($rol == 0){
            echo '<input type="radio" id="0" name="rol" value="0" checked>';
            echo '<label for="0">Admin</label>';
            echo '<input type="radio" id="1" name="rol" value="1">';
            echo '<label for="1">Normal User</label>';
            echo '<input type="radio" id="2" name="rol" value="2">';
            echo '<label for="2">Moderator</label><br><br>';
        }else if($rol == 2){
            echo '<input type="radio" id="0" name="rol" value="0">';
            echo '<label for="0">Admin</label>';
            echo '<input type="radio" id="1" name="rol" value="1">';
            echo '<label for="1">Normal User</label>';
            echo '<input type="radio" id="2" name="rol" value="2" checked>';
            echo '<label for="2">Moderator</label><br><br>';
        }else{
            echo '<input type="radio" id="0" name="rol" value="0">';
            echo '<label for="0">Admin</label>';
            echo '<input type="radio" id="1" name="rol" value="1" checked>';
            echo '<label for="1">Normal User</label>';
            echo '<input type="radio" id="2" name="rol" value="2">';
            echo '<label for="2">Moderator</label><br><br>';
        }
        ?>
        <input type="submit">

    </form>
    <a href="AD_listaUsuarios.php"> Cancelar </a>

</html>