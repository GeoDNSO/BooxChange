<?php

namespace fdi\ucm\aw\booxchange\formularios;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");


use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

class FormularioLogin extends Form
{


    public function __construct($formId, $opciones = array())
    {
        parent::__construct($formId, $opciones);
    }

    /**
     * Genera el HTML necesario para presentar los campos del formulario.
     *
     * @param string[] $datosIniciales Datos iniciales para los campos del formulario (normalmente <code>$_POST</code>).
     * 
     * @return string HTML asociado a los campos del formulario.
     */
    protected function generaCamposFormulario($datosIniciales)
    {
        $html = '<div id="login">';
        $html .= '<form method="post" action="includes/procesos/procesarLogin.php">';
        $html .= '    <label for="userRealName"><b>Nombre de usuario:</b></label><br>';
        $html .= '    <input type="text" placeholder="" name="username" id="username" /><br><br>';
        $html .= '    <label for="password"><b>Contraseña:</b></label><br>';
        $html .= '    <input type="password" placeholder="" name="password" id="password" /><br><br>';
        $html .= '    <input type="submit" value="Iniciar sesión" />';
        $html .= '</form>';
        $html .= '</div>';

        return $html;
    }

    /**
     * Procesa los datos del formulario.
     *
     * @param string[] $datos Datos enviado por el usuario (normalmente <code>$_POST</code>).
     *
     * @return string|string[] Devuelve el resultado del procesamiento del formulario, normalmente una URL a la que
     * se desea que se redirija al usuario, o un array con los errores que ha habido durante el procesamiento del formulario.
     */
    protected function procesaFormulario($datos)
    {


        //include_once($parentDir."/appBooxChange.php");
        //include_once($parentDir."../constants.php");

        $app = appBooxChange::getInstance();


        //Id se puede dejar nulo

        $nombreUsuario = $datos[LOG_USERNAME];
        $password = $datos[LOG_PASSWORD];


        $app->logInUsuario($nombreUsuario, $password);
        header("Location: ../../index.php");
        $parentDir = dirname(__DIR__, 2);
        $path = $parentDir."/index.php";
        //return $path;
        return "./index.php";
    }
}
