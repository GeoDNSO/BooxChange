<?php

namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

$parentDir = dirname(__DIR__, 1);
//include_once($parentDir . "/transfers/TUsuario.php");
//include_once($parentDir . "/constants.php");
//include_once(__DIR__ . "/DAO.php");

use fdi\ucm\aw\booxchange\transfers\TUsuario as TUsuario;

class DAOUsuario extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOUsuario();
        }
        return self::$instance;
    }

    //Si se puede iniciar sesión, se guarda un objeto usuario con sus datos
    function verificarInicioSesion($usuario, $password)
    {

        $usuario = self::$instance->bdBooxChange->real_escape_string($usuario);
        $password = self::$instance->bdBooxChange->real_escape_string($password);

        $sql = "SELECT * FROM usuario WHERE Nombre='$usuario'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();

            //Comprobamos los hashes
            if (password_verify($password, $fila[BD_USER_PASSWORD])) {
                $TUsuario = new TUsuario(
                    $fila[BD_USER_ID_USUARIO],
                    $fila[BD_USER_NOMBRE],
                    $fila[BD_USER_NOMBRE_REAL],
                    $fila[BD_USER_CORREO],
                    $fila[BD_USER_PASSWORD],
                    $fila[BD_USER_FOTO],
                    $fila[BD_USER_NACIMIENTO],
                    $fila[BD_USER_ROL],
                    $fila[BD_USER_CIUDAD],
                    $fila[BD_USER_DIRECCION],
                    $fila[BD_USER_FECHA_CREACION]
                );
                return $TUsuario;
            } else {
                return null;
            }
        }
        return null;
    }



    function registrarUsuario($nombreUsuario, $nombreReal, $correo, $password, $fotoPerfil, $fechaNacimiento, $rol, $ciudad, $direccion, $fechaDeCreacion)
    {


        $nombreUsuario = self::$instance->bdBooxChange->real_escape_string($nombreUsuario);
        $nombreReal = self::$instance->bdBooxChange->real_escape_string($nombreReal);
        $correo = self::$instance->bdBooxChange->real_escape_string($correo);
        $password = self::$instance->bdBooxChange->real_escape_string($password);
        $fotoPerfil = self::$instance->bdBooxChange->real_escape_string($fotoPerfil);
        $ciudad = self::$instance->bdBooxChange->real_escape_string($ciudad);
        $direccion = self::$instance->bdBooxChange->real_escape_string($direccion);

        $sql = "SELECT * FROM usuario WHERE Nombre='$nombreUsuario'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        //No existe el usuario, por lo cual lo introduzco en la BD
        if (mysqli_num_rows($consulta) == 0) {
            $rol = BD_TYPE_NORMAL_USER;
            $sql = "INSERT INTO usuario (Nombre, NombreReal, Contraseña, Correo, Foto, Direccion, Nacimiento, Ciudad, FechaDeCreacion, Rol) VALUES 
                                        ('$nombreUsuario', '$nombreReal', '$password', '$correo', '$fotoPerfil', '$direccion',  '$fechaNacimiento', '$ciudad', current_timestamp(), $rol);";

            mysqli_query(self::$instance->bdBooxChange, $sql);

            return true;
        } else {
            return false;
        }
    }

    function usuarioExiste($nombreUsuario)
    {
        $sql = "SELECT * FROM usuario WHERE usuario.Nombre = '$nombreUsuario'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        if (mysqli_num_rows($consulta) == 1) { return true;}
        return false;
    }

    //Buscar usuarios

    public function getAllUsers()
    {
        $array = array();
        $sql = "SELECT * FROM usuario";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        while( $fila = $consulta->fetch_array()){
            $TUsuario = new TUsuario(
                $fila[BD_USER_ID_USUARIO],
                $fila[BD_USER_NOMBRE],
                $fila[BD_USER_NOMBRE_REAL],
                $fila[BD_USER_CORREO],
                $fila[BD_USER_PASSWORD],
                $fila[BD_USER_FOTO],
                $fila[BD_USER_NACIMIENTO],
                $fila[BD_USER_ROL],
                $fila[BD_USER_CIUDAD],
                $fila[BD_USER_DIRECCION],
                $fila[BD_USER_FECHA_CREACION]
            );
            $array[] = $TUsuario;
        }
                
        return $array;
    }

    public function getUserById($idUsuario){
        $sql = "SELECT * FROM usuario WHERE usuario.Id_Usuario = '$idUsuario'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();
            $usuario = new TUsuario(
                $fila[BD_USER_ID_USUARIO],
                $fila[BD_USER_NOMBRE],
                $fila[BD_USER_NOMBRE_REAL],
                $fila[BD_USER_CORREO],
                $fila[BD_USER_PASSWORD],
                $fila[BD_USER_FOTO],
                $fila[BD_USER_NACIMIENTO],
                $fila[BD_USER_ROL],
                $fila[BD_USER_CIUDAD],
                $fila[BD_USER_DIRECCION],
                $fila[BD_USER_FECHA_CREACION]
            );
            return $usuario;
        }
                
        return null;
    }

    function buscarUsuarioPorId($idUsuario)
    {
        $sql = "SELECT * FROM usuario WHERE Id_Usuario='$idUsuario'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();
            $TUsuario = new TUsuario(
                $fila[BD_USER_ID_USUARIO],
                $fila[BD_USER_NOMBRE],
                $fila[BD_USER_NOMBRE_REAL],
                $fila[BD_USER_CORREO],
                $fila[BD_USER_PASSWORD],
                $fila[BD_USER_FOTO],
                $fila[BD_USER_NACIMIENTO],
                $fila[BD_USER_ROL],
                $fila[BD_USER_CIUDAD],
                $fila[BD_USER_DIRECCION],
                $fila[BD_USER_FECHA_CREACION]
            );
           
            return $TUsuario;
        }
        return null;
    }

    function buscarUsuarioPorNombre($nombreUsuario)
    {
    }

    function buscarUsuarioPorCorreo($correoUsuario)
    {
    }

    function checkEmail($email){
        $sql = "SELECT * FROM usuario WHERE Id_Usuario='$email'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) > 0) {
            return true;
        }
        return false;
    }

    //Actualizar Datos

    public function borrarUsuario($idUsuario) {
        $sql = "SELECT * FROM usuario WHERE Id_Usuario='$idUsuario'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $sql = "DELETE FROM usuario
            WHERE Id_Usuario= $idUsuario";
            mysqli_query(self::$instance->bdBooxChange, $sql);
            return true;
        } else {
            return false;
        }
    }

    function actualizarPerfil($nombreUsuario, $nombreReal, $correo, $fotoPerfil, $ciudad, $direccion)
    {
        
        $nombreUsuario = self::$instance->bdBooxChange->real_escape_string($nombreUsuario);
        $nombreReal = self::$instance->bdBooxChange->real_escape_string($nombreReal);
        $correo = self::$instance->bdBooxChange->real_escape_string($correo);
        //$password = self::$instance->bdBooxChange->real_escape_string($password);
        $fotoPerfil = self::$instance->bdBooxChange->real_escape_string($fotoPerfil);
        $ciudad = self::$instance->bdBooxChange->real_escape_string($ciudad);
        $direccion = self::$instance->bdBooxChange->real_escape_string($direccion);

        $sql = "SELECT * FROM usuario WHERE Nombre='$nombreUsuario'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $sql = "UPDATE usuario
            SET NombreReal = '$nombreReal' , Correo = '$correo', Foto = '$fotoPerfil', Ciudad = '$ciudad', Direccion = '$direccion'
            WHERE Nombre = '$nombreUsuario'"; 
            mysqli_query(self::$instance->bdBooxChange, $sql);
            return true;
        }
        else{ 
            return false;
        }
    }

    function actualizarRol($idUsuario, $rol){
        $sql = "SELECT * FROM usuario WHERE Id_Usuario='$idUsuario'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $sql = "UPDATE usuario
            SET Rol= '$rol'
            WHERE Id_Usuario = $idUsuario"; 
            mysqli_query(self::$instance->bdBooxChange, $sql);
            return true;
        }
        else{ 
            return false;
        }
    }
}

?>