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

        if(empty($datosIniciales)){
            $datosIniciales = array("username" => "", 
                                    "userRealName"=>"",
                                    "email"=>"",
                                    "fechaNac"=>1/1/2001,
                                    "ciudad"=>"",
                                    "direccion"=>"");
            //Lo repito para cada variable
        }

        $html = '<fieldset>';
        $html .= '<legend>Login</legend>';
        $html .= '<label for="userRealName"><b>Nombre y Apellidos</b></label><br>';
        $html .= '<input type="text" placeholder="" name="userRealName" id="userRealName" value="'.$datosIniciales["userRealName"].'" /><br><br>';

        $html .= '<label for="username"><b>Nombre de Usuario</b></label><br>';
        $html .= '<input type="text" placeholder="Nick o nombre único" name="username"  id="username"  value="'.$datosIniciales["username"].'" /><br><br>';

        $html .= '<label for="foto"><b>Foto de Perfil</b></label><br>';
        $html .= '<input type="file" name="foto" id="foto" accept="image/*" /> <br><br>';

        $html .= '<label for="email"><b>Correo Electrónico</b></label><br>';
        $html .= '<input type="text" placeholder="user@mail.com" name="email" id="email"  value="'.$datosIniciales["email"].'" /><br><br>';

        $html .= '<label for="passwd"><b>Contraseña</b></label><br>';
        $html .= '<input type="password" placeholder="Escribe una contraseña..." name="passwd"  id="passwd" /><br><br>';

        $html .= '<label for="passwdR"><b>Repite Contraseña</b></label><br>';
        $html .= '<input type="password" placeholder="Repite la contraseña..." name="passwdR" id="passwdR" /><br><br>';

        $html .= '<label for="fechaNac"><b>Fecha de Nacimiento</b></label><br>';
        $html .= '<input type="date" name="fechaNac" id="fechaNac" value="'.$datosIniciales["fechaNac"].'"/><br><br>';

        $html .= '<label for="ciudad"><b>Ciudad</b></label><br>';
        $html .= '<input type="text" placeholder="Ciudad en la que resides" name="ciudad" id="ciudad" value="'.$datosIniciales["ciudad"].'" /><br><br>';

        $html .= '<label for="direccion"><b>Dirección</b></label><br>';
        $html .= '<input type="text" placeholder="Calle, Nº y piso" name="direccion" id="direccion" value="'.$datosIniciales["direccion"].'" /><br><br>';

        $html .= '<button type="submit">Registrarse</button>';
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

        $erroresFormulario = array();

        //Nombre real
        $nombreReal = isset($datos['userRealName']) ? $datos['userRealName'] : null;
        $nombreReal = make_safe($nombreReal);
        if (empty($nombreReal) || mb_strlen($nombreReal) < 5) {
            $erroresFormulario[] = "El nombre tiene que tener una longitud de al menos 5 caracteres.";
        }

        //Usuario
        $nombreUsuario = isset($datos['username']) ? $datos['username'] : null;
        $nombreUsuario = make_safe($nombreUsuario);
        if (empty($nombreUsuario) || mb_strlen($nombreUsuario) < 5) {
            $erroresFormulario[] = "El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.";
        }

        //email
        $correo = isset($datos['email']) ? $datos['email'] : null;
        $correo = make_safe($correo);
        if (empty($correo) || mb_strlen($correo) < 8) {
            $erroresFormulario[] = "El correo ha de ocupar al menos 8 caracteres.";
        }
        //Contraseña
        $password = isset($datos['passwd']) ? $datos['passwd'] : null;
        $password = make_safe($password);
        if (empty($password) || mb_strlen($password) < 5) {
            $erroresFormulario[] = "La contraseña tiene que tener una longitud de al menos 5 caracteres.";
        }

        // RepiteContra
        $passwordR = isset($datos['passwdR']) ? $datos['passwdR'] : null;
        $passwordR = make_safe($passwordR);
        if (empty($password) || strcmp($password, $passwordR) !== 0) {
            $erroresFormulario[] = "Ambas contraseñas deben ser iguales";
        }

        //Fecha Nacimiento
        $fechaNacimiento = isset($datos['fechaNac']) ? $datos['fechaNac'] : null;
        $fechaNacimiento = make_safe($fechaNacimiento);
        if (empty($fechaNacimiento) || mb_strlen($fechaNacimiento) < 5) {
            $erroresFormulario[] = "Introduzca una fecha válida.";
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

        //Estos datos se descartaran
        $fechaDeCreacion = "";
        $rol = "";


        //Subir imagen al servidor
        $fotoBD = "";
        if(isset($_FILES["foto"]) && $_FILES["foto"]["name"] != ""){
            $fotoBD =  (IMG_DIRECTORY_USER . $_FILES["foto"]["name"]);
            $fotoBD = str_replace("\\", "/", $fotoBD);

            $archivoSubida = (SERVER_DIR . $fotoBD);

            move_uploaded_file( $_FILES["foto"]['tmp_name']  , $archivoSubida);
        }else{
            $fotoBD = (IMG_DIRECTORY_LIBROS . IMG_DEFAULT_USER);
        }


        ///////////////////////////////////
        $app = appBooxChange::getInstance();

        $_SESSION[REG_PASS_EQ] = true;
        $_SESSION[REG_DATA_NO_SET] = false;

        if (count($erroresFormulario) === 0) {

            $password = password_hash($password, PASSWORD_BCRYPT);
            //El id se ignorará, se asignara automáticamente

            if ($app->registrarUsuario(
                $nombreUsuario,
                $nombreReal,
                $correo,
                $password,
                $fotoBD,
                $fechaNacimiento,
                $rol,
                $ciudad,
                $direccion,
                $fechaDeCreacion
            )) {
                //echo "Ha sido registrado correctamente";

                //Cuando se crea una cuenta, te loguea automáticamente
                $app->logInUsuario($_SESSION['id_Usuario'], $password);
                return "./index.php";
            } else {
                return "./registro.php";
            }
        }

        return $erroresFormulario;

    }
}
