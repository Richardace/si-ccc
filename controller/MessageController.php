<?php
	
	class MessageController {
		
		public function __construct(){
            // require_once "models/VehiculosModel.php";
            
		}
		
        public function administrador(){
            session_start();
            require_once "view/administrator/message.php";	
        }

        public function solicitante(){
            session_start();
            require_once "view/solicitante/message.php";	
        }

        public function index(){
            session_start();
            if($_SESSION['rol_id'] == 1){
                require_once "view/administrator/message.php";
            }else if($_SESSION['rol_id'] == 2){
                require_once "view/solicitante/message.php";	
            }
        }

        public function default(){
            session_start();
            require_once "view/default/message.php";	
        }

    }

?>