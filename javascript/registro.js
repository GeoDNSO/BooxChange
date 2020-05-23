$(document).ready(function() {
    $("#siMail").hide();
    //$("#siUser").hide();

    $("#email").change(function(){
        if ( correoValido($("#email").val() ) ) {
            $("#noMail").hide();
            $("#siMail").show();
        } else {
            $("#siMail").hide();
            $("#noMail").show();
        }
    });
/*
    $("#user").change(function(){
        var url="comprobarUsuario.php?user=" + $("#user").val();

        $.get(url,usuarioExiste);


    });
*/
});

function correoValido(email){
    if(email.indexOf('@') > -1){
        if(email.indexOf('.') > email.indexOf('@')){
            return true;
        }
    }
    return false;
}