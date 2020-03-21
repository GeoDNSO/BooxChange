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

        $html = '<p> Nombre Real: <input type="text" name="userRealName" id= "userRealName" value="<?php echo $nombreReal; ?>"/></p>';
        $html .= '<p> Contraseña: <input type="text" name="passwd" id= "passwd" value="<?php echo $password; ?>"/></p>';
        $html .= '<p> Repite contraseña: <input type="text" name="passwdR" id= "passwdR" value="<?php echo $passwordR; ?>"/></p>';
        $html .= '<p> Correo: <input type="text" name="email" id= "email" value="<?php echo $correo; ?>"/></p>';
        $html .= '<p> Foto: <input type="text" name="foto" id= "foto" value="<?php echo $foto; ?>"/></p>';
        $html .= '<p> Ciudad: <input type="text" name="ciudad" id= "ciudad" value="<?php echo $ciudad; ?>"/></p>';
        $html .= '<p> Direccion: <input type="text" name="direccion" id= "direccion" value="<?php echo $direccion; ?>"/></p>';
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

        $correcto = true;
        if ($datos['passwdR'] != $datos['passwd']) {
            echo "Asegúrese que ambas contraseñas son iguales";
            $correcto = false;
        }
        if (!isset($datos['userRealName']) || empty($datos['userRealName'])) {
            $correcto = false;
        }
        if (!isset($datos['email']) || empty($datos['email'])) {
            $correcto = false;
        }
        if (!isset($datos['passwd']) || empty($datos['passwd'])) {
            $correcto = false;
        }
        if (!isset($datos['passwdR']) || empty($datos['passwdR'])) {
            $correcto = false;
        }
        if (!isset($datos['ciudad']) || empty($datos['ciudad'])) {
            $correcto = false;
        }
        if (!isset($datos['direccion']) || empty($datos['direccion'])) {
            $correcto = false;
        }

        if ($correcto == false) {
            return array(0 => "vacio");
        }




        $app = appBooxChange::getInstance();

        //Obtener y limpiar los datos 
        $idUsuario = $_SESSION['id_Usuario'];
        $nombreUsuario = $_SESSION['nombre'];
        $nombreReal =  $_SESSION['nombreReal_reg'];
        $correo = $_SESSION['correo_reg'];
        $password = $_SESSION['password_reg'];
        $fotoPerfil = $_SESSION['foto_reg'];
        $ciudad = $_SESSION['ciudad_reg'];
        $direccion = $_SESSION['direccion_reg'];


        $password = password_hash($password, PASSWORD_BCRYPT);

        if ($app->actualizarPerfil($idUsuario, $nombreReal, $correo, $password, $fotoPerfil, $ciudad, $direccion)) {

            return "./index.php";
        }
        else{
            return "./index.php";
        }
    }
}
