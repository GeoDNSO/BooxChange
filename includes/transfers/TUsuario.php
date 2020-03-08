<?php

class TUsuario{

    private $idUsuario;
    private $nombreUsuario;
    private $nombreReal;
    private $correo;
    private $password;
    private $fotoPerfil;
    private $fechaNacimiento;
    private $rol;
    private $ciudad;
    private $direccion;
    private $fechaDeCreacion;

    function __construct($idUsuario, $nombreUsuario, $nombreReal, $correo, $password, $fotoPerfil, $fechaNacimiento, $rol, $ciudad, $direccion, $fechaDeCreacion){
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->nombreReal = $nombreReal;
        $this->correo = $correo;
        $this->password = $password;
        $this->fotoPerfil = $fotoPerfil;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->rol = $rol;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
        $this->fechaDeCreacion = $fechaDeCreacion;
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
     * Get the value of nombreUsuario
     */ 
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set the value of nombreUsuario
     *
     * @return  self
     */ 
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of fotoPerfil
     */ 
    public function getFotoPerfil()
    {
        return $this->fotoPerfil;
    }

    /**
     * Set the value of fotoPerfil
     *
     * @return  self
     */ 
    public function setFotoPerfil($fotoPerfil)
    {
        $this->fotoPerfil = $fotoPerfil;

        return $this;
    }

    /**
     * Get the value of fechaNacimiento
     */ 
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set the value of fechaNacimiento
     *
     * @return  self
     */ 
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get the value of ciudad
     */ 
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad
     *
     * @return  self
     */ 
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of fechaDeCreacion
     */ 
    public function getFechaDeCreacion()
    {
        return $this->fechaDeCreacion;
    }

    /**
     * Set the value of fechaDeCreacion
     *
     * @return  self
     */ 
    public function setFechaDeCreacion($fechaDeCreacion)
    {
        $this->fechaDeCreacion = $fechaDeCreacion;

        return $this;
    }

    /**
     * Get the value of nombreReal
     */ 
    public function getNombreReal()
    {
        return $this->nombreReal;
    }

    /**
     * Set the value of nombreReal
     *
     * @return  self
     */ 
    public function setNombreReal($nombreReal)
    {
        $this->nombreReal = $nombreReal;

        return $this;
    }
}
