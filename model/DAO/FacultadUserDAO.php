<?php

    class FacultadUserDAO {

        public function __construct(){
			require_once($_SERVER['DOCUMENT_ROOT']."/si-ccc/config/database.php");
			require_once($_SERVER['DOCUMENT_ROOT'].'/si-ccc/model/DTO/UserDTO.php');
        }
        
		public function insert($idUser, $idProgram){
            $db = new Connect;
			
			$inserNewUserProgram = $db -> prepare("INSERT INTO facultad_user (user_id, facultad_id) 
											VALUES (:userID, :facultad_id)");
			$inserNewUserProgram -> execute([
				':userID'   => $idUser,
				':facultad_id'   => $idProgram,
			]);
				
			return $inserNewUserProgram;
		}

    }
?>