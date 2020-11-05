<?php

class UserDAO
{

	public function __construct()
	{
		require_once($_SERVER['DOCUMENT_ROOT'] . "/si-ccc/config/database.php");
		require_once($_SERVER['DOCUMENT_ROOT'] . '/si-ccc/model/DTO/UserDTO.php');
	}

	public function insert($email, $state, $rol_id)
	{
		$db = new Connect;

		$inserNewUser = $db->prepare("INSERT INTO user (firstName, lastName, email, avatar, pass, sess, state, idGoogle, rol_id) 
											VALUES ('', '', :email, '', '', '', :state, '', :rol_id)");
		$inserNewUser->execute([
			':email'   => $email,
			':state'   => $state,
			':rol_id'   => $rol_id
		]);

		return $inserNewUser;
	}

	public function getUserByEmail($email)
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM user WHERE email=:email');
		$consulta->execute([
			':email'   => $email
		]);
		$users = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			return $row['id'];
		}
	}

	public function getEmailByIdUser($id)
	{

		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM user WHERE id=:idUser');
		$consulta->execute([
			':idUser'   => $id
		]);
		$email = "";
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$email = $row['email'];
		}
		return $email;
	}

	public function newUser($data, $sess, $pass, $id)
	{

		$db = new Connect;
		$insertNewUser = $db->prepare("UPDATE user SET firstName=:f_name, lastName=:l_name, avatar=:avatar, pass=:password, sess=:session, state=:state, idGoogle=:idGoogle WHERE id = :id");
		$insertNewUser->execute([
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

	public function getSolicitantes()
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM user WHERE rol_id=:id');
		$consulta->execute([
			':id'   => 2
		]);
		$users = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$row['dependencyUser'] = $this->getDependencyByIdUser($row['id']);
			$users[] = $row;
		}
		return $users;
	}

	public function getEvaluadores()
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM user WHERE rol_id=:id');
		$consulta->execute([
			':id'   => 3
		]);
		$users = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$row['dependencyUser'] = $this->getDependencyByIdUser($row['id']);
			$users[] = $row;
		}
		return $users;
	}

	public function getAdministradores()
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM user WHERE rol_id=:id');
		$consulta->execute([
			':id'   => 1
		]);
		$users = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$users[] = $row;
		}
		return $users;
	}

	public function getUsersProgramById($idProgram)
	{

		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM program_user WHERE program_id=:id');
		$consulta->execute([
			':id'   => $idProgram
		]);
		$users = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$row['fullName'] = $this->getNameAndLastNameById($row['user_id']);

			if ($row['fullName'] == " ") {
				$row['fullName'] = "Nombre sin Registrar";
			}

			$row['email'] = $this->getEmailByIdUser($row['user_id']);
			$users[] = $row;
		}
		return $users;
	}

	public function getUsersFacultadById($idFacultad)
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM facultad_user WHERE program_id=:id');
		$consulta->execute([
			':id'   => $idFacultad
		]);
		$users = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$row['fullName'] = $this->getNameAndLastNameById($row['user_id']);
			$users[] = $row;
		}
		return $users;
	}

	public function getUsersDepartmentsById($idDepartment)
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM department_user WHERE program_id=:id');
		$consulta->execute([
			':id'   => $idDepartment
		]);
		$users = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$row['fullName'] = $this->getNameAndLastNameById($row['user_id']);
			$users[] = $row;
		}
		return $users;
	}

	public function getDependencyByIdUser($idUser)
	{
		$program = $this->findUserInProgram($idUser);
		$department = $this->findUserInDepartment($idUser);
		$facultad = $this->findUserInFacultad($idUser);

		if ($program != NULL) {
			$db = new Connect;
			$consulta = $db->prepare('SELECT * FROM program WHERE id=:id');
			$consulta->execute([
				':id'   => $program
			]);
			while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
				return $row['name'];
			}
		}else if($department != NULL){
			$db = new Connect;
			$consulta = $db->prepare('SELECT * FROM department WHERE id=:id');
			$consulta->execute([
				':id'   => $program
			]);
			while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
				return $row['name'];
			}
			
		}else if($facultad != NULL){
			$db = new Connect;
			$consulta = $db->prepare('SELECT * FROM facultad WHERE id=:id');
			$consulta->execute([
				':id'   => $program
			]);
			while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
				return $row['name'];
			}
		}else{
			
		}

		
	}

	// Funciones de extraccion de detalles
	public function getNameAndLastNameById($idUser)
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM user WHERE id=:idUser');
		$consulta->execute([
			':idUser'   => $idUser
		]);
		$fullName = "";
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$fullName = $row['firstName'] . " " . $row['lastName'];
		}
		return $fullName;
	}

	// Consulta de Dependencia
	public function findUserInProgram($idUser)
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM program_user WHERE user_id=:id');
		$consulta->execute([
			':id'   => $idUser
		]);
		$users = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$users = $row['program_id'];
		}
		return $users;
	}

	public function findUserInDepartment($idUser)
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM department_user WHERE user_id=:id');
		$consulta->execute([
			':id'   => $idUser
		]);
		$users = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$users = $row['department_id'];
		}
		return $users;
	}

	public function findUserInFacultad($idUser)
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM facultad_user WHERE user_id=:id');
		$consulta->execute([
			':id'   => $idUser
		]);
		$users = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$users = $row['facultad_id'];
		}
		return $users;
	}
}
