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


        public function descargarDocumentosEvaluador($id){

            $document = new DocumentDAO;
            $documento = $document->getDocumentEvaluadorById($id);
    
            foreach ($documento as $documentoEvaluador) {
                $files = $documentoEvaluador['files'];
                $title = "Documentos Evaluador";
            }
    
            $zip = new ZipArchive();
            // Creamos y abrimos un archivo zip temporal
            $zip->open("documentos.zip", ZipArchive::CREATE);
            // Añadimos un directorio
            $dir = $title;
            $zip->addEmptyDir($dir);
            // Añadimos un archivo en la raid del zip.
            //$zip->addFile("index.php", "index.php");
            //Añadimos un archivo dentro del directorio que hemos creado
    
            $obj = json_decode($files);
    
            for ($i = 0; $i <= count($obj); $i++) {
    
                $obj2 = $obj[$i]->elemento;
    
                $zip->addFile(str_replace("../", "", $obj2), $dir . "/" . basename($obj2));
            }
    
            // Una vez añadido los archivos deseados cerramos el zip.
            $zip->close();
            // Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
            header("Content-type: application/octet-stream");
            header("Content-disposition: attachment; filename=documentos.zip");
            // leemos el archivo creado
            readfile('documentos.zip');
            // Por último eliminamos el archivo temporal creado
            unlink('documentos.zip'); //Destruye el archivo temporal
    
        }
		
    }
