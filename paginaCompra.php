<?php
require_once(__DIR__ . "/includes/config.php");
?><!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange Compra</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php

include_once(__DIR__ . "/includes/comun/cabecera.php");

use \fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
use fdi\ucm\aw\booxchange\formularios\FormularioCompraLibro as FormularioCompraLibro;
use \fdi\ucm\aw\booxchange\transfers\TLibro as TLibro;



if (!isset($_GET['id'])) {
    exit("No se ha proporcionado el id del producto");
} else if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    exit("Usuario no logeado, no se puede realizar la compra");
} else {
    $app = appBooxChange::getInstance();
    $libro = $app->getLibroById($_GET['id']);
    $sLibro = serialize($libro);
    $_SESSION["libroCompra"] = $sLibro;
    //file_put_contents('libroCompra', $sLibro);

    $titulo = $libro->getTitulo();
    echo '<div class="border-bigform">';
    echo "<h1> Comprar: $titulo </h1>";
    $unidades = $libro->getUnidades();
}
?><form method="post" action="includes/procesos/procesarCompra.php">

    <label for="unidades"><b>Unidades</b></label><br>
    <input type="number" name="unidades" id="unidades" min="1" max="<?php echo $unidades; ?>" value="1" /><br><br>

    <label for="numtarjeta"><b>Número de Tarjeta</b></label><br>
    <input  class="line" type="number" maxlength="12" placeholder="" name="numtarjeta" id="numtarjeta" /><br><br>

    <label for="clave"><b>Clave</b></label><br>
    <input class="pin-input" type="password" maxlength="4" placeholder="" name="clave" id="clave" /><br><br>

    <button class="send-button">Comprar</button>

</form>

</div>


<?php
  include("./includes/comun/footer.php");
?></html>
