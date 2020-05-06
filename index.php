<?php
require_once(__DIR__ . "/includes/config.php");


use \fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

function mejoresLibros()
{
    $app = appBooxChange::getInstance();
    $libros = $app->getTwoBooks();

    $i = 1;
    foreach ($libros as $libro) {
        $titulo = $libro->getTitulo();
        $id = $libro->getIdLibro();
        $precio = $libro->getPrecio();
        $unidades = $libro->getUnidades();
        $imagen = $libro->getImagen();
        $autor = $libro->getAutor();
        $valoracion = $libro->getValoracion();
        $descripcion = $libro->getDescripcion();

        echo "<div class='libroPresentacion" . $i . "'>";
        echo "        <div class='imgPresentacion'>";
        echo "            <img src='$imagen' alt='adas'>";
        echo "        </div>";
        echo "        <div class='descLibroPresentacion'>";
        echo "            <h2>$titulo de $autor </h2>";
        echo "        </div>";
        echo "    </div>";
        $i+=1;
    }
}

function cicloMisterio($genero){
    $app = appBooxChange::getInstance();
    $librosTienda = $app->librosTienda();


    if (!empty($titulo) || !empty($genero)) {
        $librosTienda = $app->buscarPorTitulo("",$genero);
    }
    else{
        $librosTienda = $app->librosTienda();
    }

    //echo "<ul>";
    $i = 0;
    $MAX = 3; // El máximo de lobros que vamos a enseñar
    foreach ($librosTienda as $libro) {

        if($i == 3){
            return;
        }
        $titulo = $libro->getTitulo();
        $id = $libro->getIdLibro();

        echo "<a class=gris href='libroTienda.php?id=$id'>$titulo</a><br>";
        $i++;
    }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>

<body>


    <?php
    include("includes/comun/cabecera.php");
    ?>

    <div class="main">



        <div class="mejoresLibros">


            <?php
                mejoresLibros();

            ?>
        </div>

        <div class="presentacion">
            <h1>De que trata Booxchange</h1>
            <p>BooxChange es una web centrada en el intercambio y compraventa de libros, para así promover y divertirse con lectura ya sea intercambiando títulos con otras personas en las mismas condiciones, debatiendo en el foro o descubriendo nuevos libros.</p>
        

        </div>

        <div class="showcase">
        
            <div class="thing">
                <h1>Ciclo de Ciencia Ficción</h1>
                <p>Los libros de Ciencia ficción para viajar a otras realidades</p>

                <?php
                    cicloMisterio("Ciencia Ficción");
                ?>


            </div>

            <div class="thing">
                <h1>Oye el BOOM de mi corazón</h1>
                <p>Para los que se vuelven locos por leer y no tenerte</p>

                <?php
                    cicloMisterio("Romántico");
                ?>


            </div>
        </div>


    </div>

    


</body>
    <?php
        include("./includes/comun/footer.php");
    ?>

</html>