<?php
//Fichero dedicado a la declaracion de constantes para el proyecto

/*
INICIALES SEGÚN EL PROCESO O PARTE DEL PROYECTO
    BD --> BASE DE DATOS
    REG --> REGISTRO (FORMULARIO)
    LOG --> LOGIN (FORMULARIO)

*/

$parentDir = dirname(__DIR__, 1);
$imgDirectory = "imagenes/";

//Fichero donde se guardan las imagenes
define("IMG_DIRECTORY_USER", "$imgDirectory"."usuarios/");
define("IMG_DIRECTORY_LIBROS", "$imgDirectory"."libros/");
define("IMG_DIRECTORY_LIBROS_INTERCAMBIO", "$imgDirectory"."librosIntercambio/");

//Es el mismo nombre para los libros
define("IMG_DEFAULT_LIBRO", "default.jpg");
define("IMG_DEFAULT_USER", "default.png");

//Información de la base de datos
define("BD_HOST", "localhost");
define("BD_NAME", "bdbooxchange");
define("BD_USER", "root");
define("BD_PASS", "");

//Valores para la base de datos
define("BD_TYPE_ADMIN", 0);
define("BD_TYPE_NORMAL_USER", 1);
define("BD_TYPE_NORMAL_MODERATOR", 2);


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


//Claves para la tabla de Libros de la Base de Datos
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
define("BD_LIBRO_FECHA_PUBLICACION", "FechaPublicacion");



//Claves para la tabla de Libros Intercambios de la Base de Datos
define("BD_LIBRO_INTER_ID", "Id_Libro_Inter");
define("BD_LIBRO_INTER_AUTOR", "AutorLibInter");
define("BD_LIBRO_INTER_IMG", "Imagen");
define("BD_LIBRO_INTER_DESCRIPCION", "Descripcion");
define("BD_LIBRO_INTER_GENERO", "Genero");
define("BD_LIBRO_INTER_ID_USER", "Id_Usuario");
define("BD_LIBRO_INTER_TITULO", "Titulo");
define("BD_LIBRO_INTER_INTERCAMBIADO", "Intercambiado");
define("BD_LIBRO_INTER_ES_OFERTA", "esOferta");
define("BD_LIBRO_INTER_FECHA", "Fecha");

define("ES_OFERTA", 1);
define("NO_ES_OFERTA", 0);

define("INTERCAMBIADO", 1);
define("NO_INTERCAMBIADO", 0);
define("LIBRO_RECHAZADO", 2);

//Claves para la tabla de Ofertas de Intercambios de la Base de Datos
define("BD_OFERTA_INTER_ID", "id");
define("BD_OFERTA_INTER_ID_LIBRO_INTER", "idLibroIntercambio");
define("BD_OFERTA_INTER_ID_LIBRO_OFERTA", "idLibroOferta");
define("BD_OFERTA_INTER_OFERTA_ACEPTADA", "ofertaAceptada");

define("OFERTA_ACEPTADA", 1);
define("OFERTA_RECHAZADA", 0);
define("OFERTA_DISPONIBLE", 2);


//Claves para la tabla de Intercambios de la Base de Datos
define("BD_INTERCAMBIOS_ID", "Id_Intercambio");
define("BD_INTERCAMBIOS_ID_LIBRO1", "Id_Libro_Inter1");
define("BD_INTERCAMBIOS_ID_LIBRO2", "Id_Libro_Inter2");
define("BD_INTERCAMBIOS_ES_MISTERIOSO", "EsMisterioso");
define("BD_INTERCAMBIOS_FECHA", "Fecha");

define("MISTERIOSO", 1);
define("NO_MISTERIOSO", 0);

define("ERROR", -1);
define("INTERCAMBIO_NO_ENCONTRADO", 0);
define("INTERCAMBIO_ENCONTRADO", 1);

//Claves para la tabla de Genero de la Base de Datos
define("BD_GENERO_GENERO","Genero");


//Claves para la tabla de Notificaciones de la Base de Datos
define("BD_NOTIFICACION_ID", "id");
define("BD_NOTIFICACION_ID_USUARIO", "idUsuario");
define("BD_NOTIFICACION_MENSAJE", "mensaje");
define("BD_NOTIFICACION_LEIDO", "leido");
define("BD_NOTIFICACION_FECHA", "fecha");

//Clavos para la tabla de ValoracionLibro de la Base de Datos
define("BD_VALORACIONLIBRO_ID", "id_valoracion");
define("BD_VALORACIONLIBRO_IDLIBRO", "id_libro");
define("BD_VALORACIONLIBRO_IDUSUARIO", "id_usuario");
define("BD_VALORACIONLIBRO_VALORACION", "valoracion");
define("BD_VALORACIONLIBRO_COMENTARIO", "comentario");

//Constantes para la tabla de Temas
define("BD_TEMA", "Tema");
//Constantes para la tabla de Discusiones
define("BD_DISCUSION_ID", "Id_Discusion");
define("BD_DISCUSION_USUARIO_CREADOR", "Id_Usuario_Creador");
define("BD_DISCUSION_FECHA", "Fecha");
define("BD_DISCUSION_TEMA", "Tema");
define("BD_DISCUSION_TITULO", "Titulo");
define("BD_DISCUSION_NUMCOMENTARIOS", "NumComentarios");
define("BD_DISCUSION_NUMVISITAS", "NumVisitas");
//Constantes para la tabla de Comentarios
define("BD_COMENTARIOS_ID", "Id_Comentario");
define("BD_COMENTARIOS_ID_USUARIO", "Id_Usuario");
define("BD_COMENTARIOS_TEXTO", "Texto");
define("BD_COMENTARIOS_FECHA", "Fecha");
define("BD_COMENTARIOS_ID_DISCUSION", "Id_Discusion");
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
