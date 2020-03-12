<?php
//Fichero dedicado a la declaracion de constantes para el proyecto

/*
INICIALES SEGÚN EL PROCESO O PARTE DEL PROYECTO
    BD --> BASE DE DATOS
    REG --> REGISTRO (FORMULARIO)
    LOG --> LOGIN (FORMULARIO)

*/


//Información de la base de datos
define("BD_HOST", "localhost");
define("BD_NAME", "bdbooxchange");
define("BD_USER", "root");
define("BD_PASS", "");

//Valores para la base de datos
define("BD_TYPE_NORMAL_USER", "usuario");


//Constantes para el formulario de Registro
define("REG_REALNAME", "userRealName");
define("REG_USERNAME", "username");
define("REG_FOTO", "foto");
define("REG_EMAIL", "email");
define("REG_PASS", "passwd");
define("REG_PASSR", "passwdR");
define("REG_FECHA_NAC", "fechaNac");
define("REG_CIUDAD", "ciudad");
define("REG_DIRECCION", "direccion");

define("REG_DATA_NO_SET", "REG_DATA_NO_SET");
define("REG_PASS_EQ", "REG_PASS_EQ");
define("REG_HASH_ALGO", "sha256");

//Constantes para el formulario de login
define("LOG_USERNAME", "username");
define("LOG_PASSWORD", "password");

//Varibles de Session

/*
'login' = true/false
'nombre' = nombre de usuario
'rol' = {0 = admin, 1 = usuario registrado, 2 = ?????} DEFINIR!
'usuario' = $TUsuario solo lo utilizaremos en usuario.php

*/

?>
