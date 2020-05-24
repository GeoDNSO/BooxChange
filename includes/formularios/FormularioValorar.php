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
        $libroId = $this->formOptions['libroId'];

        $html = "<div class='nuevoComentario'>";
        $html .= "<input class='line' type='hidden' name='libro' value='$libroId'>";
        $html .= '<p class="estrellas">';
        $html .= '<input id="radio1" type="radio" name="estrellas" value="5" required><label for="radio1">★</label>
        <input id="radio2" type="radio" name="estrellas" value="4" required><label for="radio2">★</label>
        <input id="radio3" type="radio" name="estrellas" value="3" required><label for="radio3">★</label>
        <input id="radio4" type="radio" name="estrellas" value="2" required><label for="radio4">★</label>
        <input id="radio5" type="radio" name="estrellas" value="1" required><label for="radio5">★</label>';
        $html .= '</p>';

        $html .= '<textarea height=100% class="line" style="resize: none;" placeholder="Escriba aquí su comentario..." name="comentario"></textarea> <br>';
        

        $html .= '<input type="submit" class="send-button" value="Valorar" onclick="setTimeout(timer, 1500)"/>';
        $html .= "</div>";
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
        
        //Libro y valoración tienen un valor por defecto
        $idLibro = $datos['libro'];

        $valoracion = $datos['estrellas'];

        $comentario = isset($datos['comentario']) ? $datos['comentario'] : null;
        $comentario = make_safe($comentario);


        $app = appBooxChange::getInstance();
        $app->valorarLibro($idLibro, $valoracion, $_SESSION['id_Usuario'], $comentario);

        return "rankingLibros.php";

   
    }
}
