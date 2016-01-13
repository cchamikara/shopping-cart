<?php

/**
 * Created by PhpStorm.
 * User: Chamal
 * Date: 1/13/16
 * Time: 9:50 PM
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!class_exists('Database')) {
    require_once("$_SERVER[DOCUMENT_ROOT]/includes/config/mysql_crud.php");
}

class main
{
    var $db;
    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function getProducts(){
        $this->db->select('products','*',null);

        return $this->db->getResult();
    }
}