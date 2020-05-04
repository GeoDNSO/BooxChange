<?php
    require_once(__DIR__."/includes/config.php");
    //session_start();
    $_SESSION['login'] = false;
    $_SESSION['nombre'] = "";
    $_SESSION['rol'] = -1;
    session_unset();
    session_destroy();

    header("Location: despedida.php");


?>