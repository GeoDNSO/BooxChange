
<?php

include_once("../transfers/TUsuario.php");
include_once("./DAO.php");

class DAOUsuario extends DAO{

    function __construct(){
        parent::__construct();
    }
  

    function verificarInicioSesion($usuario, $password){
        
    }

    function registrarUsuario($idUsuario, $nombreUsuario, $correo, $password, $fotoPerfil, $fechaNacimiento, $rol, $ciudad, $direccion, $fechaDeCreacion){

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