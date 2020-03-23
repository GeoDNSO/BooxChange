
<?php
use \fdi\ucm\aw\booxchange\appBooxChange;

if(isset($_SESSION['login']) && $_SESSION['login']){
    //echo "Hola de nuevo: ".$_SESSION['nombre']. " con rol: ".$_SESSION['rol'];
    echo "<a href='usuario.php'>".$_SESSION['nombreReal']."</a>";
    echo "<br>";
    $app = appBooxChange::getInstance();
    $numNotificaciones = $app->notificacionesUsuario($_SESSION["id_Usuario"]);
    $notificacionesCab = ($numNotificaciones == 0) ? "" : " ($numNotificaciones)";
    echo "<a href='notificaciones.php'>Notificaciones$notificacionesCab</a>";
}
?>

<header>
    <div class="headerLogo">
        <h4>BooxChange</h4>
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

            <?php

            if(isset($_SESSION['login']) && $_SESSION['login']){
                echo "<li><a href='logout.php'>Logout</a></li>";
                if($_SESSION['rol'] == BD_TYPE_ADMIN){
                    echo "<li><a href='admin.php'>Poderes de Admin</a></li>";
                }
            }
            else{
                echo "<li> <a href='registro.php'>Registrarse</a> </li>";
                echo "<li> <a href='login.php'>LogIn</a> </li>";
            }
            ?>

        </ul>
    </nav>
</header>