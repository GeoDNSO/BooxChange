//Script JS para inicializar / actualizar cookies

$(document).ready(function () {

    $("#styleMode").change(function () {
        listenerStyleChanged("styleMode")
    });

    //Para la bombilla
    $("#styleModeBulb").change(function () {
        listenerStyleChanged("styleModeBulb")
    });

    //Poner estilo web correspondiente
    setWebStyle()

    var imgValWeb = document.querySelectorAll('.imgValWeb');
    var valWebText = document.querySelectorAll('.valWebText');

    for (var i = 0; i < imgValWeb.length; ++i){
        //pasar por encimade las fotos
        imgValWeb[i].addEventListener('mouseover', function(){
            for (var i = 0; i < valWebText.length; ++i) {
                //pone los que no sin el active
                valWebText[i].className='valWebText';
            }
            document.getElementById(this.dataset.id).className = 'valWebText active';

            for (var i = 0; i < imgValWeb.length; ++i) {
                imgValWeb[i].className='imgValWeb';
            }
            this.className = 'imgValWeb active';
        })
    }
});


function listenerStyleChanged(elementID) {
    var expiresdate = new Date(2020, 20, 07, 12, 01);
    if (document.getElementById(elementID).checked === true) {//Pasar a modo oscuro
        //cookie ya existe
        if (checkCookie("estiloWeb") == true) {
            document.cookie = "estiloWeb=oscuro";
        } else {
            document.cookie = "estiloWeb=oscuro" + "; expires=" + expiresdate.toUTCString();
        }
    } else {//Pasar a modo claro
        //cookie ya existe
        if (checkCookie("estiloWeb") == true) {
            document.cookie = "estiloWeb=claro";
        }
        else {
            document.cookie = "estiloWeb=claro" + "; expires=" + expiresdate.toUTCString();
        }

    }
    //Poner estilo web correspondiente
    setWebStyle()
}

function setWebStyle() {
    let style = getCookie("estiloWeb");

    if (style == "claro") {
        document.getElementById('estiloRoot').setAttribute('href', "css/root.css");
    } else if (style == "oscuro") {
        document.getElementById('estiloRoot').setAttribute('href', "css/root_dark_mode.css");
    }

}



//Gestión de Cookies
//https://www.w3schools.com/js/js_cookies.asp
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(cname) {
    var name = getCookie(cname);
    if (name != "") {
        return true;
    }
    return false;
}