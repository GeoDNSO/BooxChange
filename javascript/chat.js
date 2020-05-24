//Script JS para chat dinamico

var preMessageInChat = 0;
var messagesInChat = 0;
let stateChanged = false;

$(document).ready(function () {

    getStateOfChat();
    

    $("#botonEnviar").click(function () { 
        console.log($("#mensajeChatTextoEnviar").val())
        sendChat($("#mensajeChatTextoEnviar").val());
        $("#mensajeChatTextoEnviar").val("");
    });

    stateChanged = false; //Reinicio del estado...


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
                    if(mensajeEnviado){
                        let newAudio = new Audio("audio/whatsappNotiSend.mp3");
                        newAudio.play();
                    }else{
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
