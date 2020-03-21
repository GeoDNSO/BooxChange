<?php

namespace fdi\ucm\aw\booxchange\formularios;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir . "/config.php");

use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

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
        $html = '<fieldset>';
        $html .= '<legend>Login</legend>';
        $html .= '<form>';
        $html .= '<label for="userRealName"><b>Nombre y Apellidos</b></label><br>';
        $html .= '<input type="text" placeholder="" name="userRealName" id="userRealName" value="<?php echo $nombreReal; ?>" /><br><br>';

        $html .= '<label for="username"><b>Nombre de Usuario</b></label><br>';
        $html .= '<input type="text" placeholder="Nick o nombre único" name="username"  id="username"  value="<?php echo $nombreUsuario; ?>" /><br><br>';

        $html .= '<label for="foto"><b>Foto de Perfil</b></label><br>';
        $html .= '<input type="text" placeholder="Foto, por ahora no funcional" name="foto"  id="foto" /><br><br>';

        $html .= '<label for="email"><b>Correo Electrónico</b></label><br>';
        $html .= '<input type="text" placeholder="user@mail.com" name="email" id="email"  value="<?php echo $correo; ?>" /><br><br>';

        $html .= '<label for="passwd"><b>Contraseña</b></label><br>';
        $html .= '<input type="password" placeholder="Escribe una contraseña..." name="passwd"  id="passwd" /><br><br>';

        $html .= '<label for="passwdR"><b>Repite Contraseña</b></label><br>';
        $html .= '<input type="password" placeholder="Repite la contraseña..." name="passwdR" id="passwdR" /><br><br>';

        $html .= '<label for="fechaNac"><b>Fecha de Nacimiento</b></label><br>';
        $html .= '<input type="date" name="fechaNac" id="fechaNac" value="<?php echo $fechaNacimiento; ?>"/><br><br>';

        $html .= '<label for="ciudad"><b>Ciudad</b></label><br>';
        $html .= '<input type="text" placeholder="Ciudad en la que resides" name="ciudad" id="ciudad" value="<?php echo $ciudad; ?>" /><br><br>';

        $html .= '<label for="direccion"><b>Dirección</b></label><br>';
        $html .= '<input type="text" placeholder="Calle, Nº y piso" name="direccion" id="direccion" value="<?php echo $direccion; ?>" /><br><br>';

        $html .= '<button type="submit">Registrarse</button>';
        $html .= '</form>';
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


        $correcto = true;
        if (!isset($datos['username']) || empty($datos['username'])) {
            echo " -Nombre de usuario/nick <br>";
            $correcto = false;
        }
        if (!isset($datos['userRealName']) || empty($datos['userRealName'])) {
            echo " -Nombre real <br>";
            $correcto = false;
        }
        if (!isset($datos['email']) || empty($datos['email'])) {
            echo " -Correo <br>";
            $correcto = false;
        }
        if (!isset($datos['passwd']) || empty($datos['passwd'])) {
            echo " -Contraseña <br>";
            $correcto = false;
        }
        if (!isset($datos['passwdR']) || empty($datos['passwdR'])) {
            echo " -Repita la contraseña <br>";
            $correcto = false;
        }
        if (!isset($datos['fechaNac']) || empty($datos['fechaNac'])) {
            echo " -Fecha de nacimiento <br>";
            $correcto = false;
        }
        if (!isset($datos['ciudad']) || empty($datos['ciudad'])) {
            echo " -Ciudad <br>";
            $correcto = false;
        }
        if (!isset($datos['direccion']) || empty($datos['direccion'])) {
            echo " -Dirección <br>";
            $correcto = false;
        }
        if ($correcto == false) {
            return array("error1" => "por hacer");
        }


        ///////////////////////////////////
        $app = appBooxChange::getInstance();

        $_SESSION[REG_PASS_EQ] = true;
        $_SESSION[REG_DATA_NO_SET] = false;

        //Id se puede dejar nulo

        //Obtener y limpiar los datos 
        $nombreUsuario = $_SESSION['nombreUsuario_reg'];
        $nombreReal =  $_SESSION['nombreReal_reg'];
        $correo = $_SESSION['correo_reg'];
        $password = $_SESSION['password_reg'];
        $fotoPerfil = $_SESSION['foto_reg'];
        $fechaNacimiento = $_SESSION['fechaNacimiento_reg'];
        $ciudad = $_SESSION['ciudad_reg'];
        $direccion = $_SESSION['direccion_reg'];
        $rol = BD_TYPE_NORMAL_USER; //Usuario normal por defecto

        date_default_timezone_set("Europe/Madrid");
        $fechaDeCreacion = date_default_timezone_get(); //REVIsAR FORMATO PARA LA BASE DE DATOS??


        if (!$_SESSION[REG_DATA_NO_SET] && $_SESSION[REG_PASS_EQ]) {

            $password = password_hash($password, PASSWORD_BCRYPT);
            //El id se ignorará, se asignara automáticamente

            if ($app->registrarUsuario(
                $nombreUsuario,
                $nombreReal,
                $correo,
                $password,
                $fotoPerfil,
                $fechaNacimiento,
                $rol,
                $ciudad,
                $direccion,
                $fechaDeCreacion
            )) {
                //echo "Ha sido registrado correctamente";

                //Cuando se crea una cuenta, te loguea automáticamente
                $app->logInUsuario($nombreUsuario, $password);
                return "./index.php";
            } else {
                return "./registro.php";
            }
        }
    }
}
