<?php
	
	class SesionController {
		
		public function __construct(){
			require_once "model/DAO/SesionDAO.php";
		}

		
        public function administrador(){
            $sesionDAO = new SesionDAO;
            
            $data['sesiones'] = $sesionDAO->getSesiones();

            require_once "view/administrator/sesion.php";
        }

        public function addSesionView(){
            require_once "view/administrator/addSesion.php";
        }

        public function addSesion(){
            $sesionDAO = new SesionDAO;

            $fechaSesion = $_POST['dateSesion'];
            $fechaLimite = $_POST['dateLimite'];
            $semestre = $_POST['semestre'];
            $anio = $_POST['anio'];

            $sesionDAO->addSesion($fechaSesion, $fechaLimite, $semestre, $anio);

            echo "<script>
                alert('Sesión añadida con Exito !');
            </script>";
            $this->administrador();

        }

        public function changeState($id){
            $sesionDAO = new SesionDAO;
            $sesionDAO->changeState($id);
            $this->administrador();
        }

        public function changeStateView($id){
            $sesionDAO = new SesionDAO;
            $sesionDAO->changeStateView($id);
            $this->administrador();
        }

        public function updateSesionView($id){
            $sesionDAO = new SesionDAO;
            $data['sesion'] = $sesionDAO->getSesionById($id);
            
            require_once "view/administrator/updateSesionView.php";
        }

        public function updateSesion(){
            $sesionDAO = new SesionDAO;

            $idSesion = $_POST['idSesion'];
            $fechaSesion = $_POST['dateSesion'];
            $fechaLimite = $_POST['dateLimite'];
            $semestre = $_POST['semestre'];
            $anio = $_POST['anio'];

            $sesionDAO->updateSesion($idSesion, $fechaSesion, $fechaLimite, $semestre, $anio);

            echo "<script>
                alert('Ajustes Realizados con Exito !');
            </script>";
            $this->administrador();

        }

        public function updateDocumentConfig(){
            $dateActual = $_POST['dateActual'];
            $documentos = $_POST['documentos'];
            
            $sesionDAO = new SesionDAO;
            
            $sql = $sesionDAO->saveDocumentSesion($documentos, $dateActual);
    
            if ($sql) {
                echo "ok";
            } else {
                echo "error";
            }
        }

        public function descargarDocumentosById()
        {
    
            $sesionDAO = new SesionDAO;
            $sesion = $sesionDAO->getDocumentSesion();
    
            foreach ($sesion as $documento) {
                $archivo = $documento['valor'];
                
            }
    
            $zip = new ZipArchive();
            // Creamos y abrimos un archivo zip temporal
            $zip->open("documentos.zip", ZipArchive::CREATE);
            // Añadimos un directorio
            
            $dir = "Sesión Actual";
            $zip->addEmptyDir($dir);
            // Añadimos un archivo en la raid del zip.
            //$zip->addFile("index.php", "index.php");
            //Añadimos un archivo dentro del directorio que hemos creado
    
            $obj = json_decode($archivo);

            $obj2 = $obj[0]->elemento;
    
            $zip->addFile(str_replace("../", "", $obj2), $dir . "/" . basename($obj2));

    
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

        public function openUploadDocumentSesion(){
            $sesionDAO = new SesionDAO;

            $data['documento'] = $sesionDAO->getDocumentSesion();
            require_once "view/administrator/uploadDocumentSesion.php";
        }
		
    }

?>