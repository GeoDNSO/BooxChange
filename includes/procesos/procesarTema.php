<?php
$parentDir = dirname(__DIR__, 1);

require_once($parentDir."/config.php");


use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

$app = appBooxChange::getInstance();


$tema = $_POST["tema"];
$desc = $_POST["desc"];


//Subir imagen al servidor
$fotoBD = "";
if(isset($_FILES["foto"]) && $_FILES["foto"]["name"] != ""){

    $_FILES["foto"]["name"] = time() . '_' . rand(100, 999) . '.' . end(explode(".",$_FILES["foto"]['name']));

    $fotoBD =  (IMG_DIRECTORY_TEMAS . $_FILES["foto"]["name"]);
    $fotoBD = str_replace("\\", "/", $fotoBD);

    $archivoSubida = (SERVER_DIR . $fotoBD);

    move_uploaded_file( $_FILES["foto"]['tmp_name']  , $archivoSubida);
}else{
    $fotoBD = (IMG_DIRECTORY_TEMAS . IMG_DEFAULT_USER);
}

$app->anadirTema($tema, $desc, $fotoBD);
header("Location: ../../foro.php");
