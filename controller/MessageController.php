<?php
	
	class MessageController {
		
		public function __construct(){
            // require_once "models/VehiculosModel.php";
            require_once "model/DAO/MessageDAO.php";

		}
		
        public function administrador(){
            session_start();
            require_once "view/administrator/message.php";	
        }

        public function solicitante(){
            session_start();
            require_once "view/solicitante/message.php";	
        }

        public function viewNewMessageAdministrador(){


            require_once "view/administrator/addMensajeNuevo.php";
        }

        //Metodo creado para listar mensaje ->Prueba
        public function viewListDocument(){
            $message = null;
            $message = new MessageDao;
            $data['mensajes'] = $message->getMessage();
    
            require_once "view/administrator/message.php";
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