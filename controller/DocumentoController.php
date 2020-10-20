<?php
	
	class DocumentoController {
		
		public function __construct(){
			// require_once "models/VehiculosModel.php";
		}

		
        public function administrador(){
            require_once "view/administrator/documentos.php";	
        }
        
        public function solicitante(){
            require_once "view/solicitante/documentos.php";	
        }

    }

?>