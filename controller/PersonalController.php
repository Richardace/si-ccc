<?php
	
	class PersonalController {
		
		public function __construct(){
			require_once "model/DAO/UserDAO.php";
		}

		
        public function administrador(){

            $user = new UserDAO();
			$data["correos"] = $user->getCorreos();

            require_once "view/administrator/personal.php";	
        }

        public function solicitante(){
            require_once "view/solicitante/personal.php";	
        }
		
    }

?>