<?php

namespace fdi\ucm\aw\booxchange\transfers;

class TTema{

    private $tema;
    private $desc;
    private $imagen;
    
    function __construct($tema, $desc, $imagen){
        $this->tema = $tema;
        $this->desc = $desc;
        $this->imagen = $imagen;
    }


    /**
     * Get the value of tema
     */ 
    public function getTema()
    {
        return $this->tema;
    }

    /**
     * Set the value of tema
     *
     * @return  self
     */ 
    public function setTema($tema)
    {
        $this->tema = $tema;

        return $this;
    }

    /**
     * Get the value of desc
     */ 
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set the value of desc
     *
     * @return  self
     */ 
    public function setDesc($desc)
    {
        $this->desc = $desc;

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
}

?>