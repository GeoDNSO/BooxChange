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
        echo "<a class=gris href='libroTienda.php?id=$id'>";
        echo "            <img src='$imagen' alt='adas'>";
        echo "</a>";
        echo "        </div>";
        echo "        <div class='descLibroPresentacion'>";
        echo "            <h2>$titulo de $autor </h2>";
        echo "        </div>";
        echo "    </div>";
        $i += 1;
    }
}

function cicloMisterio($genero)
{
    $app = appBooxChange::getInstance();
    $librosTienda = $app->librosTienda();


    if (!empty($titulo) || !empty($genero)) {
        $librosTienda = $app->buscarPorTitulo("", $genero);
    } else {
        $librosTienda = $app->librosTienda();
    }

    //echo "<ul>";
    $i = 0;
    $MAX = 3; // El máximo de lobros que vamos a enseñar
    foreach ($librosTienda as $libro) {

        if ($i == 3) {
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
    <link rel="stylesheet" id="estiloRoot" type="text/css" href="css/root.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/config.js"></script>

</head>

<body>


    <?php
    include("includes/comun/cabecera.php");
    ?><div class="main">



        <div class="mejoresLibros">


            <?php
            mejoresLibros();

            ?></div>

        <div class="presentacion">
            <h1>De que trata Booxchange</h1>
            <p>BooxChange es una web centrada en el intercambio y compraventa de libros, para así promover y divertirse con lectura ya sea intercambiando títulos con otras personas en las mismas condiciones, debatiendo en el foro o descubriendo nuevos libros.</p>


        </div>

        <div class="showcase">

            <div class="thing">
                <h1>Ciclo Fantasía</h1>
                <p>Si quieres viajar a nuevos mundos y embarcarte en épicas sagas, este es tu lugar</p>
                <br>
                <?php
                cicloMisterio("Fantasía");
                ?>
            </div>

            <div class="thing">
                <h1>Alma joven</h1>
                <p>Para los que creen que "El Club de los cinco" es para críos...</p>
                <br>
                <?php
                cicloMisterio("Juvenil");
                ?>
            </div>
        </div>

        <div class="wrapper">
            <ul class="list-reset">
                <li class="active">
                    <a>EL EQUIPO BOOXCHANGE</a>
                    <span>Meet the team</span>
                    <a href='quienesSomos.php'>
                        <img src="imagenes/slideshow/team.jpg">
                    </a>
                </li>
                <li>
                    <a>TOP 10 LIBROS</a>
                    <span>Basados en vuestras puntuaciones</span>
                    
                    <a href='rankingLibros.php'>
                    <img src="imagenes/slideshow/ranking.png">
                    </a>
                </li>
                <li>
                    <a>NUEVO FORO</a>
                    <span>Comparte tu opinión con otros usuarios</span>
                    
                    <a href='foro.php'>
                        <img src="imagenes/slideshow/foro.PNG" alt="">
                    </a>
                </li>
            </ul>
            <div class="featured-image"></div>
        </div>

    </div>


<script>
    $('.list-reset li').on('click', function(){
	$('.list-reset li').removeClass('active')
	$(this).addClass('active')
})
</script>

</body>
<?php
include("./includes/comun/footer.php");
?>

</html>