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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


        <!-- QUOTES -->
        <div class = "quote-container">
            <div class = "quote-panel">
                <div class = "quote-progress"></div>
                <div>
                    <blockquote>
                        <p class="quote"></p>
                        <p class="author">- <span class="author-name"></span></p>
                    </blockquote>

                    <div class="quote-nav">
                        <button class="previous bQuote">
                            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                        </button>
                        </button>
                        <button class="random bQuote">
                            <i class="fa fa-random" aria-hidden="true"></i>
                        </button>
                        <button class="next bQuote">
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
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

/* QUOTES */
var listQuotes = [
    {quote: "Mientras el corazón late, mientras el cuerpo y el alma siguen juntos, no puedo admitir que cualquier criatura dotada de voluntad tiene necesidad de perder la esperanza en la vida.", author: "Julio Verne, Viaje al centro de la tierra"},
    {quote: "Hay libros cuyas partes traseras y cubiertas son de lejos la mejor parte.", author: "Charles Dickens, Oliver Twist"},
    {quote: "Las personas mayores nunca puede comprender algo por sí solas y es muy aburrido para los niños tener que darles una y otra vez explicaciones.", author: "Antoine de Saint-Exupéry, El principito"},
    {quote: "Hay que tener cuidado con los libros y lo que hay dentro de ellos, ya que las palabras tienen el poder de cambiarnos.", author: "Cassandra Clare, El Ángel mecánico"},
    {quote: "Por honor, cuando cuando un hombre moría, si su viuda no era reclamada por el jefe del clan, se esperaba de ella que se lanzara a la pira funeraria de su marido.", author: "Brent Weeks, Más allá de las sombras"},
    {quote: "Lo peor de la tarea eran los cuerpos. Algunos parecían filetes chamuscadis, con una costra negra por fuera, pero agrietada y rezumando por dentro. ¡Y esa peste a carne asada y pelo quemado!.", author: "Mahatma Gandhi"},
    {quote: "El mundo estaba muriendo. Sus dioses tenían que morir con él.", author: "Brandon Sanderson, El héroe de las eras"},
    {quote: "Un cuchillo de dolor le rajó la espalda; sintió que se le abría la piel; le llegó el hedor de la sangre al arder, y vio la sombra de las alas.", author: "George R.R. Martin, Juego de tronos"},
    {quote: "Los soñadores [...] serán quienes reconstruyan y salven el mundo.", author: "Sarah J. Maas, Imperio de tormentas"},
    {quote: "Eres como una patata en un campo de minas", author: "Brandom Sanderson, Steelheart"},
    {quote: "¿Acaso la lealtad es encomieble cuando va en la dirección errónea?.", author: "Cassandra Clare, La princesa mecánica"},
    {quote: "Estamos cinco personas en esta habitación. Uno de nosotros es el asesino.", author: "Agatha Christie , Diez Negritos"},
    {quote: "Aquí termina tu caza, aquí comienza la mía", author: "Eva García Sáenz de Urturi, El silencio de la ciudad Blanca"},
    {quote: "Ya no tengo fuerza ni voluntad para mantenerme alejado de ti", author: "Stephenie Meyer, Crepúsculo"},
    {quote: "No era el hombre más honesto ni el más piadoso, pero era un hombre valiente", author: "Arturo Pérez Reverte, El capitán Alatriste"}
];

var currentQuote = 0;
var progress = setInterval(timerProgress, 10);
var progressWidth = 0;

function timerProgress() {
  $(".quote-progress").width(progressWidth + "%");
  if(progressWidth < 100) {
    progressWidth += 0.1;
  } else {
    changeQuote();
    progressWidth = 0;
  }
}

function setQuote() {
  $(".quote").html('"' + listQuotes[currentQuote].quote + '"');
  $(".author-name").html(listQuotes[currentQuote].author);
}

function getRandomQuote() {
  currentQuote = Math.round(Math.random() * (listQuotes.length));
  setQuote();
}

function changeQuote() {
  // $("blockquote").fadeToggle( "slow", "linear" );
  if(currentQuote < listQuotes.length - 1){
    currentQuote++;
  } else {
    currentQuote = 0;
  }
  setQuote();
}

$(".previous").click(function() {
  if(currentQuote > 0){
    currentQuote--;
  } else {
    currentQuote = listQuotes.length - 1;
  }
  setQuote();
  progressWidth = 0;
});

$(".next").click(function() {
  changeQuote();
  progressWidth = 0;
});

$(".random").click(function() {
  getRandomQuote();
  progressWidth = 0;
});

setQuote();
</script>

</body>
<?php
include("./includes/comun/footer.php");
?>

</html>