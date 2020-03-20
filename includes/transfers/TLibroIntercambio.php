<?php

namespace fdi\ucm\aw\booxchange\transfers;

class TLibroIntercambio{

    private $idLibroInter;
    private $idUsuario;
    private $titulo;
    private $imagen;
    private $autor;
    private $descripcion;
    private $genero;
    private $intercambiado;
    private $fecha;


    function __construct($idLibroInter, $idUsuario, $titulo, $imagen, $autor, $descripcion, $genero, $intercambiado, $fecha){
        $this->idLibroInter = $idLibroInter;
        $this->idUsuario = $idUsuario;
        $this->titulo = $titulo;
        $this->imagen = $imagen;
        $this->autor = $autor;
    }


    /**
     * Get the value of idLibroInter
     */ 
    public function getIdLibroInter()
    {
        return $this->idLibroInter;
    }

    /**
     * Set the value of idLibroInter
     *
     * @return  self
     */ 
    public function setIdLibroInter($idLibroInter)
    {
        $this->idLibroInter = $idLibroInter;

        return $this;
    }

    /**
     * Get the value of idUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

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
     * Get the value of intercambiado
     */ 
    public function getIntercambiado()
    {
        return $this->intercambiado;
    }

    /**
     * Set the value of intercambiado
     *
     * @return  self
     */ 
    public function setIntercambiado($intercambiado)
    {
        $this->intercambiado = $intercambiado;

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
}


?>