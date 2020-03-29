<?php

namespace fdi\ucm\aw\booxchange\formularios;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");


use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

class FormularioValorar extends Form
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
        $app = appBooxChange::getInstance();
        $libros = $app->librosTienda();

        $html = '  <br>  <label for="valoracion"><b>Valoración:</b></label>';

        $html .= '    <select id="libro" name="libro">';
        foreach ($libros as $libro){
            $html .= '      <option>' . $libro->getTitulo() . '</option>';
        }
        $html .= '      </select>';

        $html .= '    <select id="valoracion" name="valoracion">';
        for ($i=1; $i <=10; $i++){
            $html .= '      <option>' . $i . '</option>';
        }
        $html .= '      </select>';
        
        $html .= '  <br>  <textarea placeholder="Escriba aquí su comentario..." name="comentario"></textarea> <br>';
        

        $html .= '    <input type="submit" value="Valorar" />';

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

        $erroresFormulario = array();

        //Libro y valoración tienen un valor por defecto
        $libro = $datos['libro'];

        $valoracion = $datos['valoracion'];

        $comentario = isset($datos['comentario']) ? $datos['comentario'] : null;
        $comentario = make_safe($comentario);
        if (empty($comentario) || mb_strlen($comentario) < 1) {
            $erroresFormulario[] = "ERROR: Introduzca un comentario";
        }
        if (count($erroresFormulario) === 0){
            $app = appBooxChange::getInstance();
            $app->valorarLibro($libro, $valoracion, $_SESSION['id_Usuario'], $comentario);

            return "rankingLibros.php";
        }
        else{
            return $erroresFormulario;
        }
   
    }
}
