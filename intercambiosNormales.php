<?php

use fdi\ucm\aw\booxchange\appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio;

require_once(__DIR__ . "/includes/config.php");

function printBooks()
{

    $app = appBooxChange::getInstance();
    $librosIntercambio = $app->getLibrosIntercambiosDisponibles();

    if (count($librosIntercambio) == 0) {
        echo "<p> Parece que no hay libros para intercambiar, por qué no ofreces tú uno? Puedes hacerlo en con opción de Subir Libro Para Intercambiar </p> <br>";
    } else {
        foreach ($librosIntercambio as $libro) {
            $idLibro = $libro->getIdLibroInter();
            $titulo = $libro->getTitulo();
            $idUsuario = $libro->getIdUsuario();
            $imagen = $libro->getImagen();
            $autor = $libro->getAutor();
            $desc = $libro->getDescripcion();
            $genero = $libro->getGenero();
            $fecha = $libro->getFecha();

            $usuario = $app->getUserById($idUsuario);
            $nombreUsuario = $usuario->getNombreReal();

            echo "<div class='libroInter'>";

            echo "<div class='imagenLibroInter'> <img src='$imagen' alt='Imagen de Libro'> </div>";

            echo "<div class='descLibroInter'>";
            echo "<p>";

            echo "Fecha: $fecha <br>";
            echo "Lo ofrece: $nombreUsuario <br>";
            echo "$titulo <br>";
            echo "Autor: $autor <br>";
            echo "Genero: $genero <br>";
            echo "$desc <br>";

            echo "</p>";
            echo "</div>";

            //Zona de Botones 
            echo "<div class='botonesLibroInter'>";

            //Boton Envio/Ver Ofertas
            echo "<div class='botonEnvio interButton'>";

            if (isset($_SESSION["id_Usuario"]) && $_SESSION["id_Usuario"] == $idUsuario) {
 
                echo "<a  href='ofertasIntercambio.php?id=$idLibro'> Ver Ofertas"; //Este libro lo has ofrecido tú
                //echo "<span class='tooltiptext'>Este libro lo has subido tú, puedes ver sus ofertas disponibles pulsando en el botón</span>";
        
            } else {
                echo "<a  href='formOfrecerLibro.php?id=$idLibro'> Ofrecer Libro";
                //echo "<span class='tooltiptext'>¿Te interesa la oferta? Pulsa sobre el botón para ofrecer un libro</span>";
            }

            echo "</a>";
            echo "</div>";


            if (isset($_SESSION["id_Usuario"]) && $_SESSION["id_Usuario"] != $idUsuario) {
                //Boton Chat
                echo "<div class='botonChat interButton' >";
               
                echo "<a  href='includes/procesos/crearChat.php?idUserChat=$idUsuario'>Chat</a>";
                //echo "<span class='tooltiptext'> Inicia un chat con el usuario para negociar la transacción</span>";
                echo "</div>";
            }



            echo "</div>";
            //Fin Zona de Botones 



            echo "</div>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Intercambios Normales</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php

include("includes/comun/cabecera.php");

?>

<body>
    <!--<li> <a href="formIntercambio.php">Subir Libro Para Intercambiar</a> </li>-->


    <div class="interNormMain">
        <h1>Intercambios Normales</h1>

        <div class="tiendaLibrosInter">
            <?php
            printBooks();
            ?>
        </div>

    </div>

<?php
    include("./includes/comun/footer.php");
?>
</body>


</html>