<?php
	
	class MessageController {
		
		public function __construct(){
            // require_once "models/VehiculosModel.php";
            require_once "model/DAO/MessageDAO.php";

		}
		
        public function administrador($id){
           
            $message = new MessageDao;
            $messager= new MessageDao;
            $data['mensajesR']=$messager->getMessageRecibido($id);
            $data['mensajes'] = $message->getMessageEnviado($id);
    
            require_once "view/administrator/message.php";
            
        }

        public function solicitante(){
            session_start();
            require_once "view/solicitante/message.php";	
        }

        public function viewNewMessageAdministrador(){


            require_once "view/administrator/addMensajeNuevo.php";
        }

        public function verMensaje($id){

         $message = new MessageDao; 
         $data['mensajes'] = $message->getMessageEnviado($id);
        
         require_once "view/administrator/verMensajeEnviado.php";
        }

               public function index(){
            session_start();
            if($_SESSION['rol_id'] == 1){
                require_once "view/administrator/message.php";
            }else if($_SESSION['rol_id'] == 2){
                require_once "view/solicitante/message.php";	
            }else if($_SESSION['rol_id'] == 4){
                require_once "view/default/message.php";	
            }
        }

    }

?>