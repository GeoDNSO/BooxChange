<?php
    use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

    $parentDir = dirname(__DIR__, 1);
    require_once($parentDir . "/config.php");

    $user = $_GET["user"];

    $app = appBooxChange::getInstance();
    if ($app->usuarioExiste($user)){echo "existe";}
    else {echo "disponible";}

?>