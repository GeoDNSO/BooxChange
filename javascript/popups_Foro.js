function alertaComentario() {
alert("Su comentario fue añadido con éxito!");
}

function alertaDiscusion() {
alert("Su discusión fue añadida con éxito!");
}

function alertaTema() {
alert("Su tema fue añadido con éxito!");
}
function myBotonCom(){
  var popup = document.getElementById("myPopupCom");
  popup.classList.toggle("show");
}
function myBotonDisc(){
  var popup = document.getElementById("myPopupDisc");
  popup.classList.toggle("show");
}
function myBotonForo(){
  var popup = document.getElementById("myPopupTema");
  popup.classList.toggle("show");
}
