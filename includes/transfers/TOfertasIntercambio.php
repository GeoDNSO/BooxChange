<?php

namespace fdi\ucm\aw\booxchange\transfers;

class TOfertasIntercambio{

    private $id;
    private $idLibro1;
    private $idLibro2;
    private $esOferta;


    function __construct($id, $idLibro1, $idLibro2, $esOferta)
    {
        $this->id = $id;
        $this->idLibro1 = $idLibro1;
        $this->idLibro2 = $idLibro2;
        $this->esOferta = $esOferta;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Get the value of esOferta
     */ 
    public function getEsOferta()
    {
        return $this->esOferta;
    }

    /**
     * Set the value of esOferta
     *
     * @return  self
     */ 
    public function setEsOferta($esOferta)
    {
        $this->esOferta = $esOferta;

        return $this;
    }
}