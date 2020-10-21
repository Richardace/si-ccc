<?php
	
	class PersonalController {
		
		public function __construct(){
            require_once "model/DAO/UserDAO.php";
            require_once "model/DAO/CorreoDAO.php";
		}

		
        public function administrador(){

            $user = new UserDAO();
            $correo = new CorreoDAO();
            $data["correos"] = $correo->getCorreos();
            $data["solicitante"] = $user->getSolicitantes();
            $data["evaluador"] = $user->getEvaluadores();
            $data["administrador"] = $user->getAdministradores();

            require_once "view/administrator/personal.php";	
        }

        public function solicitante(){
            require_once "view/solicitante/personal.php";	
        }
		
    }

?>