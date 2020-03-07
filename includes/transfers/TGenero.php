<<<<<<< HEAD:includes/transfers/TGenero.php
<?php

=======
<?php

class TGenero{
    private $genero;

    function __construct($genero){
        $this->genero = $genero;
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
}

>>>>>>> 0e7739291eed7716a1859d1e26a055a72086ffc6:includes/TGenero.php
?>