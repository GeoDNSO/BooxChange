<?php
namespace fdi\ucm\aw\booxchange\daos;

$parentDir = dirname(__DIR__, 1);
require_once($parentDir."/config.php");

use fdi\ucm\aw\booxchange\transfers\TOfertasIntercambio as TOfertasIntercambio;



class DAOOfertasIntercambio extends DAO
{
    private static $instance;

    function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DAOOfertasIntercambio();
        }
        return self::$instance;
    }

    

}

?>