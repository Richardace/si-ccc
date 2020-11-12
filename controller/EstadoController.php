<?php
	
	class EstadoController {
		
		public function __construct(){
			require_once "model/DAO/DocumentDAO.php";
		}

		
        public function administrador(){
            $document = new DocumentDAO;
            $data['documentos'] = $document->getDocuments();
            

            if($data['documentos'] != NULL){
                foreach ($data['documentos'] as $sesiones) {
                    $titleMemory = $sesiones['anio'].$sesiones['semestre'];
                    $data[$titleMemory] = $document->getPeriodos($sesiones['anio'], $sesiones['semestre']);
    
    
                    foreach ($data[$titleMemory] as $documentsBySesion){
    
                        $newTitle = $sesiones['anio'].$sesiones['semestre'].$documentsBySesion['id'];
    
                        $data[$newTitle] = $document->getDocumentsByPeriodo($documentsBySesion['id']);
    
                    }
                }
            }
            

            require_once "view/administrator/estados.php";
        }

        public function solicitante(){
            require_once "view/solicitante/estados.php";	
        }
		
    }

?>