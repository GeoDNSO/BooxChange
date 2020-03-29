<?php

namespace fdi\ucm\aw\booxchange\formularios;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");


use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio;

class FormularioIntercambioMisterioso extends Form
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

        $html = '<fieldset>';
        $html .= '    <legend>Libro para Intercambio Misterioso</legend>';
        $html .= '    <label for="titulo"><b>Titulo</b></label><br>';
        $html .= '    <input type="text" placeholder="Titulo del libro que vas a intercambiar" name="titulo" id="titulo" value="" /><br><br>';
        $html .= '    <label for="fotoLibro"><b>Foto del Libro</b></label><br>';
        //$html .= '    <input type="text" placeholder="" name="fotoLibro" id="fotoLibro" value="" /><br><br>';
        $html .= '    <input type="file" name="fotoLibro" id="fotoLibro" accept="image/*"/> <br><br>';
        $html .= '    <label for="autor"><b>Autor</b></label><br>';
        $html .= '    <input type="text" placeholder="Autor del libro" name="autor"  id="autor"  value="" /><br><br>';
        $html .= '    <label for="genero"><b>Género</b></label><br>';

        //Seleccion de Generos
        $html .= '    <select id="genero" name="genero"><br><br>';
        $html .= $app->construirSeleccionDeCategorias();
        $html .= '    </select><br><br>';

        $html .= '    <button type="submit">Subir Libro</button>';
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

        $erroresFormulario = array();

        $titulo = isset($datos['titulo']) ? $datos['titulo'] : null;
        $titulo = make_safe($titulo);
        if (empty($titulo) || mb_strlen($titulo) < 2) {
            $erroresFormulario[] = "El título ha de tener una longitud de al menos 3 caracteres";
        }

        $fotoLibro = $datos["fotoLibro"];
        $fotoLibro = make_safe($fotoLibro);

        //Subir imagen al servidor
        $fotoBD = "";
        if(isset($_FILES["fotoLibro"]) && $_FILES["fotoLibro"]["name"] != ""){
            $fotoBD =  (IMG_DIRECTORY_USER . $_FILES["fotoLibro"]["name"]);
            $fotoBD = str_replace("\\", "/", $fotoBD);
            move_uploaded_file( $_FILES["fotoLibro"]['tmp_name']  , $fotoBD);
        }else{
            $fotoBD = (IMG_DIRECTORY_LIBROS_INTERCAMBIO . IMG_DEFAULT_USER);
        }

        $autor = isset($datos['autor']) ? $datos['autor'] : null;
        $autor = make_safe($autor);
        if (empty($autor) || mb_strlen($autor) < 4) {
            $erroresFormulario[] = "Introduzca el nombre del autor, 4 caracteres mínimo";
        }

        $genero = $datos["genero"];

        
        $desc = "Libro Misterioso";


        if (count($erroresFormulario) === 0) {
            $app = appBooxChange::getInstance();
            
            //Damos valores "Nulos" a id y fecha después se omitirán
            $libroMisterioso = new TLibroIntercambio(null, $_SESSION['id_Usuario'], $titulo, $fotoBD, $autor, $desc, $genero, NO_INTERCAMBIADO, NO_ES_OFERTA,  null);
            $result = $app->subirLibroMisterioso($libroMisterioso);

            if($result != -1){
                return "resultadoIntercambioM.php?resultado=$result";
            }
            else{//Devolver un 2 para redirigir a otra página por error inesperado??
                return array(0 => "Error");
            }
        }
        else{
            return $erroresFormulario;
        }
    }
}
