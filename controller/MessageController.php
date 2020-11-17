<?php

class MessageController
{

    public function __construct()
    {
        require_once "model/DAO/MessageDAO.php";
    }

    public function administrador($id)
    {

        $message = new MessageDao;
        $data['mensajesRecibidos'] = $message->getMessageRecibido($id);
        $data['mensajes'] = $message->getMessageEnviado($id);

        require_once "view/administrator/message.php";
    }

    public function solicitante($id)
    {
        $message = new MessageDao;
        $data['mensajesRecibidos'] = $message->getMessageRecibido($id);
        $data['mensajes'] = $message->getMessageEnviado($id);
        require_once "view/solicitante/message.php";
    }

    public function viewNewMessageAdministrador()
    {


        require_once "view/administrator/addMensajeNuevo.php";
    }

    public function verMensaje($id)
    {

        $message = new MessageDao;
        $data['mensajesID'] = $message->getMensajeID($id);

        require_once "view/administrator/verMensajeEnviado.php";
    }

    public function index()
    {
        session_start();
        if ($_SESSION['rol_id'] == 1) {
            header('Location: index.php?c=message&a=administrador&id='.$_SESSION['id']);
        } else if ($_SESSION['rol_id'] == 2) {
            header('Location: index.php?c=message&a=solicitante&id='.$_SESSION['id']);
        } else if ($_SESSION['rol_id'] == 4) {
            require_once "view/default/message.php";
        }
    }
}
