<?php
    require_once(__DIR__ . "/includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>BooxChange</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>


<?php
    include("includes/comun/cabecera.php");

    include("./includes/comun/funcionesAdmin.php");
    
    use fdi\ucm\aw\booxchange\appBooxChange as appBooxChange;

    $app = appBooxChange::getInstance();
    $usuario = $app->getUsers();
    
    echo "<ol>";
    if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['rol'] == BD_TYPE_ADMIN){
        foreach($usuario as $us){
            $foto = $us -> getFotoPerfil();
            $id = $us -> getIdUsuario();
            $nombreReal = $us -> getNombreReal();
            $correo = $us -> getCorreo();
            $direccion = $us -> getDireccion();
            $nacimiento = $us -> getFechaNacimiento();
            $ciudad = $us -> getCiudad();
            $fechaDeCreacion = $us -> getFechaDeCreacion();
            $rol = $us -> getRol();
            
            echo "<li><ul>
            <li>Foto : <img src='$foto' alt='Imagen de Perfil' height='100' width='100'>  </li>
            <li>Nombre: $nombreReal </li>
            <li>Correo: $correo </li>
            <li>Direccion: $direccion </li>
            <li>Fecha de Nacimiento: $nacimiento </li>
            <li>Ciudad: $ciudad </li>
            <li>Fecha de Creacion: $fechaDeCreacion </li>
            <li>Rol: $rol </li>
            </ul>
            <a href='./includes/procesos/AD_procesarBorrarUsuario.php?id=$id'>Borrar Usuario</a>       
            <a href='AD_cambiarRol.php?id=$id'>Cambiar Rol</a> 
            </li>"; 
        }
    }
    else{
        echo "No tienes permisos para ver lo que hay aqui";
    }
    echo "</ol>";
?>


</html>