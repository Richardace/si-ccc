<?php

    class DepartmentUserDAO {

        public function __construct(){
			require_once($_SERVER['DOCUMENT_ROOT']."/si-ccc/config/database.php");
			require_once($_SERVER['DOCUMENT_ROOT'].'/si-ccc/model/DTO/UserDTO.php');
        }
        
		public function insert($idUser, $idProgram){
            $db = new Connect;
			
			$inserNewUserProgram = $db -> prepare("INSERT INTO department_user (user_id, department_id, entry_date, exit_date) 
											VALUES (:userID, :department_id, '', '')");
			$inserNewUserProgram -> execute([
				':userID'   => $idUser,
				':department_id'   => $idProgram,
			]);
				
			return $inserNewUserProgram;
		}

    }
?>