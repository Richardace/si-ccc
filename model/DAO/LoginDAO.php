<?php
	
	class LoginDAO {
		
		public function __construct(){
			require_once($_SERVER['DOCUMENT_ROOT']."/si-ccc/config/database.php");
			require_once($_SERVER['DOCUMENT_ROOT'].'/si-ccc/model/DTO/UserDTO.php');
		}

		public function checkUser($idGoogle){
			$db = new Connect;
			$checkUser = $db -> prepare("SELECT * FROM user WHERE idGoogle=:id");
            $checkUser -> execute(array(
                'id' => $idGoogle
			));

			$cuenta = NULL;
			while($row = $checkUser->fetch(PDO::FETCH_ASSOC)){
				$cuenta[] = $row;
			}
			return $cuenta;
		}

		public function checkUserProblema($idGoogle){
			$db = new Connect;
			$checkUser = $db -> prepare("SELECT * FROM user WHERE idGoogle=:id");
            $checkUser -> execute(array(
                'id' => $idGoogle
			));

			return $checkUser;
		}

		public function checkValidarUser($idGoogle){
			$db = new Connect;
			$checkUser = $db -> prepare("SELECT * FROM user WHERE idGoogle=:id");
            $checkUser -> execute(array(
                'id' => $idGoogle
			));

			return $checkUser;
		}

		public function checkIdUser($email){
			$db = new Connect;
			$checkUser = $db -> prepare("SELECT * FROM user WHERE email=:email");
            $checkUser -> execute(array(
                'email' => $email
			));

			$cuenta = NULL;
			while($row = $checkUser->fetch(PDO::FETCH_ASSOC)){
				$cuenta[] = $row;
			}
			return $cuenta;
		}

		public function checkIdUserProblema($email){
			$db = new Connect;
			$checkUser = $db -> prepare("SELECT * FROM user WHERE email=:email");
            $checkUser -> execute(array(
                'email' => $email
			));

			return $checkUser;
		}

		public function checkStatus($id, $session){
			$db = new Connect;

			$user = $db -> prepare("SELECT id FROM user WHERE id=:id AND sess=:session");
            $user -> execute([
                ':id'       => $id,
                ':session'  => $session
			]);

			return $user;
		}

		public function getConfiguration($id){
			$db = new Connect;
			$checkUser = $db -> prepare("SELECT * FROM user WHERE id=:id");
            $checkUser -> execute(array(
                ':id' => $id
			));

			$cuenta = NULL;
			while($row = $checkUser->fetch(PDO::FETCH_ASSOC)){
				$cuenta[] = $row;
			}
			return $cuenta;
		}

	} 
?>