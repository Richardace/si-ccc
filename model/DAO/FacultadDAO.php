<?php

    class FacultadDAO {

		public function getFacultades(){
			$db = new Connect;
			$consulta = $db -> prepare('SELECT * FROM facultad ORDER BY id');
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