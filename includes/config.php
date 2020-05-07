<?php

include_once(__DIR__."/constants.php");

session_start();


ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');

spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = 'fdi\\ucm\\aw\\booxchange\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__."/";

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        echo "No carga: $prefix  y  $base_dir\n";
        echo "la clase es $class\n";
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    //echo "El directorio es: $file\n";
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

use fdi\ucm\aw\booxchange\daos\DAO as DAO;
use fdi\ucm\aw\booxchange\daos\DAOChat as DAOChat;
use fdi\ucm\aw\booxchange\daos\DAOComentarios as DAOComentarios;
use fdi\ucm\aw\booxchange\daos\DAOCompras as DAOCompras;
use fdi\ucm\aw\booxchange\daos\DAODiscusion as DAODiscusion;
use fdi\ucm\aw\booxchange\daos\DAOFavoritos as DAOFavoritos;
use fdi\ucm\aw\booxchange\daos\DAOGenero as DAOGenero;
use fdi\ucm\aw\booxchange\daos\DAOIntercambios as DAOIntercambios;
use fdi\ucm\aw\booxchange\daos\DAOLibro as DAOLibro;
use fdi\ucm\aw\booxchange\daos\DAOLibroIntercambio as DAOLibroIntercambio;
use fdi\ucm\aw\booxchange\daos\DAOMensajeChat as DAOMensajeChat;
use fdi\ucm\aw\booxchange\daos\DAOTema as DAOTema;
use fdi\ucm\aw\booxchange\daos\DAOUsuario as DAOUsuario;
use fdi\ucm\aw\booxchange\daos\DAOValoracionLibro as DAOValoracionLibro;
use fdi\ucm\aw\booxchange\daos\DAOOfertasIntercambio as DAOOfertasIntercambio;
use fdi\ucm\aw\booxchange\daos\DAONotificacion as DAONotificacion;

use fdi\ucm\aw\booxchange\transfers\TChat as TChat;
use fdi\ucm\aw\booxchange\transfers\TComentarios as TComentarios;
use fdi\ucm\aw\booxchange\transfers\TCompras as TCompras;
use fdi\ucm\aw\booxchange\transfers\TDiscusion as TDiscusion;
use fdi\ucm\aw\booxchange\transfers\TFavoritos as TFavoritos;
use fdi\ucm\aw\booxchange\transfers\TGenero as TGenero;
use fdi\ucm\aw\booxchange\transfers\TIntercambio as TIntercambio;
use fdi\ucm\aw\booxchange\transfers\TLibro as TLibro;
use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio as TLibroIntercambio;
use fdi\ucm\aw\booxchange\transfers\TMensajeChat as TMensajeChat;
use fdi\ucm\aw\booxchange\transfers\TTema as TTema;
use fdi\ucm\aw\booxchange\transfers\TUsuario as TUsuario;
use fdi\ucm\aw\booxchange\transfers\TValoracionLibro as TValoracionLibro;
use fdi\ucm\aw\booxchange\transfers\TOfertasIntercambio as TOfertasIntercambio;
use fdi\ucm\aw\booxchange\transfers\TNotificacion as TNotificacion;

use fdi\ucm\aw\booxchange\formularios\Form as Form;
use fdi\ucm\aw\booxchange\formularios\FormularioLogin as FormularioLogin;
use fdi\ucm\aw\booxchange\formularios\FormularioRegistro as FormularioRegistro;
use fdi\ucm\aw\booxchange\formularios\FormularioCompraLibro as FormularioCompraLibro;
use fdi\ucm\aw\booxchange\formularios\FormularioModificarPerfil as FormularioModificarPerfil;
use fdi\ucm\aw\booxchange\formularios\FormularioIntercambio as FormularioIntercambio;
use fdi\ucm\aw\booxchange\formularios\FormularioIntercambioMisterioso as FormularioIntercambioMisterioso;


function make_safe($variable) 
{
   $variable = htmlspecialchars(trim(strip_tags($variable)));;
   return $variable; 
}

?>