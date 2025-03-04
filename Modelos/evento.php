<?php

    require_once("class.bd.php");

    class Evento{
        public $conn;
    
        public function __construct() {
            $this->conn = new bd();
        }
    }



?>