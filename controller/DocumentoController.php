<?php

class DocumentoController
{

    public function __construct()
    {
        require_once "model/DAO/DocumentDAO.php";
    }


    public function administrador()
    {
        require_once "view/administrator/documentos.php";
    }

    public function solicitante()
    {
        require_once "view/solicitante/documentos.php";
    }

    public function addDocumentView()
    {
        require_once "view/solicitante/addDocumento.php";
    }

    public function addDocument()
    {
        $usuario = $_POST["usuario"];
        $origen = $_POST["origen"];
        $destino = $_POST["destino"];
        $descripcion = $_POST["descripcion"];
        $titulo = $_POST["titulo"];
        $documentos = $_POST["documentos"];
        $nameFolder = $_POST["nameFolder"];

        $document = new DocumentDAO;

        $sql = $document->addDocument($usuario, $origen, $destino, $titulo, $descripcion, $documentos, $nameFolder);

        if ($sql) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    // Entrada del Evaluador al documento
    public function viewEvaluadorInit()
    {
        require_once "view/evaluador/validarDocumento.php";
    }

    public function validarIdentidad()
    {
        $idUser = $_POST["idUser"];
        $codigoAcceso = $_POST["codigoAcceso"];

        $document = new DocumentDAO;
        $identidad = $document->validadIdentidad($idUser, $codigoAcceso);
        $idDocumento = 0;

        if ($identidad == NULL) {
            echo "<script>
                    alert('No existe Documento vinculado a este codigo de Acceso, Por favor Intentalo Nuevamente');
                    window.location= 'index.php?c=documento&a=viewEvaluadorInit';
                </script>";
        } else {
            foreach ($identidad as $documentoUser) {
                $idDocumento = $documentoUser['id_document'];
            }

            $documento = $document->getDocumentById($idDocumento);

            foreach ($documento as $documentoEvaluador) {
                $estado = $documentoEvaluador['state'];
            }

            if ($estado != "Finalizado") {

                header("Location: index.php?c=documento&a=evaluador&id=$idDocumento");
            } else {
                echo "<script>
                    alert('El documento ya se encuentra en estado FINALIZADO');
                    window.location= 'index.php?c=documento&a=viewEvaluadorInit'
                </script>";
            }
        }
    }

    public function evaluador($id)
    {

        $document = new DocumentDAO;
        $data['documentos'] = $document->getDocumentById($id);
        require_once "view/evaluador/evaluador.php";
    }

    public function descargarDocumentosById($id)
    {

        $document = new DocumentDAO;
        $documento = $document->getDocumentById($id);

        foreach ($documento as $documentoEvaluador) {
            $files = $documentoEvaluador['files'];
            $title = $documentoEvaluador['title'];
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
        
            $zip->addFile(str_replace("../","", $obj2), $dir . "/".basename($obj2));

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
