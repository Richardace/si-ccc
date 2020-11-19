<?php

class MessageDao
{	
	public function __construct(){
		require_once "model/DAO/UserDAO.php";
	}

	public function insertMessageAdministrador($destiny, $asunto, $mensaje){
		$db = new Connect;	
		$sql = $db->query("INSERT INTO messages(user_id_origin, user_id_destiny, title, description, dateMessage, state) 
		VALUES(0,  '" . $destiny . "' , '" . $asunto . "', '" . $mensaje . "', NULL , 'No Leido') ");
	}

	public function insertMessageSolicitante($origin, $asunto, $mensaje){
		$db = new Connect;	
		$sql = $db->query("INSERT INTO messages(user_id_origin, user_id_destiny, title, description, dateMessage, state) 
		VALUES('" . $origin . "', 0 , '" . $asunto . "', '" . $mensaje . "', NULL , 'No Leido') ");
	}

	public function getDestinatarios(){
		$db = new Connect;
		$userDAO = new UserdAO;
		$consulta = $db->prepare("SELECT * FROM user WHERE rol_id = :rol");
		$consulta->execute([
			':rol' => 2
		]);
		$destinatarios = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$row['fullName'] = $userDAO->getNameAndLastNameById($row['id']);
			$destinatarios[] = $row;
		}
		return $destinatarios;
	}

	public function getMessageEnviadoAdministrador($id_user)
	{
		$db = new Connect;
		$userDAO = new UserdAO;
		$consulta = $db->prepare("SELECT * FROM messages WHERE user_id_origin = :id_user");
		$consulta->execute([
			':id_user' => 0
		]);
		$mensajes = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$row['fullName'] = $userDAO->getNameAndLastNameById($row['user_id_destiny']);
			$mensajes[] = $row;
		}
		return $mensajes;
	}

	public function getMessageRecibidoAdministrador()
	{
		$db = new Connect;
		$userDAO = new UserdAO;
		$consulta = $db->prepare("SELECT * FROM messages WHERE user_id_destiny = :id_user");
		$consulta->execute([
			':id_user' => 0
		]);
		$mensajes = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$row['fullName'] = $userDAO->getNameAndLastNameById($row['user_id_origin']);
			$mensajes[] = $row;
		}
		return $mensajes;
	}

	public function getMessageEnviado($id_user)
	{
		$db = new Connect;
		$consulta = $db->prepare("SELECT * FROM messages WHERE user_id_origin = :id_user");
		$consulta->execute([
			':id_user' => $id_user
		]);
		$mensajes = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$mensajes[] = $row;
		}
		return $mensajes;
	}

	public function getMessageRecibido($id_user)
	{
		$db = new Connect;
		$consulta = $db->prepare("SELECT * FROM messages WHERE user_id_destiny = :id_user");
		$consulta->execute([
			':id_user' => $id_user
		]);
		$mensajes = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$mensajes[] = $row;
		}
		return $mensajes;
	}

	public function getMensajeID($id_user)
	{
		$db = new Connect;
		
		$consulta = $db->prepare("SELECT user_id_destiny, description, title, state FROM messages WHERE id = :id_user");
		$consulta->execute([
			':id_user' => $id_user
		]);
		$mensajes = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$mensajes[] = $row;
		}
		return $mensajes;
	}

	public function getMensajeIDEnviadoAdministrador($idMessage)
	{
		$db = new Connect;
		$userDAO = new UserdAO;
		$consulta = $db->prepare("SELECT * FROM messages WHERE id = :idMessage");
		$consulta->execute([
			':idMessage' => $idMessage
		]);
		$mensajes = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$row['fullName'] = $userDAO->getNameAndLastNameById($row['user_id_destiny']);
			$mensajes[] = $row;
		}
		return $mensajes;
	}

	public function getMensajeIDRecibidoAdministrador($idMessage)
	{
		$db = new Connect;
		$userDAO = new UserdAO;
		$consulta = $db->prepare("SELECT * FROM messages WHERE id = :idMessage");
		$consulta->execute([
			':idMessage' => $idMessage
		]);
		$mensajes = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$row['fullName'] = $userDAO->getNameAndLastNameById($row['user_id_origin']);
			$mensajes[] = $row;
		}
		return $mensajes;
	}

	public function marcarLeidoAdministrador($id){
		$db = new Connect;
		$sql2 = $db->query("UPDATE messages SET state= 'Leido' WHERE id = '" . $id . "'");
	}

}
