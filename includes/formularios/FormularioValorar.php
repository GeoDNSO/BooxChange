<?php

namespace fdi\ucm\aw\booxchange\formularios;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");


use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

class FormularioValorar extends Form
{

    private $libro;

    public function __construct($formId, $opciones = array())
    {
        parent::__construct($formId, $opciones);
        $this->libro = $opciones['libro'];
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
        $html = '    <label for="valoracion"><b>Valoración:</b></label>';
        $html .= '    <select id="valoracion" name="valoracion">';
        for ($i=1; $i <=10; $i++){
            $html .= '      <option>' . $i . '</option>';
        }
        $html .= '      </select>';
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
        $valoración = $datos["valoracion"];

        $app = appBooxChange::getInstance();

        $app->valorarLibro($this->libro, $valoración, $_SESSION['id_Usuario']);

        
    }
}
