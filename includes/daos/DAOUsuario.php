
<?php

include_once("../transfers/TUsuario.php");
include_once("../constants.php");
include_once("DAO.php");

class DAOUsuario extends DAO{
    private static $instance;

    function __construct(){
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
    function verificarInicioSesion($usuario, $password){
        
        $sql = "SELECT * FROM usuario WHERE Nombre='$usuario' AND Contraseña='$password'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if(mysqli_num_rows($consulta) == 1){
            $fila = $consulta->fetch_array();
            
            $TUsuario = new TUsuario($fila["Id_Usuario"], $fila["Nombre"], $fila["NombreReal"], $fila["Correo"], 
                                     $fila["Contraseña"],$fila["Foto"],$fila["Nacimiento"],$fila["Rol"],
                                     $fila["Ciudad"],$fila["Direccion"],$fila["FechaDeCreacion"]);
            return $TUsuario;
        }
        return null;
    }

    

    function registrarUsuario($nombreUsuario, $nombreReal, $correo, $password, $fotoPerfil, $fechaNacimiento, $rol, $ciudad, $direccion, $fechaDeCreacion){


        $sql = "SELECT * FROM usuario WHERE Nombre='$nombreUsuario'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        //No existe el usuario, por lo cual lo introduzco en la BD
        if(mysqli_num_rows($consulta) == 0){
            $sql = "INSERT INTO usuario (Id_Usuario, Nombre, NombreReal, Contraseña, Correo, Foto, Direccion, Nacimiento, Ciudad, FechaDeCreacion, Rol) VALUES 
                                        (NULL, '$nombreUsuario', '$nombreReal', '$password', '$correo', '$fotoPerfil', '$direccion',  '$fechaNacimiento', '$ciudad', '$fechaDeCreacion', $rol);"; 

            mysqli_query(self::$instance->bdBooxChange, $sql);

            return true;
        }
        else{
            return false;
        }
    }

    function usuarioExiste($nombreUsuario){


    }

    //Buscar usuarios

    public function getAllUsers(){
        
    }

    function buscarUsuarioPorId($idUsuario){

    }

    function buscarUsuarioPorNombre($nombreUsuario){
        
    }

    function buscarUsuarioPorCorreo($correoUsuario){
        
    }


    //Actualizar Datos

    function eliminarUsuario($idUsuario, $nombreUsuario){

    }

    function actualizarPassword($nuevaPassword){

    }

    function actualizarFotoPerfil($nuevaFotoPerfil){

    }

    function actualizarRol($nuevoRol){

    }
    
    function actualizarCiudad($nuevaCiudad){

    }

    function actualizarDireccion($nuevaDireccion){

    }

}

?>