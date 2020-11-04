<?php

class DocumentDAO
{

	public function addDocument($usuario, $origen, $destino, $titulo, $descripcion, $documentos, $nameFolder)
	{
		$db = new Connect;
		$sql = $db->query("INSERT INTO documento(id_user, source, destiny, dateRegister, title, description, files, state, nameFolder) VALUES('" . $usuario . "','" . $origen . "', '" . $destino . "', NULL , '" . $titulo . "', '" . $descripcion . "', '" . $documentos . "', 'Radicado', '" . $nameFolder . "') ");

		return $sql;
	}

	public function addCorreccionDocument($idEvaluador, $radicado, $descripcion, $documentos, $nameFolder)
	{
		$db = new Connect;
		$sql = $db->query("INSERT INTO correcciones(id_userEvaluador, id_document, date_envio_evaluador, comentarios_evaluador, documentos_evaluador, nameFolder, state) 
												VALUES('" . $idEvaluador . "','" . $radicado . "',  NULL , '" . $descripcion . "', '" . $documentos . "', '" . $nameFolder . "', 'Pendiente') ");
		$sql2 = $db->query("UPDATE documento SET state= 'Devuelto con correcciones' WHERE id = '" . $radicado . "'");

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

	public function getCorreccionById($id)
	{
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM correcciones WHERE id=:id');
		$consulta->execute([
			':id'   => $id
		]);
		$documentos = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$documentos[] = $row;
		}
		return $documentos;
	}

	public function getCorreccionesDocumentEvaluador($id){
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM correcciones WHERE id_document=:id ORDER BY date_envio_evaluador DESC');
		$consulta->execute([
			':id'   => $id
		]);
		$correcciones = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$correcciones[] = $row;
		}
		return $correcciones;
	}

	public function getFolderDocument($idDocumento)
	{
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM documento WHERE id=:id');
		$consulta->execute([
			':id'   => $idDocumento
		]);
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			return $row['nameFolder'];
		}
	}

	public function getDocumentsByDependency($dependency)
	{
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM documento WHERE source = :source');
		$consulta->execute([
			':source' => $dependency
		]);
		$documentos = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {

			$row['fullName'] = $userDAO->getNameAndLastNameById($row['id_user']);
			$row['email'] = $userDAO->getEmailByIdUser($row['id_user']);
			$documentos[] = $row;
		}
		return $documentos;
	}

	public function getDocumentByIdCorreccion($idCorreccion){
		
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM correcciones WHERE id = :id');
		$consulta->execute([
			':id' => $idCorreccion
		]);
		$idDocumento = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {

			$idDocumento = $row['id_document'];
		}
		return $idDocumento;
	}

	public function getDocuments()
	{
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM documento WHERE state != :state');
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

	public function aprobarDocumento($idDocument)
	{
		$db = new Connect;
		$insertNewUser = $db->prepare("UPDATE documento SET state=:state WHERE id = :id");
		$insertNewUser->execute([
			':state'   => "Aprobado",
			':id'   => $idDocument
		]);

		return true;
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

	public function updateCorreccionDocument($radicado, $descripcion, $documentos, $idCorreccion){
		$db = new Connect;
		$sql = $db->query("UPDATE documento SET state= 'En Revisión', description= '".$descripcion."', files = '".$documentos."' WHERE id = '" . $radicado . "'");

		$sql2 = $db->query("UPDATE correcciones SET state= 'Corregido' WHERE id = '" . $idCorreccion . "'");

		return $sql2;
	}
}
