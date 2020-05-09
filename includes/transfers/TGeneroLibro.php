<?php

namespace fdi\ucm\aw\booxchange\transfers;

class TGeneroLibro
{
    private $id;
    private $idLibro;
    private $genero;

    function __construct($id, $idLibro, $genero){
        $this->genero = $genero;
        $this->id = $id;
        $this->idLibro = $idLibro;
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
}

?>