<?php
	
	class MenuController {
        
        public function __construct(){
            session_start();
        }

        public function administrator(){
            require_once "view/administrator/personal.php";
        }
	}
?>