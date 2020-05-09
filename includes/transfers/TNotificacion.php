<?php

namespace fdi\ucm\aw\booxchange\transfers;

class TNotificacion{

    private $id;
    private $idUsuario;
    private $mensaje;
    private $leido;
    private $fecha;


    function __construct($id, $idUsuario, $mensaje, $leido, $fecha)
    {
        $this->id = $id;
        $this->idUsuario = $idUsuario;
        $this->mensaje = $mensaje;
        $this->leido = $leido;
        $this->fecha = $fecha;
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
     * Get the value of mensaje
     */ 
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set the value of mensaje
     *
     * @return  self
     */ 
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get the value of leido
     */ 
    public function getLeido()
    {
        return $this->leido;
    }

    /**
     * Set the value of leido
     *
     * @return  self
     */ 
    public function setLeido($leido)
    {
        $this->leido = $leido;

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