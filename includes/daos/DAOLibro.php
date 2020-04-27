<?php
namespace fdi\ucm\aw\booxchange\daos;


$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\transfers\TLibro as TLibro;

class DAOLibro extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOLibro();
        }
        return self::$instance;
    }

    public function librosTienda()
    {

        $sql = "SELECT * FROM libro WHERE libro.EnTienda = 1";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        $librosTienda = array();

        while ($fila = mysqli_fetch_array($consulta)) {
            $librosTienda[] = new TLibro(
                $fila[BD_LIBRO_ID_LIBRO],
                $fila[BD_LIBRO_TITULO],
                $fila[BD_LIBRO_AUTOR],
                $fila[BD_LIBRO_PRECIO],
                $fila[BD_LIBRO_VALORACION],
                $fila[BD_LIBRO_RANKING],
                $fila[BD_LIBRO_IMAGEN],
                $fila[BD_LIBRO_DESCRIPCIÓN],
                $fila[BD_LIBRO_GENERO],
                $fila[BD_LIBRO_EN_TIENDA],
                $fila[BD_LIBRO_FECHA],
                $fila[BD_LIBRO_IDIOMA],
                $fila[BD_LIBRO_EDITORIAL],
                $fila[BD_LIBRO_DESCUENTO],
                $fila[BD_LIBRO_UNIDADES],
                $fila[BD_LIBRO_FECHA_PUBLICACION]
            );
        }
        return $librosTienda;
    }

    public function getAllBooks(){
        $sql = "SELECT * FROM libro";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        $librosTienda = array();

        while ($fila = mysqli_fetch_array($consulta)) {
            $librosTienda[] = new TLibro(
                $fila[BD_LIBRO_ID_LIBRO],
                $fila[BD_LIBRO_TITULO],
                $fila[BD_LIBRO_AUTOR],
                $fila[BD_LIBRO_PRECIO],
                $fila[BD_LIBRO_VALORACION],
                $fila[BD_LIBRO_RANKING],
                $fila[BD_LIBRO_IMAGEN],
                $fila[BD_LIBRO_DESCRIPCIÓN],
                $fila[BD_LIBRO_GENERO],
                $fila[BD_LIBRO_EN_TIENDA],
                $fila[BD_LIBRO_FECHA],
                $fila[BD_LIBRO_IDIOMA],
                $fila[BD_LIBRO_EDITORIAL],
                $fila[BD_LIBRO_DESCUENTO],
                $fila[BD_LIBRO_UNIDADES],
                $fila[BD_LIBRO_FECHA_PUBLICACION]
            );
        }
        return $librosTienda;
    }

    public function getTwoBooks(){
        $sql = "SELECT * FROM libro ORDER BY libro.valoracion";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        $librosTienda = array();
        $count = 0;
        while ($fila = mysqli_fetch_array($consulta) && $count < 2) {
            $librosTienda[] = new TLibro(
                $fila[BD_LIBRO_ID_LIBRO],
                $fila[BD_LIBRO_TITULO],
                $fila[BD_LIBRO_AUTOR],
                $fila[BD_LIBRO_PRECIO],
                $fila[BD_LIBRO_VALORACION],
                $fila[BD_LIBRO_RANKING],
                $fila[BD_LIBRO_IMAGEN],
                $fila[BD_LIBRO_DESCRIPCIÓN],
                $fila[BD_LIBRO_GENERO],
                $fila[BD_LIBRO_EN_TIENDA],
                $fila[BD_LIBRO_FECHA],
                $fila[BD_LIBRO_IDIOMA],
                $fila[BD_LIBRO_EDITORIAL],
                $fila[BD_LIBRO_DESCUENTO],
                $fila[BD_LIBRO_UNIDADES],
                $fila[BD_LIBRO_FECHA_PUBLICACION]
            );
        }
        return $librosTienda;
    }


    public function findBookTitulo($libro){
        $sql = "SELECT * FROM libro WHERE libro.Titulo LIKE CONCAT('%', '$libro', '%')";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        $librosTienda = array();

        while ($fila = mysqli_fetch_array($consulta)) {
            $librosTienda[] = new TLibro(
                $fila[BD_LIBRO_ID_LIBRO],
                $fila[BD_LIBRO_TITULO],
                $fila[BD_LIBRO_AUTOR],
                $fila[BD_LIBRO_PRECIO],
                $fila[BD_LIBRO_VALORACION],
                $fila[BD_LIBRO_RANKING],
                $fila[BD_LIBRO_IMAGEN],
                $fila[BD_LIBRO_DESCRIPCIÓN],
                $fila[BD_LIBRO_GENERO],
                $fila[BD_LIBRO_EN_TIENDA],
                $fila[BD_LIBRO_FECHA],
                $fila[BD_LIBRO_IDIOMA],
                $fila[BD_LIBRO_EDITORIAL],
                $fila[BD_LIBRO_DESCUENTO],
                $fila[BD_LIBRO_UNIDADES],
                $fila[BD_LIBRO_FECHA_PUBLICACION]
            );
        }
        return $librosTienda;
    }



    public function getLibroById($id)
    {
        $sql = "SELECT * FROM libro WHERE libro.Id_Libro = $id";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $fila = $consulta->fetch_array();
            $libro = new TLibro(
                $fila[BD_LIBRO_ID_LIBRO],
                $fila[BD_LIBRO_TITULO],
                $fila[BD_LIBRO_AUTOR],
                $fila[BD_LIBRO_PRECIO],
                $fila[BD_LIBRO_VALORACION],
                $fila[BD_LIBRO_RANKING],
                $fila[BD_LIBRO_IMAGEN],
                $fila[BD_LIBRO_DESCRIPCIÓN],
                $fila[BD_LIBRO_GENERO],
                $fila[BD_LIBRO_EN_TIENDA],
                $fila[BD_LIBRO_FECHA],
                $fila[BD_LIBRO_IDIOMA],
                $fila[BD_LIBRO_EDITORIAL],
                $fila[BD_LIBRO_DESCUENTO],
                $fila[BD_LIBRO_UNIDADES],
                $fila[BD_LIBRO_FECHA_PUBLICACION]
            );
            return $libro;
        }

        return null;
    }

    public function procesarCompra($libro, $ud){
        $id = $libro->getIdLibro();
        $sql = "UPDATE libro SET unidades = unidades - $ud WHERE Id_Libro=$id";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);
        return $consulta;
    }

    public function subirLibro($titulolibro ,$autor, $precio, $imagen, $descripcion, $genero, $enTienda, $idioma, $editorial, $descuento, $unidades, $fechaDePublicacion){
        $sql = "SELECT * FROM libro WHERE Titulo='$titulolibro'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 0) {
            $sql = "INSERT INTO libro (Titulo, Autor, Precio, Imagen, Descripcion, Genero, EnTienda, Fecha, Idioma, Editorial, Descuento, Unidades, FechaPublicacion) VALUES 
                                        ('$titulolibro', '$autor', '$precio', '$imagen',  '$descripcion', '$genero', '$enTienda', current_timestamp(), '$idioma', '$editorial', '$descuento', '$unidades', '$fechaDePublicacion')";

            mysqli_query(self::$instance->bdBooxChange, $sql);

            return true;
        } else {
            return false;
        }
    }

    public function modificarLibro($idLibro, $titulolibro ,$autor, $precio, $imagen, $descripcion, $genero, $enTienda, $idioma, $editorial, $descuento, $unidades, $fechaDePublicacion) {
        $sql = "SELECT * FROM libro WHERE Id_Libro='$idLibro'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $sql = "UPDATE libro
            SET Titulo = '$titulolibro', Autor = '$autor', Precio = '$precio', Imagen = '$imagen', Descripcion = '$descripcion',
            Genero = '$genero', EnTienda = '$enTienda', Idioma = '$idioma', Editorial = '$editorial',
            Descuento = '$descuento', Unidades = '$unidades', FechaPublicacion = '$fechaDePublicacion'
            WHERE Id_Libro = $idLibro";
            mysqli_query(self::$instance->bdBooxChange, $sql);
            return true;
        } else {
            return false;
        }
    }

    public function borrarLibro($idLibro) {
        $sql = "SELECT * FROM libro WHERE Id_Libro='$idLibro'";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        if (mysqli_num_rows($consulta) == 1) {
            $sql = "DELETE FROM libro
            WHERE Id_Libro = $idLibro";
            mysqli_query(self::$instance->bdBooxChange, $sql);
            return true;
        } else {
            return false;
        }
    }

    public function librosValoracion()
    {

        $sql = "SELECT * FROM libro WHERE libro.EnTienda = 1 ORDER BY libro.valoracion DESC";
        $consulta = mysqli_query(self::$instance->bdBooxChange, $sql);

        $librosValoracion = array();

        while ($fila = mysqli_fetch_array($consulta)) {
            $librosValoracion[] = new TLibro(
                $fila[BD_LIBRO_ID_LIBRO],
                $fila[BD_LIBRO_TITULO],
                $fila[BD_LIBRO_AUTOR],
                $fila[BD_LIBRO_PRECIO],
                $fila[BD_LIBRO_VALORACION],
                $fila[BD_LIBRO_RANKING],
                $fila[BD_LIBRO_IMAGEN],
                $fila[BD_LIBRO_DESCRIPCIÓN],
                $fila[BD_LIBRO_GENERO],
                $fila[BD_LIBRO_EN_TIENDA],
                $fila[BD_LIBRO_FECHA],
                $fila[BD_LIBRO_IDIOMA],
                $fila[BD_LIBRO_EDITORIAL],
                $fila[BD_LIBRO_DESCUENTO],
                $fila[BD_LIBRO_UNIDADES],
                $fila[BD_LIBRO_FECHA_PUBLICACION]
            );
        }
        return $librosValoracion;
    }

    public function lastInsertedId(){
        return $this->bdBooxChange->insert_id;
    }

}

?>