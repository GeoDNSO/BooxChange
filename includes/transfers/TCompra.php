<?php

class TCompra{

    private $idCompra;
    private $idUsuario;
    private $idLibro;
    private $unidades;
    private $coste;

    function __construct($idCompra, $idUsuario, $idLibro, $unidades, $coste){
        $this->idCompra = $idCompra;
        $this->idUsuario = $idUsuario;
        $this->idLibro = $idLibro;
        $this->unidades = $unidades;
        $this->coste = $coste;
    }
    
    /**
     * Get the value of idCompra
     */ 
    public function getIdCompra()
    {
        return $this->idCompra;
    }

    /**
     * Set the value of idCompra
     *
     * @return  self
     */ 
    public function setIdCompra($idCompra)
    {
        $this->idCompra = $idCompra;

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

    /**
     * Get the value of coste
     */ 
    public function getCoste()
    {
        return $this->coste;
    }

    /**
     * Set the value of coste
     *
     * @return  self
     */ 
    public function setCoste($coste)
    {
        $this->coste = $coste;

        return $this;
    }
}

?>