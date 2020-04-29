<?php

use \fdi\ucm\aw\booxchange\appBooxChange;

function perfilUsuario()
{

    if(basename($_SERVER['PHP_SELF']) == "intercambiosNormales.php"){
        echo "<a  class='hButton' href='formIntercambio.php'> Subir Libro </a>";
        echo "<a class='hButton' href='ofertas.php'>Ver Ofertas</a>";
    }

    if (isset($_SESSION['login']) && $_SESSION['login']) {
        //echo "Hola de nuevo: ".$_SESSION['nombre']. " con rol: ".$_SESSION['rol'];

       

        echo '<a href="usuario.php" ><img src="' . $_SESSION['fotoPerfil'] . '" alt="Imagen de Perfil">  </a>';

        echo "<ul>";
        

        echo "<li>";

        $app = appBooxChange::getInstance();
        $numNotificaciones = $app->notificacionesUsuario($_SESSION["id_Usuario"]);
        $notificacionesCab = ($numNotificaciones == 0) ? "" : " ($numNotificaciones)";
        echo $_SESSION['nombreReal'];
        echo '<svg class="arrowUser" width="8" height="5" viewBox="0 0 8 5" class="arrow-down" fill="#0BC4E2" xmlns="http://www.w3.org/2000/svg"><path d="M0.707109 1.70711L3.29289 4.29289C3.68342 4.68342 4.31658 4.68342 4.70711 4.29289L7.29289 1.70711C7.92286 1.07714 7.47669 0 6.58579 0H1.41421C0.523309 0 0.0771438 1.07714 0.707109 1.70711Z"></path></svg>';

        echo "<ul>";

        echo "<li> <a href='usuario.php'>" . "Perfil" . "</a> </li>";
        echo "<li> <a href='ofertas.php'> Tus Ofertas</a> </li>";
        echo "<li><a href='notificaciones.php'>Notificaciones$notificacionesCab</a></li>";
        echo "<li> <a href='chat.php'> Chatear </a> </li>";

        if ($_SESSION['rol'] == BD_TYPE_ADMIN) {
            echo '<li>';
            echo '<a href="admin.php">Administración</a>';
            echo '</li>';
        }

       
        echo "<li> <a href='logout.php'>Logout</a> </li>";
        

        echo "</ul>";

        echo "</li>";

        echo "</ul>";
    }
    else{
        echo "<a class='hButton' href='registro.php'> Únete </a>  ";
        echo "<a class='hButton' href='login.php'> Iniciar Sesión </a>";
    }
}


?>

<header>
    <div class="headerMain">

        <div class="logo">
            <h4> <a href="index.php">BooxChange</a> </h4>
        </div>

        <div class="userInfo">
            <?php
            perfilUsuario()
            ?>
        </div>

    </div>

    <div class="headerMainBottom">
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


        </ul>
    </nav>
    </div>

</header>