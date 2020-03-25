<?php

namespace fdi\ucm\aw\booxchange\formularios;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");


use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

class FormularioIntercambio extends Form
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
        $html = '<fieldset>';
        $html .= '<legend>Libro para Intercambio</legend>';
        $html .= '<label for="titulo"><b>Titulo</b></label><br>';
        $html .= '<input type="text" placeholder="Titulo del libro que vas a intercambiar" name="titulo" id="titulo" value="" /><br><br>';
        $html .= '<label for="fotoLibro"><b>Foto del Libro</b></label><br>';
        $html .= '<input type="text" placeholder="" name="fotoLibro" id="fotoLibro" value="" /><br><br>';
        $html .= '<label for="autor"><b>Autor</b></label><br>';
        $html .= '<input type="text" placeholder="Autor del libro" name="autor"  id="autor"  value="" /><br><br>';
        $html .= '<label for="genero"><b>Genero</b></label><br>';
        $html .= '<input type="text" placeholder="Foto, por ahora no funcional" name="genero"  id="genero" /><br><br>';
        $html .= '<label for="descripcion"><b>Descripcion</b></label><br>';
        $html .= '<textarea id="descripcion" name="descripcion" rows="5" cols="50" placeholder="Escribe aquí algo interesante que pueda hacer que tu libro sea más atractivo a otros usuarios..."></textarea> <br>';
        $html .= '<button type="submit">Registrarse</button>';
        $html .= '</fieldset>';

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
