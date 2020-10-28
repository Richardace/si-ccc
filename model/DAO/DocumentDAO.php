<?php

class DocumentDAO
{

	public function addDocument($usuario, $origen, $destino, $titulo, $descripcion, $documentos, $nameFolder)
	{
		$db = new Connect;
		$sql = $db->query("INSERT INTO documento(id_user, source, destiny, dateRegister, title, description, files, state, nameFolder) VALUES('" . $usuario . "','" . $origen . "', '" . $destino . "', NULL , '" . $titulo . "', '" . $descripcion . "', '" . $documentos . "', 'Radicado', '" . $nameFolder . "') ");

		return $sql;
	}

	public function validadIdentidad($idUser, $codigoAcceso)
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM documento_evaluador WHERE id_user=:id_user AND key_access=:keyAccess');
		$consulta->execute([
			':id_user'   => $idUser,
			':keyAccess'   => $codigoAcceso
		]);
		$documentos = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$documentos[] = $row;
		}
		return $documentos;
	}

	public function getDocumentById($idDocumento)
	{
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM documento WHERE id=:id');
		$consulta->execute([
			':id'   => $idDocumento
		]);
		$documentos = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$row['fullName'] = $userDAO->getNameAndLastNameById($row['id_user']);
			$documentos[] = $row;
		}
		return $documentos;
	}

	public function getDocumentsPending()
	{
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM documento WHERE state=:state');
		$consulta->execute([
			':state'   => "Radicado"
		]);
		$documentos = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {

			$row['fullName'] = $userDAO->getNameAndLastNameById($row['id_user']);
			$row['email'] = $userDAO->getEmailByIdUser($row['id_user']);
			$documentos[] = $row;
		}
		return $documentos;
	}
}
