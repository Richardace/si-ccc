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
    }

?>