<?php
    session_start();
    $_SESSION['login'] = false;
    $_SESSION['nombre'] = "";
    $_SESSION['rol'] = -1;
    session_destroy();
    header("Location: index.php");

?>