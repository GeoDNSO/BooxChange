<?php


class appBooxChange{

    private static $instance;
    private $bdBooxChange;

    public function __construct(){
        
    }
    
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new appBooxChange();
        }
        return self::$instance;
    }

    //Funciones que interactuen con las BD




}

?>