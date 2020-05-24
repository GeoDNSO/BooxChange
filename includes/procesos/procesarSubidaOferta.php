<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio;

$app = appBooxChange::getInstance();

$idLibroQuerido = intval($_GET["libroQuerido"]);

$titulo = $_POST["titulo"];

$autor = $_POST["autor"];
$genero = $_POST["genero"];
$desc = $_POST["descripcion"];

$hayErrores = false;
if (empty($titulo) || mb_strlen($titulo) < 3) {
    $hayErrores = true;
}
if (empty($autor) || mb_strlen($autor) < 3) {
    $hayErrores = true;
}
if (empty($desc) || mb_strlen($desc) < 10) {
    $hayErrores = true;
}

if($hayErrores){
    header("Location: ../../formOfrecerLibro.php?id=$idLibroQuerido");
}
else{
    //Subir imagen al servidor
    $fotoBD = "";
    if(isset($_FILES["fotoLibro"]) && $_FILES["fotoLibro"]["name"] != ""){

        $_FILES["fotoLibro"]["name"] = time() . '_' . rand(100, 999) . '.' . end(explode(".",$_FILES["fotoLibro"]['name']));

        $fotoBD =  (IMG_DIRECTORY_LIBROS_INTERCAMBIO . $_FILES["fotoLibro"]["name"]);
        $fotoBD = str_replace("\\", "/", $fotoBD);

        $archivoSubida = (SERVER_DIR . $fotoBD);
        move_uploaded_file( $_FILES["fotoLibro"]['tmp_name']  , $archivoSubida);
    }else{
        $fotoBD .= (IMG_DIRECTORY_LIBROS_INTERCAMBIO . IMG_DEFAULT_LIBRO);
    }




    //Damos valores "Nulos" a id y fecha después se omitirán
    $libro = new TLibroIntercambio(null, $_SESSION['id_Usuario'], $titulo, $fotoBD, $autor, $desc, $genero, NO_INTERCAMBIADO, NO_ES_OFERTA,  null);

    $libroQuerido = $app->getLibroIntercambio($idLibroQuerido);


    $result = $app->subirOfertaLibro($libroQuerido, $libro);

    if($result == true){
        header("Location: ../../intercambiosNormales.php");
    }else{
        exit("Error inesperado, no se ha podido subir el libro a la BD");
    }
}