<?php

namespace fdi\ucm\aw\booxchange\formularios;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");


use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;
use fdi\ucm\aw\booxchange\transfers\TLibroIntercambio;

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
        $app = appBooxChange::getInstance();

        $html = '<div class="fields">';
        $html .= '<label for="titulo"><b>Titulo</b></label><br>';
        $html .= '<input class="line" type="text" placeholder="Titulo a intercambiar" name="titulo" id="titulo" value="" /><br>';

        $html .= '<label for="autor"><b>Autor</b></label>';
        $html .= '<input class="line" type="text" placeholder="Autor del libro" name="autor"  id="autor"  value="" /><br>';

        $html .= '<label for="descripcion"><b>Descripcion</b></label><br>';
        $html .= '<textarea class="line" id="descripcion" name="descripcion" rows="5" cols="50" placeholder="Escribe aquí algo interesante que pueda hacer que tu libro sea más atractivo a otros usuarios e indica que tipo de libro buscas..."></textarea> <br>';
        

        $html .= '    <label for="genero"><b>Género</b></label><br>';
        //Seleccion de Generos
        $html .= '    <select class id="genero" name="genero"><br><br>';
        $html .= $app->construirSeleccionDeCategorias();
        $html .= '    </select><br><br>';

        $html .= '<label for="fotoLibro"><b>Foto del Libro</b></label><br>';
        //$html .= '<input type="text" placeholder="" name="fotoLibro" id="fotoLibro" value="" /><br><br>';
        $html .= '<input type="file" name="fotoLibro" id="fotoLibro" accept="image/*"/> <br><br>';


       
        $html .= '    <button class="send-button">Subir Libro para Intercambiar</button>';
        




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

        //$fotoLibro = $datos["fotoLibro"];
        //$fotoLibro = make_safe($fotoLibro);
        /* 
        No es obligatorio poner la foto de un libro pues no está implementado aún
        $fotoLibro = isset($datos['fotoLibro']) ? $datos['fotoLibro'] : null;
        if (empty($fotoLibro) || mb_strlen($fotoLibro) < 5) {
            $erroresFormulario[] = "Ha de introducir una foto (No implementado)";
        }
        */
        //Subir imagen al servidor
        $fotoBD = "";
        if (isset($_FILES["fotoLibro"]) && $_FILES["fotoLibro"]["name"] != "") {
            $fotoBD =  (IMG_DIRECTORY_LIBROS_INTERCAMBIO . $_FILES["fotoLibro"]["name"]);
            $fotoBD = str_replace("\\", "/", $fotoBD);

            $archivoSubida = (SERVER_DIR . $fotoBD);

            move_uploaded_file($_FILES["fotoLibro"]['tmp_name'], $archivoSubida);
        } else {
            $fotoBD = (IMG_DIRECTORY_LIBROS_INTERCAMBIO . IMG_DEFAULT_LIBRO);
        }


        $autor = isset($datos['autor']) ? $datos['autor'] : null;
        $autor = make_safe($autor);
        if (empty($autor) || mb_strlen($autor) < 4) {
            $erroresFormulario[] = "Introduzca el nombre del autor, 4 caracteres mínimo";
        }

        $genero = $datos["genero"];
        $genero = make_safe($genero);
        /* 
        Siempre hay un género por defecto
        $genero = isset($datos['genero']) ? $datos['genero'] : null;
        if (empty($genero) || mb_strlen($genero) < 2) {
            $erroresFormulario[] = "Especifique un género";
        }
        */

        $desc = isset($datos['descripcion']) ? $datos['descripcion'] : null;
        $desc = make_safe($desc);
        if (empty($desc) || mb_strlen($desc) < 10) {
            $erroresFormulario[] = "Especifique la descripción u argumento del libro, mínimo 10 caracteres";
        }

        if (count($erroresFormulario) === 0) {
            $app = appBooxChange::getInstance();

            //Damos valores "Nulos" a id y fecha después se omitirán
            $libro = new TLibroIntercambio(null, $_SESSION['id_Usuario'], $titulo, $fotoBD, $autor, $desc, $genero, NO_INTERCAMBIADO, NO_ES_OFERTA,  null);

            $result = $app->subirLibroIntercambio($libro);

            if ($result == true) {
                return "./intercambiosNormales.php";
            } else {
                exit("Error inesperado, no se ha podido subir el libro a la BD");
            }
        } else {
            return $erroresFormulario;
        }
    }
}
