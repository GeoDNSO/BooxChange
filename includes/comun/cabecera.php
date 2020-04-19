<?php

use \fdi\ucm\aw\booxchange\appBooxChange;

function perfilUsuario()
{
    if (isset($_SESSION['login']) && $_SESSION['login']) {
        //echo "Hola de nuevo: ".$_SESSION['nombre']. " con rol: ".$_SESSION['rol'];
        echo '<img src="' . $_SESSION['fotoPerfil'] . '" alt="Imagen de Perfil" height="100" width="100">  <br>';
        echo "<a href='usuario.php'>" . $_SESSION['nombreReal'] . "</a>";
        echo "<br>";
        $app = appBooxChange::getInstance();
        $numNotificaciones = $app->notificacionesUsuario($_SESSION["id_Usuario"]);
        $notificacionesCab = ($numNotificaciones == 0) ? "" : " ($numNotificaciones)";
        echo "<a href='notificaciones.php'>Notificaciones$notificacionesCab</a>";
        if (isset($_SESSION['login']) && $_SESSION['login']) {
            echo "<br> <a href='logout.php'>Logout</a>";
        }
    }
}


?>

<header>
    <div class="headerMain">

        <div class="logo">
            <h4>BooxChange</h4>
        </div>

        <div class="userInfo">
            <?php
            perfilUsuario()
            ?>
        </div>

    </div>

    <nav>
        <ul class="nav_links">
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <li>
                <a href="tienda.php">Tienda</a>
            </li>
            <li>
                <a href="intercambio.php">Intercambios</a>
            </li>
            <li>
                <a href="rankingLibros.php">Ranking</a>
            </li>
            <li>
                <a href="foro.php">Foro</a>
            </li>


            <?php

            if (isset($_SESSION['login']) && $_SESSION['login']) {
                if ($_SESSION['rol'] == BD_TYPE_ADMIN) {
                    echo '<li>';
                    echo '<a href="admin.php">Administración</a>';
                    echo '</li>';
                }
            } else {
                echo "<li> <a href='registro.php'>Registrarse</a> </li>";
                echo "<li> <a href='login.php'>LogIn</a> </li>";
            }
            ?>


        </ul>
    </nav>

</header>