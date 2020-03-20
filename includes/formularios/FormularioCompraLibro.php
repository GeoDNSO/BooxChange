<?php


namespace fdi\ucm\aw\booxchange\formularios;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;


class FormularioCompraLibro extends Form
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
        
        //$opciones = $this->getFormOptions();
        $opciones = $this->formOptions;
       
        $ud = $opciones["unidades"];

        $html = '<label for="unidades"><b>Unidades</b></label><br>';
        $html .= '<input type="number" name="unidades" id="unidades" min="1" max="'.$ud.'" value="1" /><br><br>';

        $html .= '<label for="numtarjeta"><b>Número de Tarjeta</b></label><br>';
        $html .= '<input type="text" placeholder="" name="numtarjeta" id="numtarjeta" /><br><br>';

        $html .= '<label for="clave"><b>Clave</b></label><br>';
        $html .= '<input type="password" placeholder="" name="clave" id="clave" /><br><br>';

        $html .= '<input type="submit">';

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
        $_SESSION["llega3"] = "llega3";
        if(!isset($_SESSION['nombre'])){
            $_SESSION["llega4"] = "llega4";
            exit("No se encuentra el nombre en la sesion");
        }

        $libro = unserialize($_SESSION["libroCompra"]);
        $titulo = $libro->getTitulo();

        $udAComprar = $datos["unidades"];
        $numTarjeta = $datos["numtarjeta"];

        $udA = 0;
        $ud = 0;

        $app = appBooxChange::getInstance();

        $usuario = unserialize($_SESSION["usuario"]);
        $idUsuario = $usuario->getIdUsuario();
        echo "El id del usuario es $idUsuario";
        $_SESSION["llega"] = "llega";
        if(true){
            $app->procesarCompra($idUsuario, $libro, $udAComprar, $numTarjeta);
            $_SESSION["llega2"] = "llega2";
            //header("Location: ../../index.php");
            $parentDir = dirname(__DIR__, 2);
            $path = $parentDir."/index.php";
            return  $path;
        }
        $errores = "vacio";
        return $errores;

        
    }
}
