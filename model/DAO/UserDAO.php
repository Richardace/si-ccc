<?php
	
	class UserDAO {
		
		public function __construct(){
			require_once($_SERVER['DOCUMENT_ROOT']."/si-ccc/config/database.php");
			$this->users = array();
			require_once($_SERVER['DOCUMENT_ROOT'].'/si-ccc/model/DTO/UserDTO.php');
		}

		public function checkUser($idGoogle){
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

		public function newUser($data, $sess, $pass, $id){

			$db = new Connect;
			// $insertNewUser = $db -> prepare("INSERT INTO user (firstName, lastName, email, avatar, pass, sess, state, rol_id) 
			// 												 VALUES (:f_name, :l_name, :email, :avatar, :password, :session, :state, :rol_id)");

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

		public function newCorreo($email){

			$db = new Connect;
			
			$insertNewCorreo = $db -> prepare("INSERT INTO correoautorizado (email) VALUES (:email)");
			$insertNewCorreo -> execute([
				':email'   => $email
			]);
				
			return $insertNewCorreo;
		}

		public function getCorreos(){
			$db = new Connect;
			$consulta = $db -> prepare('SELECT * FROM correoautorizado ORDER BY id');
        	$consulta -> execute();

			while($row = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$correos[] = $row;
			}
			return $correos;
		}

		public function deleteCorreo($id){
			$db = new Connect;
			$consulta = $db -> prepare("DELETE FROM correoautorizado WHERE id = '$id'");
			$consulta -> execute();
			
			return $consulta;
		}



		
		public function validarUsuario($email, $password){

			$consulta = $this->db->query("SELECT * FROM user WHERE email = '$email' AND pass = '$password'");
			$resultado = $consulta->fetch_assoc();
			if($resultado == NULL){
				return NULL;
			}else{
				$usuario = new UserDTO($resultado['id'], $resultado['name'], $resultado['lastName'], $resultado['email'], $resultado['phone'], $resultado['register_date'], $resultado['pass'], $resultado['state'], $resultado['rol_id']);
				return $usuario;
			}
		}

		public function recContra($email){

			$consulta = $this->db->query("SELECT * FROM user WHERE email = '$email'");
			$resultado = $consulta->fetch_assoc();
			if($resultado == NULL){
				return NULL;
			}else{
				$usuario = new UserDTO($resultado['id'], $resultado['name'], $resultado['lastName'], $resultado['email'], $resultado['phone'], $resultado['register_date'], $resultado['pass'], $resultado['state'], $resultado['rol_id']);
				return $usuario;
			}
		}

		public function changePassword($idUser, $password){

			$consulta = $this->db->query("UPDATE user SET pass = '$password' WHERE id = '$idUser'");
			
		}

	} 
?>