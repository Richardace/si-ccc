<?php
	
	class UserDAO {
		
		public function __construct(){
			require_once($_SERVER['DOCUMENT_ROOT']."/si-ccc/config/database.php");
			require_once($_SERVER['DOCUMENT_ROOT'].'/si-ccc/model/DTO/UserDTO.php');
		}

		public function insert($email, $state, $rol_id){
			$db = new Connect;
			
			$inserNewUser = $db -> prepare("INSERT INTO user (firstName, lastName, email, avatar, pass, sess, state, idGoogle, rol_id) 
											VALUES ('', '', :email, '', '', '', :state, '', :rol_id)");
			$inserNewUser -> execute([
				':email'   => $email,
				':state'   => $state,
				':rol_id'   => $rol_id
			]);
				
			return $inserNewUser;
		}

		public function getUserByEmail($email){
			$db = new Connect;
			$consulta = $db -> prepare('SELECT * FROM user WHERE email=:email');
        	$consulta -> execute([
				':email'   => $email
			]);
			$users = NULL;
			while($row = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$users[] = $row;
			}
			return $users;
		}

		public function getEmailByIdUser($id){
			
			$db = new Connect;
			$consulta = $db -> prepare('SELECT * FROM user WHERE id=:idUser');
        	$consulta -> execute([
				':idUser'   => $id
			]);
			$email = "";
			while($row = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$email = $row['email'];
			}
			return $email;
		}

		public function newUser($data, $sess, $pass, $id){

			$db = new Connect;
			$insertNewUser = $db -> prepare("UPDATE user SET firstName=:f_name, lastName=:l_name, avatar=:avatar, pass=:password, sess=:session, state=:state, idGoogle=:idGoogle WHERE id = :id");
			$insertNewUser -> execute([
				':f_name'   => $data["givenName"],
				':l_name'   => $data["familyName"],
				':avatar'   => $data["avatar"],
				':password' => $pass,
				':session'  => $sess,
				':id' => $id,
				':state' => "Activo",
				':idGoogle' => $data['idGoogle']
			]);
				
			return $insertNewUser;
		}

		public function getSolicitantes(){
			$db = new Connect;
			$consulta = $db -> prepare('SELECT * FROM user WHERE rol_id=:id');
        	$consulta -> execute([
				':id'   => 2
			]);
			$users = NULL;
			while($row = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$users[] = $row;
			}
			return $users;
		}

		public function getEvaluadores(){
			$db = new Connect;
			$consulta = $db -> prepare('SELECT * FROM user WHERE rol_id=:id');
        	$consulta -> execute([
				':id'   => 3
			]);
			$users = NULL;
			while($row = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$users[] = $row;
			}
			return $users;
		}

		public function getAdministradores(){
			$db = new Connect;
			$consulta = $db -> prepare('SELECT * FROM user WHERE rol_id=:id');
        	$consulta -> execute([
				':id'   => 1
			]);
			$users = NULL;
			while($row = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$users[] = $row;
			}
			return $users;
		}

		// Funciones de extraccion de detalles
		public function getNameAndLastNameById($idUser){
			$db = new Connect;
			$consulta = $db -> prepare('SELECT * FROM user WHERE id=:idUser');
        	$consulta -> execute([
				':idUser'   => $idUser
			]);
			$fullName = "";
			while($row = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$fullName = $row['firstName']. " " .$row['lastName'];
			}
			return $fullName;
		}

	} 
?>