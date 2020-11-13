<?php
	
	class MessageDao {
		
		
		
		//Metodo creado para listar mensaje ->Prueba

		public function getMessageEnviado($id_user){
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


		public function getMensajeID($id_user){
			$db = new Connect;
			$consulta = $db->prepare("SELECT user_id_destiny, description, title, state FROM messages WHERE user_id_origin = :id_user");
			$consulta->execute([
				':id_user' => $id_user
			]);
			$mensajes = NULL;
			while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
				$mensajes[] = $row;
			}
			return $mensajes;
		}
		
    }

?>