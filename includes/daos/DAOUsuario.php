
<?php

include_once("../transfers/TUsuario.php");
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
  

    function verificarInicioSesion($usuario, $password){
        
        $sql = "SELECT * FROM usuario WHERE Nombre='$usuario' AND Contraseña='$password'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if(mysqli_num_rows($consulta) == 1){
            return 1;
        }
        else{
            return 0;
        }
    }

    function registrarUsuario($idUsuario, $nombreUsuario, $nombreReal, $correo, $password, $fotoPerfil, $fechaNacimiento, $rol, $ciudad, $direccion, $fechaDeCreacion){
       
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
    
    function actualizarCiudad(){

    }

    function actualizarDireccion(){

    }

}

?>