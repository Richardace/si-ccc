<?php
	
	class UserController {
		
		public function __construct(){
			require_once "model/DAO/UserDAO.php";
		}


		public function addCorreo(){
			$email = $_POST['email'];

			$userDAO = new UserDao;
            $newCorreo = $userDAO->newCorreo($email);
            
			header('Location: index.php?c=personal&a=administrador');	

		}

		public function eliminarCorreo($id){
			$userDAO = new UserDao;
            $newCorreo = $userDAO->deleteCorreo($id);
            
			header('Location: index.php?c=personal&a=administrador');	
		}


	}
?>