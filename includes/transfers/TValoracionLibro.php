<?php

namespace fdi\ucm\aw\booxchange\transfers;

class TValoracionLibro{

    private $idValoracion;
    private $idLibro;
    private $idUsuario;
    private $valoracion;
    private $comentario;


    function __construct($idValoracion, $idLibro, $idUsuario, $valoracion, $comentario){
        $this->idValoracion = $valoracion;
        $this->idLibro = $idLibro;
        $this->idUsuario = $idUsuario;
        $this->valoracion = $valoracion;
    }


    /**
     * Get the value of idValoracion
     */ 
    public function getIdValoracion()
    {
        return $this->idValoracion;
    }

    /**
     * Set the value of idValoracion
     *
     * @return  self
     */ 
    public function setIdValoracion($idValoracion)
    {
        $this->idValoracion = $idValoracion;

        return $this;
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
     * Get the value of comentario
     */ 
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set the value of comentario
     *
     * @return  self
     */ 
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }
}

?>