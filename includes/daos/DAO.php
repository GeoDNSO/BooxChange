<?php

namespace fdi\ucm\aw\booxchange\daos;

use \mysqli as mysqli;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

class DAO{

    protected $bdBooxChange;

    function __construct(){
        if(!$this->bdBooxChange){
            //$this->bdBooxChange = new mysqli("localhost", "bdbooxchange", "booxchange", "booxchangepass");
            $this->bdBooxChange = new mysqli("localhost", "root", "", "bdbooxchange");
            
            if (mysqli_connect_error()){
                die("Database connection failed: " . mysqli_connect_error());
            }
        }
    }

    function closeBD(){
        mysqli_close($this->bdBooxChange);
    }

}

?>