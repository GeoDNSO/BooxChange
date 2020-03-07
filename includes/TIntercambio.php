<?php

class TIntercambio{
    private $idLibro1;
    private $idLibro2;
    private $esMisterioso;
    private $idIntercambio;
    private $fecha;

    function __construct($idLibro1, $idLibro2, $esMisterioso, $idIntercambio, $fecha){
        $this->idLibro1 = $idLibro1;
        $this->idLibro2 = $idLibro2;
        $this->esMisterioso = $esMisterioso;
        $this->idIntercambio = $idIntercambio;
        $this->fecha = $fecha;
    }

    /**
     * Get the value of idLibro1
     */ 
    public function getIdLibro1()
    {
        return $this->idLibro1;
    }

    /**
     * Set the value of idLibro1
     *
     * @return  self
     */ 
    public function setIdLibro1($idLibro1)
    {
        $this->idLibro1 = $idLibro1;

        return $this;
    }

    /**
     * Get the value of idLibro2
     */ 
    public function getIdLibro2()
    {
        return $this->idLibro2;
    }

    /**
     * Set the value of idLibro2
     *
     * @return  self
     */ 
    public function setIdLibro2($idLibro2)
    {
        $this->idLibro2 = $idLibro2;

        return $this;
    }

    /**
     * Get the value of esMisterioso
     */ 
    public function getEsMisterioso()
    {
        return $this->esMisterioso;
    }

    /**
     * Set the value of esMisterioso
     *
     * @return  self
     */ 
    public function setEsMisterioso($esMisterioso)
    {
        $this->esMisterioso = $esMisterioso;

        return $this;
    }

    /**
     * Get the value of idIntercambio
     */ 
    public function getIdIntercambio()
    {
        return $this->idIntercambio;
    }

    /**
     * Set the value of idIntercambio
     *
     * @return  self
     */ 
    public function setIdIntercambio($idIntercambio)
    {
        $this->idIntercambio = $idIntercambio;

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