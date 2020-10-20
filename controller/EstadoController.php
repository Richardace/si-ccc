<?php
	
	class EstadoController {
		
		public function __construct(){
			// require_once "models/VehiculosModel.php";
		}

		
        public function administrador(){
            require_once "view/administrator/estados.php";	
        }

        public function solicitante(){
            require_once "view/solicitante/estados.php";	
        }
		
    }

?>