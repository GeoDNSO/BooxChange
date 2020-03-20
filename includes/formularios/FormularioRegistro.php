<?php

namespace fdi\ucm\aw\booxchange\formularios;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");



class FormularioRegistro extends Form
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
            $datosIniciales["nombreUsuario"] = "";
        }

        //$html = '<form action="procesarLogin.php" method="POST">';
        $html = '<fieldset>';
        $html .= '    <legend>Usuario y contraseña</legend>';
        $html .= '    <div class="grupo-control">';
        $html .= '        <label>Nombre de usuario:</label> <input type="text" name="nombreUsuario" value="'.$datosIniciales["nombreUsuario"].'" />';
        $html .= '    </div>';
        $html .= '    <div class="grupo-control">';
        $html .= '        <label>Password:</label> <input type="password" name="password" />';
        $html .= '    </div>';
        $html .= '    <div class="grupo-control"><button type="submit" name="login">Entrar</button></div>';
        $html .= '</fieldset>';
        $html .= '</form>';

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

        if (!isset($datos['login'])) {
            header('Location: login.php');
            exit();
        }

        $erroresFormulario = array();

        $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : null;

        if (empty($nombreUsuario)) {
            $erroresFormulario[] = "El nombre de usuario no puede estar vacío";
        }

        $password = isset($datos['password']) ? $datos['password'] : null;
        if (empty($password)) {
            $erroresFormulario[] = "El password no puede estar vacío.";
        }

        if (count($erroresFormulario) === 0) {
            $usuario = Usuario::buscaUsuario($nombreUsuario);

            if (!$usuario) {
                $erroresFormulario[] = "El usuario o el password no coinciden";
            } else {
                if ($usuario->compruebaPassword($password)) {
                    $_SESSION['login'] = true;
                    $_SESSION['nombre'] = $nombreUsuario;
                    $_SESSION['esAdmin'] = strcmp($usuario->rol(), 'admin') == 0 ? true : false;
                    //header('Location: index.php');
                    return "index.php";
                    //exit();
                } else {
                    $erroresFormulario[] = "El usuario o el password no coinciden";
                }
            }
        }
        return $erroresFormulario;
    }
}
