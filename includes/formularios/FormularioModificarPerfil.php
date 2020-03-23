<?php

namespace fdi\ucm\aw\booxchange\formularios;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;


class FormularioModificarPerfil extends Form
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
        if(empty($datosIniciales)){
            $datosIniciales = array(
                                    "userRealName"=>$_SESSION['nombreReal'],
                                    "email"=>$_SESSION['correo'],
                                    "foto"=>$_SESSION['fotoPerfil'],
                                    "ciudad"=>$_SESSION['ciudad'],
                                    "direccion"=>$_SESSION['direccion']);
        }

        $html = '<p> Nombre Real: <input type="text" name="userRealName" id= "userRealName" value="'.$datosIniciales["userRealName"].'"/></p>';
        $html .= '<p> Correo: <input type="text" name="email" id= "email" value="'.$datosIniciales["email"].'"/></p>';
        $html .= '<p> Foto: <input type="text" name="foto" id= "foto" value="'.$datosIniciales["foto"].'"/></p>';
        $html .= '<p> Ciudad: <input type="text" name="ciudad" id= "ciudad" value="'.$datosIniciales["ciudad"].'"/></p>';
        $html .= '<p> Direccion: <input type="text" name="direccion" id= "direccion" value="'.$datosIniciales["direccion"].'"/></p>';
        $html .= '<p><input type="submit" name="accept" value="Cambiar" /></p>';

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

        //Nombre real
        $nombreReal = isset($datos['userRealName']) ? $datos['userRealName'] : null;
        if (empty($nombreReal) || mb_strlen($nombreReal) < 5) {
            $erroresFormulario[] = "El nombre tiene que tener una longitud de al menos 5 caracteres.";
        }
        //email
        $correo = isset($datos['email']) ? $datos['email'] : null;
        if (empty($correo) || mb_strlen($correo) < 8) {
            $erroresFormulario[] = "El correo ha de ocupar al menos 8 caracteres.";
        }
        //foto
        $fotoPerfil = isset($datos['foto']) ? $datos['foto'] : null;
        
        //Ciudad
        $ciudad = isset($datos['ciudad']) ? $datos['ciudad'] : null;
        if (empty($ciudad) || mb_strlen($ciudad) < 3) {
            $erroresFormulario[] = "Introduzca una Ciudad válida.";
        }
        //Direccion
        $direccion = isset($datos['direccion']) ? $datos['direccion'] : null;
        if (empty($direccion) || mb_strlen($direccion) < 5) {
            $erroresFormulario[] = "Introduzca una direccion válida";
        }

        $app = appBooxChange::getInstance();

        $_SESSION[REG_PASS_EQ] = true;
        $_SESSION[REG_DATA_NO_SET] = false;

        if (count($erroresFormulario) === 0) {

            if ($app->actualizarPerfil($_SESSION['nombre'], $nombreReal, $correo, $fotoPerfil, $ciudad, $direccion)) {

                return "./index.php";
            }
            else{
                return "./index.php";
            }
        }
        return $erroresFormulario;

    }
}
