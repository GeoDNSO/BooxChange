<?php

class TLibro{

    private $idLibro;
    private $titulo;
    private $autor;
    private $precio;
    private $valoracion;
    private $ranking;
    private $imagen;
    private $descripcion;
    private $genero;
    private $enTienda;
    private $fecha;
    private $idioma;
    private $editorial;
    private $descuento;
    private $unidades;

    function __construct($idLibro, $titulo, $autor, $precio, $valoracion, $ranking, $imagen, $descripcion, $genero, $enTienda, $fecha, $idioma, $editorial, $descuento, $unidades){
        $this->idLibro = $idLibro;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->precio = $precio;
        $this->valoracion = $valoracion;
        $this->ranking = $ranking;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
        $this->genero = $genero;
        $this->enTienda = $enTienda;
        $this->fecha = $fecha;
        $this->idioma = $idioma;
        $this->editorial = $editorial;
        $this->descuento = $descuento;
        $this->unidades = $unidades;
    }

    /**
     * Get the value of idLibro
     */ 
    public function getIdLibro()
    {
        return $this->idLibro;
    }

    /**
     * Set the value of idLibro
     *
     * @return  self
     */ 
    public function setIdLibro($idLibro)
    {
        $this->idLibro = $idLibro;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of autor
     */ 
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */ 
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of valoracion
     */ 
    public function getValoracion()
    {
        return $this->valoracion;
    }

    /**
     * Set the value of valoracion
     *
     * @return  self
     */ 
    public function setValoracion($valoracion)
    {
        $this->valoracion = $valoracion;

        return $this;
    }

    /**
     * Get the value of ranking
     */ 
    public function getRanking()
    {
        return $this->ranking;
    }

    /**
     * Set the value of ranking
     *
     * @return  self
     */ 
    public function setRanking($ranking)
    {
        $this->ranking = $ranking;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */ 
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of enTienda
     */ 
    public function getEnTienda()
    {
        return $this->enTienda;
    }

    /**
     * Set the value of enTienda
     *
     * @return  self
     */ 
    public function setEnTienda($enTienda)
    {
        $this->enTienda = $enTienda;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of idioma
     */ 
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set the value of idioma
     *
     * @return  self
     */ 
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get the value of editorial
     */ 
    public function getEditorial()
    {
        return $this->editorial;
    }

    /**
     * Set the value of editorial
     *
     * @return  self
     */ 
    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;

        return $this;
    }

    /**
     * Get the value of descuento
     */ 
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set the value of descuento
     *
     * @return  self
     */ 
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get the value of unidades
     */ 
    public function getUnidades()
    {
        return $this->unidades;
    }

    /**
     * Set the value of unidades
     *
     * @return  self
     */ 
    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;

        return $this;
    }
}
?>