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

        
         

        $html= "<div class='modifPerfil'>";
        $html .= "<p class=tituloMod>Modificar perfil</p>";

        $html .= '<p>Nombre real: <input type="text" class="inputDatos" name="userRealName" id="userRealName" value="'.$datosIniciales["userRealName"].'"/></p>';
        /* Prevalidacion */
        $html .= '<img id="siNombre" class="modificar" src="imagenes/si.png"/>';
        $html .= '<img id="noNombre" class="modificar"class="modificar" src="imagenes/no.png"/><br>';

        $html .= '<p> Correo: <input type="text" class="inputDatos" name="email" id= "email" value="'.$datosIniciales["email"].'"/></p>';
        /* Prevalidacion */
        $html .= '<img id="siMail" class="modificar" src="imagenes/si.png"/>';
        $html .= '<img id="noMail" class="modificar" src="imagenes/no.png"/><br>';

        $html .= '<p> Ciudad: <input type="text" class="inputDatos" name="ciudad" id= "ciudad" value="'.$datosIniciales["ciudad"].'"/></p>';
        /* Prevalidacion */
        $html .= '<img id="siCiudad" class="modificar" src="imagenes/si.png"/>';
        $html .= '<img id="noCiudad" class="modificar" src="imagenes/no.png"/><br>';

        $html .= '<p> Direccion: <input type="text" class="inputDatos" name="direccion" id= "direccion" value="'.$datosIniciales["direccion"].'"/></p>';
        /* Prevalidacion */
        $html .= '<img id="siDir" class="modificar" rc="imagenes/si.png"/>';
        $html .= '<img id="noDir" class="modificar" src="imagenes/no.png"/><br>';

        $fotoInicial = isset($datosIniciales['foto']) ? $datosIniciales['foto'] : null;
        $html .= '<p class=fotoMod> Foto: &nbsp <input type="file" name="foto" id="foto" accept="image/*" value="'.$fotoInicial.'"/></p>';  

        
        $html .= '<p><input type="submit" class="send-button noEnorme" name="accept" value="Cambiar" onclick="setTimeout(timer, 1500)"/></p>';
        $html .= '<p><input type="reset" class="send-button noEnorme undo-button" value="Deshacer cambios"></p>';

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
        $erroresFormulario = array();

        //Nombre real
        $nombreReal = isset($datos['userRealName']) ? $datos['userRealName'] : null;
        $nombreReal = make_safe($nombreReal);
        if (empty($nombreReal) || mb_strlen($nombreReal) < 5) {
            $erroresFormulario[] = "El nombre tiene que tener una longitud de al menos 5 caracteres.";
        }
        //email
        $correo = isset($datos['email']) ? $datos['email'] : null;
        $correo = make_safe($correo);
        if (empty($correo) || mb_strlen($correo) < 8) {
            $erroresFormulario[] = "El correo ha de ocupar al menos 8 caracteres.";
        }
        //foto
        $fotoPerfil = isset($datos['foto']) ? $datos['foto'] : null;
        $fotoPerfil = make_safe($fotoPerfil);

        
        
        //Subir imagen al servidor
        $fotoBD = "";
        if(isset($_FILES["foto"]) && $_FILES["foto"]["name"] != ""){
            $fotoBD =  (IMG_DIRECTORY_USER . $_FILES["foto"]["name"]);
            $fotoBD = str_replace("\\", "/", $fotoBD);

            $archivoSubida = (SERVER_DIR . $fotoBD);

            move_uploaded_file( $_FILES["foto"]['tmp_name']  , $archivoSubida);

        }else{
            $fotoBD = $_SESSION['fotoPerfil'];
        }
        

        //Ciudad
        $ciudad = isset($datos['ciudad']) ? $datos['ciudad'] : null;
        $ciudad = make_safe($ciudad);
        if (empty($ciudad) || mb_strlen($ciudad) < 3) {
            $erroresFormulario[] = "Introduzca una Ciudad válida.";
        }
        //Direccion
        $direccion = isset($datos['direccion']) ? $datos['direccion'] : null;
        $direccion = make_safe($direccion);
        if (empty($direccion) || mb_strlen($direccion) < 5) {
            $erroresFormulario[] = "Introduzca una direccion válida";
        }

        $app = appBooxChange::getInstance();

        $_SESSION[REG_PASS_EQ] = true;
        $_SESSION[REG_DATA_NO_SET] = false;

        if (count($erroresFormulario) === 0) {

            if ($app->actualizarPerfil($_SESSION['nombre'], $nombreReal, $correo, $fotoBD, $ciudad, $direccion)) {

                return "./index.php";
            }
            else{
                return "./index.php";
            }
        }
        return $erroresFormulario;

    }
}
