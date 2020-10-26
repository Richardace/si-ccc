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
}
