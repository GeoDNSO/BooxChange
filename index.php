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
                <h1>Alma jóven</h1>
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
    {quote: "Do not dwell in the past, do not dream of the future, concentrate the mind on the present moment.", author: "Buddha"},
    {quote: "Two things are infinite: the universe and human stupidity; and I'm not sure about the universe.", author: "Albert Einstein"},
    {quote: "Be who you are and say what you feel, because those who mind don't matter, and those who matter don't mind.", author: "Bernard M. Baruch"},
    {quote: "A room without books is like a body without a soul.", author: "Marcus Tullius Cicero"},
    {quote: "You only live once, but if you do it right, once is enough.", author: "Mae West"},
    {quote: "Be the change that you wish to see in the world.", author: "Mahatma Gandhi"},
    {quote: "If you want to know what a man's like, take a good look at how he treats his inferiors, not his equals.", author: "J.K. Rowling, Harry Potter and the Goblet of Fire"},
    {quote: "No one can make you feel inferior without your consent.", author: "Eleanor Roosevelt, This is My Story"},
    {quote: "If you tell the truth, you don't have to remember anything.", author: "Mark Twain"},
    {quote: "You've gotta dance like there's nobody watching, Love like you'll never be hurt, Sing like there's nobody listening, And live like it's heaven on earth.", author: "William W. Purkey"},
    {quote: "Be yourself; everyone else is already taken.", author: "Oscar Wilde"}
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