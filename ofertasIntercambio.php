<?php
require_once(__DIR__ . "/includes/config.php");

use fdi\ucm\aw\booxchange\appBooxChange;


function ofertas()
{

    $app = appBooxChange::getInstance();

    $idLibro1 = intval($_GET['id']);
    $libro = $app->getLibroIntercambio($idLibro1);

    $idLibro = $libro->getIdLibroInter();
    $titulo = $libro->getTitulo();
    $idUsuario = $libro->getIdUsuario();
    $imagen = $libro->getImagen();
    $autor = $libro->getAutor();
    $desc = $libro->getDescripcion();
    $genero = $libro->getGenero();
    $fecha = $libro->getFecha();

    echo "<h1> Ofertas para tu libro, $titulo </h1>";

    if ($libro->getIdUsuario() != $_SESSION["id_Usuario"]) {
        header("Location: intercambiosNormales.php");
    } else if (isset($_SESSION["login"]) || $_SESSION["login"] == false) {


        $ofertas = $app->ofertasLibro($idLibro1);

        foreach ($ofertas as $oferta) {
            $idOferta = $oferta->getId();
            $idLibro1 = $oferta->getIdLibro1();
            $idLibro2 = $oferta->getIdLibro2();


            $libro1 = $app->getLibroIntercambio($idLibro1);

            $idLibro1 = $libro1->getIdLibroInter();
            $titulo1 = $libro1->getTitulo();
            $idUsuario1 = $libro1->getIdUsuario();
            $imagen1 = $libro1->getImagen();
            $autor1 = $libro1->getAutor();
            $desc1 = $libro1->getDescripcion();
            $genero1 = $libro1->getGenero();
            $fecha1 = $libro1->getFecha();

            //HAY QUE BUSCAR LOS DATOS DEL 2º LIBRO Y MOSTRARLO

            //DATOS LIBRO

            $libro2 = $app->getLibroIntercambio($idLibro2);


            $idLibro2 = $libro2->getIdLibroInter();
            $titulo2 = $libro2->getTitulo();
            $idUsuario2 = $libro2->getIdUsuario();
            $imagen2 = $libro2->getImagen();
            $autor2 = $libro2->getAutor();
            $desc2 = $libro2->getDescripcion();
            $genero2 = $libro2->getGenero();
            $fecha2 = $libro2->getFecha();

            $usuario = $app->getUserById($idUsuario2);
            $nombreUsuario = $usuario->getNombreReal();

            echo "<div class='libroOfertaConcreta'>";


            //Libro que ofreces
            echo "<div class='tuLibroOferta'>";
            echo "<div class='imagenLibroOferta'><img src='$imagen1' alt='Imagen Libro'> </img></div>";

            echo '<div class="contenidoLibroOferta">';

            echo "<h3>$titulo1 de $autor1</h3>";
            echo "<h4>Subido por ti el $fecha1 </h4>";
            echo "<h5> Género: $genero1 </h5>";
            echo " <p> $desc1 </p>";
            echo "</div>";

            echo "</div>";


            //Libro que te ofrecen
            echo "<div class='otroLibroOferta'>";

            echo "<div class='imagenLibroOferta'><img src='$imagen2' alt='Imagen Libro'> </img>";
            
            echo "<div class='botonesOferta'>";
            echo "<a class='botonAceptar' href='./includes/procesos/procesarOferta.php?aceptado=1&id=$idOferta&idLibro1=$idLibro1&idLibro2=$idLibro2'>Aceptar </a> ";
            echo "<a class='botonRechazar' href='./includes/procesos/procesarOferta.php?aceptado=0&id=$idOferta&idLibro1=$idLibro1&idLibro2=$idLibro2'>Rechazar </a> ";
            echo "<a class='botonChat' href='includes/procesos/crearChat.php?idUserChat=$idUsuario2'>Chat</a>";
            echo "</div>";

            echo "</div>";

            echo '<div class="contenidoLibroOferta">';
            
            echo "<h3>$titulo2 de $autor2</h3>";
            echo "<h4>Ofrecido por $nombreUsuario el $fecha2 </h4>";
            echo "<h5> Género: $genero2 </h5>";
            echo " <p> $desc2 </p>";
           
            echo "</div> ";

            echo "</div> ";


            //FIn div libroOfertaConcreta
            echo "</div>";


            
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

    <div class="mainOfertasIntercambio">
        <?php

        ofertas();

        ?>

    </div>


</body>



<?php
include("./includes/comun/footer.php");
?>

</html>