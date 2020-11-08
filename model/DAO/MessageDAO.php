<?php
	
	class MessageDao {
		
		private $db;
		private $messages;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->messages = array();
		}
		
		public function getMessages()
		{
			$sql = "SELECT * FROM message";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->messages[] = $row;
			}
			return $this->messages;
		}
		
		//Metodo creado para listar mensaje ->Prueba
		public function getMessage(){
			$db = new Connect;
			$consulta = $db->prepare("SELECT * FROM messages WHERE state != :state'");
			$consulta->execute([
				':state' => "Leido"
			]);
			$mensajes = NULL;
			while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
				$mensajes[] = $row;
			}
			return $mensajes;
		}
    }

?>