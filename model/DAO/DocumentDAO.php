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

	public function getDocumentEvaluador($idDocumento)
	{
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM documento_evaluador WHERE id_document=:id');
		$consulta->execute([
			':id'   => $idDocumento
		]);
		$documentos = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
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

	public function insertDocumentToEvaluate($idUser, $idDocument, $fechaLimit, $token)
	{
		$db = new Connect;

		$insertDocumentEvaluador = $db->prepare("INSERT INTO documento_evaluador (id_user, id_document, dateLimit, dateRegister, key_access) 
										VALUES (:userID, :documentID, :dateLimit, NULL, :keyAccess)");
		$insertDocumentEvaluador->execute([
			':userID'   => $idUser,
			':documentID'   => $idDocument,
			':dateLimit'   => $fechaLimit,
			':keyAccess'   => $token
		]);

		// Change State Document
		$changeState = $db->prepare("UPDATE documento SET state=:newState WHERE id=:idDocumento");

		$changeState->execute([
			':newState'   => "En Revisión",
			':idDocumento'   => $idDocument
		]);



		return $insertDocumentEvaluador;
	}

	public function getTokenEnableById($idUser)
	{
		require_once "model/DAO/UserDAO.php";

		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM documento_evaluador WHERE id_user=:id');
		$consulta->execute([
			':id'   => $idUser
		]);
		$documentos = NULL;
		$tokensActivos = NULL;

		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$documentos[] = $row;
		}

		foreach ($documentos as $documentoEvaluador) {

			$consulta2 = $db->prepare('SELECT * FROM documento WHERE id=:idDocument AND state=:newState');
			$consulta2->execute([
				':idDocument'   => $documentoEvaluador['id_document'],
				':newState'   => "En Revisión"
			]);
			while ($row2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
				$tokensActivos[] = $documentoEvaluador['key_access'];
			}
		}
		return $tokensActivos;
	}
}
