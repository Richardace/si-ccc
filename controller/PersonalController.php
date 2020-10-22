<?php
	
	class PersonalController {
		
		public function __construct(){
            require_once "model/DAO/UserDAO.php";
            require_once "model/DAO/CorreoDAO.php";
            require_once "model/DAO/ProgramDAO.php";
            require_once "model/DAO/ProgramUserDAO.php";
		}

		
        public function administrador(){

            $user = new UserDAO();
            $correo = new CorreoDAO();
            $data["correos"] = $correo->getCorreos();
            $data["solicitante"] = $user->getSolicitantes();
            $data["evaluador"] = $user->getEvaluadores();
            $data["administrador"] = $user->getAdministradores();

            require_once "view/administrator/personal.php";	
        }

        public function solicitante(){
            require_once "view/solicitante/personal.php";	
        }

        public function addSolicitanteView($id){
            $programas = new ProgramDAO;
            $correo = new CorreoDAO();
            $data["correo"] = $correo->getCorreo($_GET["id"]);
            $data["programas"] = $programas->getPrograms();
            require_once "view/administrator/addSolicitante.php";	
        }

        public function addSolicitante(){
            $programUser = new ProgramUserDAO;
            $user = new UserDAO();

            $dependency = $_POST['dependency'];
            if($dependency == "program"){
                $state = $_POST['state'];
                $idProgram = $_POST['idProgram'];
                $correo = $_POST['correo'];

                $insertNewUser = $user->insert($correo, $state, 2);
                $cuentaRegistrada = $user->getUserByEmail($correo);
                foreach($cuentaRegistrada as $cuenta) {
                    $idUser = $cuenta['id'];
                }
                $inserNewProgramUser = $programUser->insert($idUser, $idProgram);



                $this->administrador();


            }
        }
		
    }

?>