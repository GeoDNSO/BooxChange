<?php

class DAO{

    private $bdBooxChange;

    function __construct(){
        if(!$this->bdBooxChange){
            $this->bdBooxChange = new mysqli("localhost", "bdBooxChange", "booxchange", "booxchangepass");
            //$this->bdBooxChange = mysqli("localhost", "bdBooxChange", "root", "");
        }
    }

    function closeBD(){
        mysqli_close($this->bdBooxChange);
    }

}

?>