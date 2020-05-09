<?php

namespace fdi\ucm\aw\booxchange\transfers;

class TMensajeChat{

    private $idMensaje;
    private $idChat;
    private $idUsuario;
    private $texto;
    private $fecha;
    

    function __construct($idMensaje, $idChat, $idUsuario, $texto, $fecha){
        $this->idMensaje = $idMensaje;
        $this->idChat = $idChat;
        $this->idUsuario = $idUsuario;
        $this->texto = $texto;
        $this->fecha = $fecha;
    }


    /**
     * Get the value of idMensaje
     */ 
    public function getIdMensaje()
    {
        return $this->idMensaje;
    }

    /**
     * Set the value of idMensaje
     *
     * @return  self
     */ 
    public function setIdMensaje($idMensaje)
    {
        $this->idMensaje = $idMensaje;

        return $this;
    }

    /**
     * Get the value of idChat
     */ 
    public function getIdChat()
    {
        return $this->idChat;
    }

    /**
     * Set the value of idChat
     *
     * @return  self
     */ 
    public function setIdChat($idChat)
    {
        $this->idChat = $idChat;

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
     * Get the value of texto
     */ 
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */ 
    public function setTexto($texto)
    {
        $this->texto = $texto;

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