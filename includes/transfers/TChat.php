<?php

class TChat{

    private $idChat;
    private $idUsuario1;
    private $idUsuario2;
    private $numMensajes;

    function __construct($idChat, $idUsuario1, $idUsuario2, $numMensajes){
        $this->idChat = $idChat;
        $this->idUsuario1 = $idUsuario1;
        $this->idUsuario2 = $idUsuario2;
        $this->numMensajes = $numMensajes;
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
     * Get the value of idUsuario1
     */ 
    public function getIdUsuario1()
    {
        return $this->idUsuario1;
    }

    /**
     * Set the value of idUsuario1
     *
     * @return  self
     */ 
    public function setIdUsuario1($idUsuario1)
    {
        $this->idUsuario1 = $idUsuario1;

        return $this;
    }

    /**
     * Get the value of idUsuario2
     */ 
    public function getIdUsuario2()
    {
        return $this->idUsuario2;
    }

    /**
     * Set the value of idUsuario2
     *
     * @return  self
     */ 
    public function setIdUsuario2($idUsuario2)
    {
        $this->idUsuario2 = $idUsuario2;

        return $this;
    }

    /**
     * Get the value of numMensajes
     */ 
    public function getNumMensajes()
    {
        return $this->numMensajes;
    }

    /**
     * Set the value of numMensajes
     *
     * @return  self
     */ 
    public function setNumMensajes($numMensajes)
    {
        $this->numMensajes = $numMensajes;

        return $this;
    }
}

?>