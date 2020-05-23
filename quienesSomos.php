<?php
require_once(__DIR__ . "/includes/config.php");
?><!DOCTYPE html>
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


<?php
include("includes/comun/cabecera.php");
?><div class="big-border">
    <div class="title">¿Quénes somos?</div>
    <div class="sub-title">Conoce al equipo de BooxChange</div>

    <div class ="thing">
        <h2>Separados al nacer, unidos por la lectura</h2>
        Somos un grupo de estudiante de ingeniería Informática con la pasión de leer e intercambiar libros.
        Algunos preferimos, la ficción, otros un buen crímen o incluso cómics chinos de esos que se leen al revés, pero sin duda nos une la lectura.
    </div>

    <br>

    <div class="container">
        <div class="contenedor">

            <div class="panels">

                <div class="panel panelAlfon">
                    <div class="quote">Amante de los libros de Agatha Christie y resolver misterios con Hércules Poirot. </div>
                    <div class="person">Alfon<div class="sub-title">Trabaja por un futuro mejor</div></div>

                </div>
                <div class="panel panelDani">
                    <div class="quote">Jafe de proyecto, mantiene a su equipo unido y animado.</div>
                    <div class="person">Dani<br><div class="sub-title">Best Team Owner and CEO</div></div>

                </div>
                <div class="panel panelJin">
                    <div class="quote">Le gusta leer manga online e imaginar épicos combates.</div>
                    <div class="person">Jin<div class="sub-title">Manga Master</div></div>

                </div>

                </div>

                <div class="panels">

                <div class="panel panelSergio">
                    <div class="quote">Mayor fan de Sanderson en toda la península, a veces juega al stardew valley.</div>
                    <div class="person">Sergio<br><div class="sub-title">Brumoso zaragozano</div></div>

                </div>
                <div class="panel panelSalvio">
                    <div class="quote">
                        Segundo encargado de diseño y especialista en tablas. <br> 
                        Amante de los gatos y de la cultura Hip-Hop.<br>
                        Gran aficcionado del Shōnen.
                    </div>
                    <div class="person">Salvio<br><div class="sub-title">猫が好き</div></div>

                </div>
                <div class="panel panelAlex">
                    <div class="quote">Videojugador profesinal de Valorant, platino en TFT y main Aphelios desde que salió en el PBE, cerebro galáctico.</div>
                    <div class="person">Alex<br><div class="sub-title">Streamer de éxito</div></div>

            </div>


        </div>
    </div>


</div>

<!--LOS PANAS-->

    
</div>



<script>

    const panels = document.querySelectorAll('.panel');

    panels.forEach(panel => panel.addEventListener('click', toggleOpen));

    function toggleOpen() {
        this.classList.toggle('open');
    }

</script>

<?php
include("./includes/comun/footer.php");
?></html>
