<?php
    require_once("../config.php");
    require_once("Controller.php");

    class AdminController extends Controller{
        private $conn;

        public function __construct(){
            $this->conn = $conn;
        }
        
    }


?>