<?php

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio;

$app = appBooxChange::getInstance();

$idLibroQuerido = intval($_GET["libroQuerido"]);

$titulo = $_POST["titulo"];
$fotoLibro = $_POST["fotoLibro"];
$autor = $_POST["autor"];
$genero = $_POST["genero"];
$desc = $_POST["descripcion"];

        
        
//Damos valores "Nulos" a id y fecha después se omitirán
$libro = new TLibroIntercambio(null, $_SESSION['id_Usuario'], $titulo, $fotoLibro, $autor, $desc, $genero, NO_INTERCAMBIADO, NO_ES_OFERTA,  null);

$libroQuerido = $app->getLibroIntercambio($idLibroQuerido);


$result = $app->subirOfertaLibro($libroQuerido, $libro);

if($result == true){
    header("Location: ../../intercambiosNormales.php");
}else{
    exit("Error inesperado, no se ha podido subir el libro a la BD");
}

?>