<<<<<<< HEAD:includes/transfers/TDiscusion.php
<?php

=======
<?php

class TDiscusion{

    private $idDiscusion;
    private $idUsuarioCreador;
    private $fecha;
    private $idTema;
    private $titulo;
    private $numComentarios;
    private $numVisitas;

    function __construct($idDiscusion, $idUsuarioCreador, $fecha, $idTema, $titulo, $numComentarios, $numVisitas){
        $this->idDiscusion = $idDiscusion;
        $this->idUsuarioCreador = $idUsuarioCreador;
        $this->fecha = $fecha;
        $this->idTema = $idTema;
        $this->titulo = $titulo;
        $this->numComentarios = $numComentarios;
        $this->numVisitas = $numVisitas;
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

    /**
     * Get the value of idUsuarioCreador
     */ 
    public function getIdUsuarioCreador()
    {
        return $this->idUsuarioCreador;
    }

    /**
     * Set the value of idUsuarioCreador
     *
     * @return  self
     */ 
    public function setIdUsuarioCreador($idUsuarioCreador)
    {
        $this->idUsuarioCreador = $idUsuarioCreador;

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
     * Get the value of idTema
     */ 
    public function getIdTema()
    {
        return $this->idTema;
    }

    /**
     * Set the value of idTema
     *
     * @return  self
     */ 
    public function setIdTema($idTema)
    {
        $this->idTema = $idTema;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of numComentarios
     */ 
    public function getNumComentarios()
    {
        return $this->numComentarios;
    }

    /**
     * Set the value of numComentarios
     *
     * @return  self
     */ 
    public function setNumComentarios($numComentarios)
    {
        $this->numComentarios = $numComentarios;

        return $this;
    }

    /**
     * Get the value of numVisitas
     */ 
    public function getNumVisitas()
    {
        return $this->numVisitas;
    }

    /**
     * Set the value of numVisitas
     *
     * @return  self
     */ 
    public function setNumVisitas($numVisitas)
    {
        $this->numVisitas = $numVisitas;

        return $this;
    }
}

>>>>>>> 0e7739291eed7716a1859d1e26a055a72086ffc6:includes/TDiscusion.php
?>