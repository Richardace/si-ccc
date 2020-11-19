<?php

class DocumentDAO
{
	public function addDocument($usuario, $titulo, $descripcion, $documentos, $nameFolder)
	{
		$db = new Connect;
		$sql = $db->query("INSERT INTO documento(radicado, id_user, sesion, dateRegister, title, description, files, state, nameFolder) VALUES('','" . $usuario . "', '', NULL , '" . $titulo . "', '" . $descripcion . "', '" . $documentos . "', 'Radicado', '" . $nameFolder . "') ");

		$consulta = $db->prepare('SELECT * FROM documento WHERE nameFolder=:nameFolder');
		$consulta->execute([
			':nameFolder'   => $nameFolder,
		]);
		$documento = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$documento = $row['id'];
		}

		$sql2 = $db->query("INSERT INTO state_documents(id_document, date_action, description) VALUES('" . $documento . "', NULL , 'Creación de la Solicitud') ");
		return $sql;
	}

	public function addCorreccionDocument($idDocumento, $descripcion, $documentos, $nameFolder)
	{
		$db = new Connect;
		$sql3 = $db->query("INSERT INTO state_documents(id_document, date_action, description) VALUES('" . $idDocumento . "', NULL , 'Se devuelve el documento a la dependencia con correcciones') ");
		$sql = $db->query("INSERT INTO correcciones(id_document, date_correccion, observaciones, documentos, folder, state) 
												VALUES('" . $idDocumento . "',  NULL , '" . $descripcion . "', '" . $documentos . "', '" . $nameFolder . "', 'Pendiente') ");
		$sql2 = $db->query("UPDATE documento SET state= 'Devuelto con correcciones' WHERE id = '" . $idDocumento . "'");


		return $sql;
	}

	public function addRevisionDocument($idDocumentoEvaluador, $descripcion, $documentos, $idDocumento, $mensaje){
		$db = new Connect;
		if($mensaje != ""){
			$sql1 = $db->query("UPDATE documento SET state= 'Revisado Por Evaluador' WHERE id = '" . $idDocumento . "'");
			$sql3 = $db->query("INSERT INTO state_documents(id_document, date_action, description) VALUES('" . $idDocumento . "', NULL , '".$mensaje."') ");
		}
		
		$sql2 = $db->query("UPDATE documento_evaluador SET observaciones= '" . $descripcion . "' , files= '" . $documentos . "' WHERE id = '" . $idDocumentoEvaluador . "'");

		return $sql2;
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

	public function changeStateDocument($idDocument, $newState){
		$db = new Connect;

		$sql3 = $db->query("INSERT INTO state_documents(id_document, date_action, description) VALUES('" . $idDocument . "', NULL , 'Se cambio el estado del documento a: ".$newState."') ");
		
		$changeState = $db->prepare("UPDATE documento SET state=:newState WHERE id=:idDocumento");
		$changeState->execute([
			':idDocumento'   => $idDocument,
			':newState'   => $newState
		]);

		return true;
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
		$consulta = $db->prepare('SELECT * FROM correcciones WHERE id_document=:id ORDER BY date_correccion DESC');
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

	public function getDocumentsByIdUser($id)
	{
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM documento WHERE id_user = :idUser');
		$consulta->execute([
			':idUser' => $id
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

	public function getDocumentByIdEvaluadorDocumento($idCorreccion){
		
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM documento_evaluador WHERE id = :id');
		$consulta->execute([
			':id' => $idCorreccion
		]);
		$idDocumento = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {

			$idDocumento = $row['id_document'];
		}
		return $idDocumento;
	}

	public function getDocumentEvaluadorById($id){
		
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM documento_evaluador WHERE id = :id');
		$consulta->execute([
			':id' => $id
		]);
		$idDocumento = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {

			$idDocumento[] = $row;
		}
		return $idDocumento;
	}

	public function getDocuments()
	{
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;

		$userDAO = new UserDAO;
		$consulta = $db->prepare("SELECT DISTINCT semestre, anio FROM sesiones WHERE stateView='Visible' ORDER BY id desc");
		$consulta->execute();

		$semestres = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$semestres[] = $row;


		}
		return $semestres;
	}

	public function getPeriodos($x, $a){
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;

		$userDAO = new UserDAO;
		$consulta = $db->prepare("SELECT * from sesiones WHERE semestre=:semestre AND anio=:anio AND stateView='Visible'");
		$consulta->execute([
			"semestre" => $a,
			"anio" => $x
		]);

		$semestres = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$semestres[] = $row;


		}
		return $semestres;
	}

	public function getDocumentsByPeriodo($idSesion){
		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM documento WHERE sesion = :sesion');
		$consulta->execute([
			':sesion'   => $idSesion
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
			$row['fullName'] = $userDAO->getNameAndLastNameById($row['id_user']);
			$row['emailUser'] = $userDAO->getEmailByIdUser($row['id_user']);
			$documentos[] = $row;
		}
		return $documentos;
	}

	public function getEstadosDocumento($idDocument){
		
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM state_documents WHERE id_document=:id ORDER BY id DESC');
		$consulta->execute([
			':id'   => $idDocument
		]);
		$estados = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$estados[] = $row;
		}
		return $estados;
	}

	public function getEvaluadoresDocument($idDocumento)
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

	public function getDocumentEvaluadorEspecifico($idDocumentoEvaluador)
	{
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM documento_evaluador WHERE id=:id');
		$consulta->execute([
			':id'   => $idDocumentoEvaluador
		]);
		$documentos = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$row['fullName'] = $userDAO->getNameAndLastNameById($row['id_user']);
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

	public function insertDocumentToEvaluate($idUser, $idDocument, $fechaLimit, $token, $mensaje)
	{
		$db = new Connect;

		if($mensaje != ''){
			$sql2 = $db->query("INSERT INTO state_documents(id_document, date_action, description) VALUES('" . $idDocument . "', NULL , '".$mensaje."') ");
			
		}
		
		$insertDocumentEvaluador = $db->prepare("INSERT INTO documento_evaluador (id_user, id_document, dateLimit, dateRegister, observaciones, files, key_access) 
										VALUES (:userID, :documentID, :dateLimit, NULL, '', '', :keyAccess)");
		$insertDocumentEvaluador->execute([
			':userID'   => $idUser,
			':documentID'   => $idDocument,
			':dateLimit'   => $fechaLimit,
			':keyAccess'   => $token
		]);

		return $insertDocumentEvaluador;
	}

	public function changeEvaluadorDocument($idDocumentEvaluador, $idDocument, $idUser , $mensaje)
	{
		$db = new Connect;

		if($mensaje != ''){
			$sql2 = $db->query("INSERT INTO state_documents(id_document, date_action, description) VALUES('" . $idDocument . "', NULL , '".$mensaje."') ");
			
		}
		
		$insertDocumentEvaluador = $db->prepare("UPDATE documento_evaluador SET id_user=:newIdUser WHERE id=:idDocumentEvaluador");
		$insertDocumentEvaluador->execute([
			':newIdUser'   => $idUser,
			':idDocumentEvaluador' => $idDocumentEvaluador
		]);

		return $insertDocumentEvaluador;
	}

	public function guardarInfoDocumento($idDocument, $sesion, $radicado){
		$db = new Connect;

		// Change State Document
		$changeState = $db->prepare("UPDATE documento SET radicado=:radicado, sesion=:sesion, state=:state WHERE id=:idDocumento");

		$changeState->execute([
			':radicado'   => $radicado,
			':sesion'   => $sesion,
			':idDocumento'   => $idDocument,
			':state'   => "Asignado a Evaluadores"
		]);

		return $changeState;
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
				':newState'   => "Asignado a Evaluadores"
			]);
			while ($row2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
				$tokensActivos[] = $documentoEvaluador;
			}
		}
		return $tokensActivos;
	}

	public function getCorreoByDocument($idDocument){
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;
		$userDAO = new UserDAO;
		$consulta = $db->prepare('SELECT * FROM documento WHERE id=:id');
		$consulta->execute([
			':id'   => $idDocument
		]);
		$idDependencia = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {			
			$idDependencia = $row['id_user'];
		}
		return $idDependencia;
	}

	public function getRadicadoByIdDocument($radicado){
		require_once "model/DAO/UserDAO.php";
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM documento WHERE id=:id');
		$consulta->execute([
			':id'   => $radicado
		]);
		$documento = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {			
			$documento = $row;
		}
		return $documento;
	}

	public function updateCorreccionDocument($idDocumento, $descripcion, $documentos, $idCorreccion){
		$db = new Connect;

		$sql3 = $db->query("INSERT INTO state_documents(id_document, date_action, description) VALUES('" . $idDocumento . "', NULL , 'Documento regresado con correcciones por parte de la dependencia') ");

		// CORREO PARA ADMINISTRADORE CON NOTIFICACION

		$sql = $db->query("UPDATE documento SET state= 'En Revisión', description= '".$descripcion."', files = '".$documentos."' WHERE id = '" . $idDocumento . "'");

		$sql2 = $db->query("UPDATE correcciones SET state= 'Corregido' WHERE id = '" . $idCorreccion . "'");

		return $sql2;
	}

	public function getSesionesActivas(){
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM sesiones WHERE state=:state');
		$consulta->execute([
			':state'   => "Activo"
		]);
		$sesiones = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			
			$sesiones[] = $row;
		}
		return $sesiones;
	}
}
