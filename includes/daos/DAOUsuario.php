
<?php
$parentDir = dirname(__DIR__, 1);
include_once($parentDir . "/transfers/TUsuario.php");
include_once($parentDir . "/constants.php");
include_once(__DIR__ . "/DAO.php");

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


        $sql = "SELECT * FROM usuario WHERE Nombre='$nombreUsuario'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        //No existe el usuario, por lo cual lo introduzco en la BD
        if (mysqli_num_rows($consulta) == 0) {
            $sql = "INSERT INTO usuario (Nombre, NombreReal, Contraseña, Correo, Foto, Direccion, Nacimiento, Ciudad, FechaDeCreacion, Rol) VALUES 
                                        ('$nombreUsuario', '$nombreReal', '$password', '$correo', '$fotoPerfil', '$direccion',  '$fechaNacimiento', '$ciudad', '$fechaDeCreacion', 0);";

            mysqli_query(self::$instance->bdBooxChange, $sql);

            return true;
        } else {
            return false;
        }
    }

    function usuarioExiste($nombreUsuario)
    {
    }

    //Buscar usuarios

    public function getAllUsers()
    {
    }

    function buscarUsuarioPorId($idUsuario)
    {
    }

    function buscarUsuarioPorNombre($nombreUsuario)
    {
    }

    function buscarUsuarioPorCorreo($correoUsuario)
    {
    }


    //Actualizar Datos

    function eliminarUsuario($idUsuario, $nombreUsuario)
    {
    }

    function actualizarPassword($nuevaPassword)
    {
    }

    function actualizarFotoPerfil($nuevaFotoPerfil)
    {
    }

    function actualizarRol($nuevoRol)
    {
    }

    function actualizarCiudad($nuevaCiudad)
    {
    }

    function actualizarDireccion($nuevaDireccion)
    {
    }
}

?>