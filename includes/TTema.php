<?php

class TTema{

    private $tema;
    
    function __construct($tema){
        $this->tema = $tema;
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
}

?>