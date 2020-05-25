var listQuotes = [
    {quote: "Mientras el corazón late, mientras el cuerpo y el alma siguen juntos, no puedo admitir que cualquier criatura dotada de voluntad tiene necesidad de perder la esperanza en la vida.", author: "Julio Verne, Viaje al centro de la tierra"},
    {quote: "Hay libros cuyas partes traseras y cubiertas son de lejos la mejor parte.", author: "Charles Dickens, Oliver Twist"},
    {quote: "Las personas mayores nunca puede comprender algo por sí solas y es muy aburrido para los niños tener que darles una y otra vez explicaciones.", author: "Antoine de Saint-Exupéry, El principito"},
    {quote: "Hay que tener cuidado con los libros y lo que hay dentro de ellos, ya que las palabras tienen el poder de cambiarnos.", author: "Cassandra Clare, El Ángel mecánico"},
    {quote: "Por honor, cuando cuando un hombre moría, si su viuda no era reclamada por el jefe del clan, se esperaba de ella que se lanzara a la pira funeraria de su marido.", author: "Brent Weeks, Más allá de las sombras"},
    {quote: "Lo peor de la tarea eran los cuerpos. Algunos parecían filetes chamuscados, con una costra negra por fuera, pero agrietada y rezumando por dentro. ¡Y esa peste a carne asada y pelo quemado!.", author: "Brent Weeks, Al filo de las sombras"},
    {quote: "El mundo estaba muriendo. Sus dioses tenían que morir con él.", author: "Brandon Sanderson, El héroe de las eras"},
    {quote: "Un cuchillo de dolor le rajó la espalda; sintió que se le abría la piel; le llegó el hedor de la sangre al arder, y vio la sombra de las alas.", author: "George R.R. Martin, Juego de tronos"},
    {quote: "Los soñadores [...] serán quienes reconstruyan y salven el mundo.", author: "Sarah J. Maas, Imperio de tormentas"},
    {quote: "Eres como una patata en un campo de minas", author: "Brandom Sanderson, Steelheart"},
    {quote: "¿Acaso la lealtad es encomiable cuando va en la dirección errónea?.", author: "Cassandra Clare, La princesa mecánica"},
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