<?php
require_once(__DIR__ . "/includes/config.php");
?>
<!DOCTYPE html>

<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <?php
    if (!isset($_COOKIE["estiloWeb"]) || $_COOKIE["estiloWeb"] == "claro") {
        echo '<link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root.css" />';
    } else {
        echo '<link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root_dark_mode.css" />';
    }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/config.js"></script>
</head>

<body>

    <?php
    include("includes/comun/cabecera.php");
    //include("includes/transfers/TUsuario.php");
    ?><div class=fondo>
        <div class=datos>
            <?php
            //echo 'Foto : <img src="'.$_SESSION['fotoPerfil'] .'" alt="Imagen de Perfil" height="100" width="100">  <br>';
            echo "<div class=fotoUsuario>";

            echo '<img src="' . $_SESSION['fotoPerfil'] . '"alt="Imagen de Perfil" height="170" width="170">';

            //Switch para Dark Mode               
            echo "<div class='switchContainer'>";
            echo '<label class="switch">';


            if (!isset($_COOKIE["estiloWeb"]) || $_COOKIE["estiloWeb"] == "claro") {
                echo '<input id="styleMode" type="checkbox">';
            } else if (isset($_COOKIE["estiloWeb"]) && $_COOKIE["estiloWeb"] == "oscuro") {
                echo '<input id="styleMode" checked type="checkbox">';
            }

            echo '<span class="slider round"></span>';
            echo '</label>';
            echo "</div>";

            echo "</div>";
            echo "<div class= infoUsuario>";
            echo "<p class=marginBottom>Información de la cuenta</p>";
            echo "<ul>";
            echo "<li class=marginLeft>Nombre: " . $_SESSION['nombre'] . "</li>";
            echo "<li class=marginLeft>E-mail: " . $_SESSION['correo'] . "</li>";
            echo "<li class=marginLeft>Rol: ";
            switch ($_SESSION['rol']) {
                case 0:
                    echo "administrador";
                    break;
                case 1:
                    echo "usuario registrado";
                    break;
                case 2:
                    echo "moderador";
                    break;
                default:
                    echo "error al identificar rol";
                    break;
            }
            echo "</li>";
            echo "<li class=marginLeft>Se unió en: ";

            $fechaDeCreacion = $_SESSION['fechaDeCreacion'];
            $i = 0;

            //Evitar sacar la hora, no es un dato relevante
            while ($fechaDeCreacion[$i] != " " && $i < strlen($fechaDeCreacion)) {
                echo $fechaDeCreacion[$i];
                $i++;
            }
            echo "</li></ul>";

            echo "<p class=arriba>Información personal</p>";
            echo "<ul>";
            echo "<li class=marginLeft>Nombre real: " . $_SESSION['nombreReal'] . "</li>";
            echo "<li class=marginLeft>Domicilio: " . $_SESSION['direccion'] . " (" . $_SESSION['ciudad'] . ")</li>";
            echo "</ul>";
            echo "</div>";
            ?><div class=modButt>
                <p class='centrado textGrande'><a class=blanco href=modificarUsuario.php> Modificar Perfil </a>
                </p>
            </div>
        </div>

    </div>

    <?php
    include("./includes/comun/footer.php");
    ?></body>

</html>