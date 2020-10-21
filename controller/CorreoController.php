<?php
	
	class CorreoController {
		
		public function __construct(){
			require_once "model/DAO/CorreoDAO.php";
		}

        public function addCorreo(){
			$email = $_POST['email'];

			$CorreoDAO = new CorreoDAO;
            $newCorreo = $CorreoDAO->newCorreo($email);
            
			header('Location: index.php?c=personal&a=administrador');	

		}

		public function eliminarCorreo($id){
			$CorreoDAO = new CorreoDAO;
            $newCorreo = $CorreoDAO->deleteCorreo($id);
            
			header('Location: index.php?c=personal&a=administrador');	
		}

		
    }

?>