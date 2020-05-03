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


//Subir imagen al servidor
$fotoBD = "";
var_dump($_FILES["fotoLibro"]);
if(isset($_FILES["fotoLibro"]) && $_FILES["fotoLibro"]["name"] != ""){
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

?>