<?php

class DAO{

    private $bdBooxChange;

    function __construct(){
        if(!$this->bdBooxChange){
            //$this->bdBooxChange = new mysqli("localhost", "bdbooxchange", "booxchange", "booxchangepass");
            $this->bdBooxChange = new mysqli("localhost", "bdbooxchange", "root", "");
        }
    }

    function closeBD(){
        mysqli_close($this->bdBooxChange);
    }

}

?>