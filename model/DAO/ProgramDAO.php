<?php

    class ProgramDAO {

		public function getPrograms(){
			$db = new Connect;
			$consulta = $db -> prepare('SELECT * FROM program ORDER BY id');
        	$consulta -> execute();
			$programas = NULL;
			while($row = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$programas[] = $row;
			}
			return $programas;
		}

    }
?>