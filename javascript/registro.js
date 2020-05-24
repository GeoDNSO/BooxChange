$(document).ready(function() {
    $("#siNombre").hide();
    $("#siUser").hide();
    $("#siMail").hide();
    $("#siPass").hide();
    $("#siPassR").hide();
    $("#siFecha").hide();
    $("#siCiudad").hide();
    $("#siDir").hide();

    $(".modificar").hide();


    $("#userRealName").change(function(){

        if ( nombreValido($("#userRealName").val() ) ) {
            $("#siNombre").show();
            $("#noNombre").hide();
        } else {
            $("#siNombre").hide();
            $("#noNombre").show();

            alert ("El nombre ha de ser de mínimo 5 caracteres");
        }

    });

    $("#username").change(function(){

        if (usuarioValido($("#username").val() ) ){
            var url="includes/procesosAJAX/comprobarUsuario.php?user=" + $("#username").val();
            $.get(url,usuarioExiste);
        }
        else {
            $("#siUser").hide();
            $("#noUser").show();

            alert ("El nombre de usuario ha de ser de mínimo 5 caracteres");
        }
        

    });

    $("#email").change(function(){

        if ( correoValido($("#email").val() ) ) {

            var url="includes/procesosAJAX/comprobarCorreo.php?correo=" + $("#email").val();
            $.get(url,correoValidacion);
            
        } else {
            $("#siMail").hide();
            $("#noMail").show();

            alert ("La dirección de correo ha de tener al menos 8 caracteres y presentar el siguiente formato: ______@______.___");
        }

    });

    $("#passwd").change(function(){

        var pass = $("#passwd").val();
        var passR = $("#passwdR").val();

        if ( contraValida($("#passwd").val() ) ) {
            $("#siPass").show();
            $("#noPass").hide();
            if ( pass == passR) {
                $("#siPassR").show();
                $("#noPassR").hide();
            } else {
                $("#siPassR").hide();
                $("#noPassR").show();
            }
        } else {
            $("#siPass").hide();
            $("#noPass").show();
            $("#siPassR").hide();
            $("#noPassR").show();

            alert ("La contraseña ha de ser de mínimo 5 caracteres");
        }

    });

    $("#passwdR").change(function(){
        var pass = $("#passwd").val();
        var passR = $("#passwdR").val();
        if ( pass == passR) {
            $("#siPassR").show();
            $("#noPassR").hide();
        } else {
            $("#siPassR").hide();
            $("#noPassR").show();

            alert ("Las contraseñas han de coincidir");
        }

    });

    $("#fechaNac").change(function(){

        if ( fechaValida($("#fechaNac").val() ) ) {
            $("#siFecha").show();
            $("#noFecha").hide();
        } else {
            $("#siFecha").hide();
            $("#noFecha").show();

            alert ("La fecha ha de ser válida");
        }

    });

    $("#ciudad").change(function(){

        if ( ciudadValida($("#ciudad").val() ) ) {
            $("#siCiudad").show();
            $("#noCiudad").hide();
        } else {
            $("#siCiudad").hide();
            $("#noCiudad").show();

            alert ("La ciudad ha de ser de mínimo 3 caracteres");
        }

    });

    $("#direccion").change(function(){

        if ( nombreValido($("#direccion").val() ) ) {
            $("#siDir").show();
            $("#noDir").hide();
        } else {
            $("#siDir").hide();
            $("#noDir").show();

            alert ("La dirección ha de ser de mínimo 5 caracteres");
        }

    });

    $(".undo-button").click(function(){
        undo();
    });

});

function nombreValido(nombre){
    if(nombre.length >= 5){
        return true;
    }
    return false;
}

function usuarioValido(usuario){
    if(usuario.length >= 5){
        return true;
    }
    return false;
}

function usuarioExiste(data, status){
    if(data == "existe"){
        $("#siUser").hide();
        $("#noUser").show();

        alert("El nombre de usuario ya existe");
    }
    if(data == "disponible"){
        $("#siUser").show();
        $("#noUser").hide();
    }

}

function correoValido(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function correoValidacion(data, status){
    if(data == "NO"){
        $("#noMail").show();
        $("#siMail").hide();

        alert("La dirección de correo ya está ocupada");
    }
    if(data == "SI"){
        $("#noMail").hide();
        $("#siMail").show();
    }
}

function contraValida(pass){
    if(pass.length >= 5){
        return true;
    }
    return false;
}

function contraRValida(passR, pass){
    if(passR != pass){
        return false;
    }
    return false;
}

function fechaValida(fecha){
    if(!fecha){
        return false;
    }
    return true;
}

function ciudadValida(ciudad){
    if(ciudad.length >= 3){
        return true;
    }
    return false;
}

function ciudadValida(dir){
    if(dir.length >= 5){
        return true;
    }
    return false;
}

function undo(){
    $(".modificar").hide();
}