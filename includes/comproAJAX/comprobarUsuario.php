<?php
    use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

    $user = $_GET["user"];
/*
    $app = appBooxChange::getInstance();
    if ($app->usuarioExiste($user)){echo "existe";}
    else {echo "disponible";}
    */
    
    if($user == "carlos"){
        echo "existe";
    }
    else{
        echo "disponible";
    }



?>