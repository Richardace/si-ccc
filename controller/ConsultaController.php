<?php
	
	class ConsultaController {
		
		public function __construct(){
			// require_once "models/VehiculosModel.php";
		}

		
        public function administrador(){
            require_once "view/administrator/consultas.php";	
        }

        public function solicitante(){
            require_once "view/solicitante/consultas.php";	
        }
		
    }

?>