<?php

class TComentario{

    private $idComentario;
    private $idUsuario;
    private $texto;
    private $fecha;
    private $idDiscusion;

    function __construct($idComentario, $idUsuario, $texto, $fecha, $idDiscusion){
        $this->idComentario = $idComentario;
        $this->idUsuario = $idUsuario;
        $this->texto = $texto;
        $this->fecha = $fecha;
        $this->idDiscusion = $idDiscusion;
    }

    /**
     * Get the value of idComentario
     */ 
    public function getIdComentario()
    {
        return $this->idComentario;
    }

    /**
     * Set the value of idComentario
     *
     * @return  self
     */ 
    public function setIdComentario($idComentario)
    {
        $this->idComentario = $idComentario;

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
     * Get the value of texto
     */ 
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */ 
    public function setTexto($texto)
    {
        $this->texto = $texto;

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
     * Get the value of idDiscusion
     */ 
    public function getIdDiscusion()
    {
        return $this->idDiscusion;
    }

    /**
     * Set the value of idDiscusion
     *
     * @return  self
     */ 
    public function setIdDiscusion($idDiscusion)
    {
        $this->idDiscusion = $idDiscusion;

        return $this;
    }
}

?>