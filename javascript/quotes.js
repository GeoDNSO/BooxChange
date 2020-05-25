$.getJSON('javascript/quotes.json', function(data){
  var listQuotes = data.quotes;

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
});


