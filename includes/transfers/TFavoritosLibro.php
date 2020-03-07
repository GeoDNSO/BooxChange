<<<<<<< HEAD:includes/transfers/TFavoritosLibro.php
<?php

=======
<?php

class TFavoritosLibro{
    private $idLibro;
    private $idUsuario;
    private $idFavorito;

    function __construct($idLibro, $idUsuario, $idFavorito){
        $this->idLibro = $idLibro;
        $this->idUsuario = $idUsuario;
        $this->idFavorito = $idFavorito;
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
     * Get the value of idFavorito
     */ 
    public function getIdFavorito()
    {
        return $this->idFavorito;
    }

    /**
     * Set the value of idFavorito
     *
     * @return  self
     */ 
    public function setIdFavorito($idFavorito)
    {
        $this->idFavorito = $idFavorito;

        return $this;
    }
}

>>>>>>> 0e7739291eed7716a1859d1e26a055a72086ffc6:includes/TFavoritosLibro.php
?>