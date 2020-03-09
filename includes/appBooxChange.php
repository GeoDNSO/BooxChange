<?php

include_once("../daos/DAOUsuario.php");

class appBooxChange{

    private static $instance;
    private $bdBooxChange;

    public function __construct(){
        
    }
    
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new appBooxChange();
        }
        return self::$instance;
    }

    //Funciones que interactuen con las BD

    public function registrarUsuario($idUsuario, $nombreUsuario, $nombreReal, $correo, $password, $fotoPerfil, $fechaNacimiento, $rol, $ciudad, $direccion, $fechaDeCreacion)
    {
        $bdBooxChange = DAOUsuario::getInstance();//Abrir/Inicializar base de datos

        
        $bdBooxChange->closeBD();//Cerrar base de datos
    }

    public function logInUsuario($nombreUsuario, $password){
        $bdBooxChange = DAOUsuario::getInstance();

        if ($bdBooxChange->verificarInicioSesion($nombreUsuario, $password)){
            echo "Hola " . $nombreUsuario;
        }
        else{
            echo "Fallo en el inicio de sesión";
        }

        $bdBooxChange->closeBD();
    }


}

?>