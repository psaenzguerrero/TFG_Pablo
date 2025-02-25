<?php
    require_once("class.bd.php");
    
    class Usuario {
        public $conn;
    
        public function __construct() {
            $this->conn = new bd();
        }
    }
?>