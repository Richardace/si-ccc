<?php

    class DepartmentDAO {

		public function getDepartamentos(){
			$db = new Connect;
			$consulta = $db -> prepare('SELECT * FROM department ORDER BY id');
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