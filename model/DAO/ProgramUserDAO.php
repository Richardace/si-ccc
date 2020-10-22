<?php

    class ProgramUserDAO {

        public function __construct(){
			require_once($_SERVER['DOCUMENT_ROOT']."/si-ccc/config/database.php");
			require_once($_SERVER['DOCUMENT_ROOT'].'/si-ccc/model/DTO/UserDTO.php');
        }
        
		public function insert($idUser, $idProgram){
            $db = new Connect;
			
			$inserNewUserProgram = $db -> prepare("INSERT INTO program_user (user_id, program_id, entry_date, exit_date) 
											VALUES (:userID, :programID, '', '')");
			$inserNewUserProgram -> execute([
				':userID'   => $idUser,
				':programID'   => $idProgram,
			]);
				
			return $inserNewUserProgram;
		}

    }
?>