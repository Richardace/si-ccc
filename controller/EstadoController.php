<?php
	
	class EstadoController {
		
		public function __construct(){
			require_once "model/DAO/DocumentDAO.php";
		}

		
        public function administrador(){
            $document = new DocumentDAO;
            $data['documentos'] = $document->getDocuments();
            require_once "view/administrator/estados.php";
        }

        public function solicitante(){
            require_once "view/solicitante/estados.php";	
        }
		
    }

?>