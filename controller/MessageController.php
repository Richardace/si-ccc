<?php

class MessageController
{

    public function __construct()
    {
        require_once "model/DAO/MessageDAO.php";
    }

    public function addMessageAdministrador(){
        $message = new MessageDao;
        $idUserSesion = $_POST['idSesion'];
        $destiny = $_POST['destiny'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        $message->insertMessageAdministrador($destiny, $asunto, $mensaje);

        echo "
            <script>
                alert('Mensaje Enviado con Exito');
            </script>
        ";

        $this->administrador($idUserSesion);

    }

    public function addMessageSolicitante(){
        $message = new MessageDao;
        $origin = $_POST['idSesion'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        $message->insertMessageSolicitante($origin, $asunto, $mensaje);

        echo "
            <script>
                alert('Mensaje Enviado con Exito');
            </script>
        ";

        $this->solicitante($origin);
    }

    public function viewNewMessageAdministrador()
    {
        $message = new MessageDao;
        $data['destinatarios'] = $message->getDestinatarios();
        require_once "view/administrator/addMensajeNuevo.php";
    }

    public function viewNewMessageSolicitante()
    {
        $message = new MessageDao;
        require_once "view/solicitante/addMensajeNuevo.php";
    }

    public function administrador($id)
    {

        $message = new MessageDao;
        $data['mensajesRecibidos'] = $message->getMessageRecibidoAdministrador($id);
        $data['mensajes'] = $message->getMessageEnviadoAdministrador($id);

        require_once "view/administrator/message.php";
    }

    public function solicitante($id)
    {
        $message = new MessageDao;
        $data['mensajesRecibidos'] = $message->getMessageRecibido($id);
        $data['mensajes'] = $message->getMessageEnviado($id);
        require_once "view/solicitante/message.php";
    }

    public function getMensajeIDEnviadoAdministrador($id)
    {

        $message = new MessageDao;
        $data['mensajesID'] = $message->getMensajeIDEnviadoAdministrador($id);

        require_once "view/administrator/verMensajeEnviado.php";
    }

    public function getMensajeIDRecibidoAdministrador($id)
    {

        $message = new MessageDao;
        $message->marcarLeidoAdministrador($id);
        $data['mensajesID'] = $message->getMensajeIDRecibidoAdministrador($id);
        

        require_once "view/administrator/verMensajeRecibido.php";
    }

    public function verMensajeEnviadoSolicitante($id)
    {

        $message = new MessageDao;
        $data['mensajesID'] = $message->getMensajeID($id);

        require_once "view/solicitante/verMensajeEnviado.php";
    }

    public function verMensajeRecibidoSolicitante($id)
    {

        $message = new MessageDao;
        $message->marcarLeidoAdministrador($id);
        $data['mensajesID'] = $message->getMensajeID($id);

        require_once "view/solicitante/verMensajeRecibido.php";
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
