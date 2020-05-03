<?php
require_once(__DIR__ . "/includes/config.php");

use fdi\ucm\aw\booxchange\appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TOfertasIntercambio as TOfertasIntercambio;


function ofertas()
{



    if (isset($_SESSION["login"]) || $_SESSION["login"] == false) {

        $app = appBooxChange::getInstance();
        $ofertas = $app->ofertasUsuario($_SESSION["id_Usuario"]);

        foreach ($ofertas as $oferta) {
            $idOferta = $oferta->getId();
            $idLibro1 = $oferta->getIdLibro1();

            //DATOS LIBRO
            $libro = $app->getLibroIntercambio($idLibro1);

            $idLibro = $libro->getIdLibroInter();
            $titulo = $libro->getTitulo();
            $idUsuario = $libro->getIdUsuario();
            $imagen = $libro->getImagen();
            $autor = $libro->getAutor();
            $desc = $libro->getDescripcion();
            $genero = $libro->getGenero();
            $fecha = $libro->getFecha();

            $numOfertas = $app->getNumOfertas($idLibro);
            echo "<div class='ofertaConcreta'>";
            $str_oferta = ($numOfertas == 1) ? "oferta" : "ofertas";


            echo '<div class="imagenLibroOferta">';
            echo "<img src='$imagen'> </img>";
            echo '</div>';

            echo '<div class="contenidoLibroOferta">';
            echo "    <h2> $titulo </h2>";
            echo "    <h4> $genero</h3>";
            echo "    <p>$desc</p>";
            echo '</div>';

            echo '<div class="botonVerOfertaLibro">';
            echo "<a href='ofertasIntercambio.php?id=$idLibro1' class='notification'>";
            echo '<span>Ver Ofertas</span>';
            if($numOfertas > 0){
                echo "<span class='badge'>$numOfertas</span>";
            }
            echo '</a>';
            echo '</div>';



            //echo "Tu libro $titulo, tiene $numOfertas $str_oferta<br>";
            //echo "<a href='ofertasIntercambio.php?id=$idLibro1'>Ver Ofertas </a> <br>";

            echo " </div> ";
        }
    } else {
        echo "<p> No puede realizar ofertas si no está logeado </p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ofertas Intercambio</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php
include("includes/comun/cabecera.php");
?>

<body>

    <h1 class='titleOfertas'>Tus Ofertas para Intercambios</h1>


    <div class="mainOfertas">

        <?php
        ofertas();
        ?>


    </div>


</body>

<?php
include("./includes/comun/footer.php");
?>

</html>