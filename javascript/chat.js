//Script JS para chat dinamico

var preMessageInChat = 0;
var messagesInChat = 0;
let stateChanged = false;

$(document).ready(function () {

    getStateOfChat();


    $("#botonEnviar").click(function () {
        enviarMensaje();
    });


    $("#mensajeChatTextoEnviar").on('keypress',function(e) {
        if(e.which == 13) {
            enviarMensaje();
        }
    });


    // Applied globally on all textareas with the "autoExpand" class
    $(document)
        .one('focus.autoExpand', 'textarea.autoExpand', function () {
            var savedValue = this.value;
            this.value = '';
            this.baseScrollHeight = this.scrollHeight;
            this.value = savedValue;
        })
        .on('input.autoExpand', 'textarea.autoExpand', function () {
            var minRows = this.getAttribute('data-min-rows') | 0, rows;
            this.rows = minRows;
            rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
            this.rows = minRows + rows;
        });

    stateChanged = false; //Reinicio del estado...

    //Colocar el Chat en el punto más reciente
    var element = document.getElementById("messages");
    element.scrollTop = element.scrollHeight;
    setInterval(updateChat, 1500);
});



function sendChat(chatMessage) {
    let idchat = Url.get.idchat;
    $.ajax({
        type: "POST",
        url: "includes/procesosAJAX/gestionChat.php",
        data: { 'function': 'send', 'idchat': idchat, 'mensaje': chatMessage },
        success: function (data) {
            updateChat(true);
        }
    })
}

function enviarMensaje() {
    sendChat($("#mensajeChatTextoEnviar").val());
    $("#mensajeChatTextoEnviar").val("");
}


//gets the state of the chat
function getStateOfChat() {
    let idchat = Url.get.idchat;
    let rst = $.ajax({
        type: "POST",
        url: "includes/procesosAJAX/gestionChat.php",
        data: { 'function': 'getNumberOfMessages', 'idchat': idchat },
        dataType: "json",
        success: function (data) {
            if (messagesInChat != data) {
                stateChanged = true;
                preMessageInChat = messagesInChat;
                messagesInChat = data;
            } else {
                stateChanged = false;
            }
            return stateChanged;
        }
    });

    return rst;
}


//Updates the chat
function updateChat(mensajeEnviado = false) {

    let getState = getStateOfChat();
    let idchat = Url.get.idchat;
    $.when(getState).done(function (state) {
        if (stateChanged === true) {
            $.ajax({
                type: "POST",
                url: "includes/procesosAJAX/gestionChat.php",
                data: { 'function': 'update', 'idchat': idchat, 'iniMensajes': preMessageInChat },
                //dataType: "json",
                error: function (xhr, status, error) {
                    console.log(xhr);
                    alert(error.Message);
                    return -1;
                },
                success: function (data) {
                    if (mensajeEnviado) {
                        let newAudio = new Audio("audio/whatsappNotiSend.mp3");
                        newAudio.play();
                    } else {
                        let newAudio = new Audio("audio/whatsappNoti.mp3");
                        newAudio.play();
                    }

                    $("#messages").append(data);

                    var element = document.getElementById("messages");
                    element.scrollTop = element.scrollHeight;



                    stateChanged = false;
                }
            });
        }
    });

}

function autosize() {
    var el = this;
    setTimeout(function () {
        el.style.cssText = 'height:auto; padding:0';
        // for box-sizing other than "content-box" use:
        // el.style.cssText = '-moz-box-sizing:content-box';
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
    }, 0);
}


//https://stackoverflow.com/questions/827368/using-the-get-parameter-of-a-url-in-javascript from Gatsbimantico
Url = {
    get get() {
        var vars = {};
        if (window.location.search.length !== 0)
            window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
                key = decodeURIComponent(key);
                if (typeof vars[key] === "undefined") { vars[key] = decodeURIComponent(value); }
                else { vars[key] = [].concat(vars[key], decodeURIComponent(value)); }
            });
        return vars;
    }
};
