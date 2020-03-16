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


//Claves para la tabla de Usuarios de la Base de Datos
define("BD_USER_ID_USUARIO", "Id_Usuario");
define("BD_USER_NOMBRE", "Nombre");
define("BD_USER_NOMBRE_REAL", "NombreReal");
define("BD_USER_CORREO", "Correo");
define("BD_USER_PASSWORD", "Contraseña");
define("BD_USER_FOTO", "Foto");
define("BD_USER_NACIMIENTO", "Nacimiento");
define("BD_USER_ROL", "Rol");
define("BD_USER_CIUDAD", "Ciudad");
define("BD_USER_DIRECCION", "Direccion");
define("BD_USER_FECHA_CREACION", "FechaDeCreacion");


//Claves para la tabla de Libros de la Base de DatoS
define("BD_LIBRO_ID_LIBRO", "Id_Libro");
define("BD_LIBRO_TITULO", "Titulo");
define("BD_LIBRO_AUTOR", "Autor");
define("BD_LIBRO_PRECIO", "Precio");
define("BD_LIBRO_VALORACION", "Valoracion");
define("BD_LIBRO_RANKING", "Ranking");
define("BD_LIBRO_IMAGEN", "Imagen");
define("BD_LIBRO_DESCRIPCIÓN", "Descripcion");
define("BD_LIBRO_GENERO", "Genero");
define("BD_LIBRO_EN_TIENDA", "EnTienda");
define("BD_LIBRO_FECHA", "Fecha");
define("BD_LIBRO_IDIOMA", "Idioma");
define("BD_LIBRO_EDITORIAL", "Editorial");
define("BD_LIBRO_DESCUENTO", "Descuento");
define("BD_LIBRO_UNIDADES", "unidades");


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
