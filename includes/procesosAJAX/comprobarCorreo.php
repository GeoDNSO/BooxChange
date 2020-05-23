<?php

    $parentDir = dirname(__DIR__, 1);
    require_once($parentDir . "/config.php");

    use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
    

    
    $email = $_GET["correo"];

    
    $app = appBooxChange::getInstance();
    if ($app->comprobarCorreo($email)){
        echo "NO";
    }
    else {echo "SI";}
    
?>