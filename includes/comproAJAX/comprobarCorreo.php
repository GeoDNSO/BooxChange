<?php
    use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
    

    
    $email = $_GET["correo"];

    /*
    $app = appBooxChange::getInstance();
    if ($app->comprobarCorreo($email)){
        echo "NO";
    }
    else {echo "SI";}
    */
    
    
    if($email == "pepe@gmail.com"){
        echo "NO";
    }
    else {echo "SI";}
    
?>