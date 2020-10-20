<?php
	
	class LoginController {
		
		public function __construct(){
            require_once($_SERVER['DOCUMENT_ROOT']."/si-ccc/model/DAO/UserDAO.php");
            require_once($_SERVER['DOCUMENT_ROOT']."/si-ccc/config/database.php");
        }
        
        // check if user is logged in
        function checkUserStatus($id, $sess){
            $db = new Connect;
            $UserDAO = new UserDAO;

            // Consulta a la Base de Datos si el Usuario esta Activo
            $user = $UserDAO->checkStatus((intval($id)), $sess);

            $userInfo = $user->fetch(PDO::FETCH_ASSOC);
            
            if(!$userInfo){
                return true;
            } else {
                if($userInfo["id"] != 0){
                    return true;
                }else{
                    return false;
                }           
        }
    }

        // function for generating password and login session
        function generateCode($length){
            $chars = "vwxyzABCD02789";
            $code = ""; 
            $clen = strlen($chars) - 1;
            while (strlen($code) < $length){ 
                $code .= $chars[mt_rand(0,$clen)];
            }
            return $code;
        }
        
        function insertData($data){
            $db = new Connect;
            $UserDAO = new UserDAO;

            // Consulta a la Base de Datos si el Usuario ya tiene la cuenta Activa
            $checkUser = $UserDAO->checkUser($data['idGoogle']);

            $info = $checkUser -> fetch(PDO::FETCH_ASSOC);
            

            if(!$info["idGoogle"]){

                // Se extrae el ID del Correo
                $checkIdUser = $UserDAO->checkIdUser($data['email']);
                $infoUser = $checkIdUser -> fetch(PDO::FETCH_ASSOC);

                $session = $this -> generateCode(10);
                $pass = $this -> generateCode(5);

                $insertNewUser = $UserDAO->newUser($data, $session, $pass, $infoUser['id']);
                

                if($insertNewUser){



                    $checkUser = $UserDAO->checkUser($data['email']);
                    $info = $checkUser -> fetch(PDO::FETCH_ASSOC);

                    setcookie("id", $infoUser['id'], time()+60*60*24*30, "/", NULL);
                    setcookie("sess", $session, time()+60*60*24*30, "/", NULL);

                    session_start();
                    $_SESSION['id'] = $info['id'];
                    $_SESSION['name'] = $info['firstName'];
                    $_SESSION['lastName'] = $info['lastName'];
                    $_SESSION['email'] = $info['email'];
                    $_SESSION['rol_id'] = $info['rol_id'];


                    if($info['rol_id'] == 1){
                        header('Location: ../index.php?c=message&a=administrador');
                    } else if($info['rol_id'] == 2){
                        header('Location: ../index.php?c=message&a=solicitante');
                    }else if($info['rol_id'] == 4){
                        header('Location: ../index.php?c=message&a=default');
                    }

                    exit();
                }else{
                    session_destroy();
                    return "Error inserting user!";
                }
            }else{
                setcookie("id", $info['id'], time()+60*60*24*30, "/", NULL);
                setcookie("sess", $info["sess"], time()+60*60*24*30, "/", NULL);

                session_start();
                $_SESSION['id'] = $info['id'];
                $_SESSION['name'] = $info['firstName'];
                $_SESSION['lastName'] = $info['lastName'];
                $_SESSION['email'] = $info['email'];
                $_SESSION['rol_id'] = $info['rol_id'];

                if($info['rol_id'] == 1){
                    header('Location: ../index.php?c=message&a=administrador');
                } else if($info['rol_id'] == 2){
                    header('Location: ../index.php?c=message&a=solicitante');
                }else if($info['rol_id'] == 4){
                    header('Location: ../index.php?c=message&a=default');
                }else{
                    header('Location: ../index.php');
                }

                
                exit();
            }
        }



        // Anterior

		public function index(){
			require_once "view/login/loginUser/index.php";	
        }
        
        // public function validar(){

        //     $email = $_POST['email'];
        //     $password = $_POST['password'];
            
        //     $user = new UserDAO();
		// 	$usuario = $user->validarUsuario($email, $password);
		// 	if($usuario == NULL){
        //         $data['error'] = true;
        //         $data['errorContra'] = false;
        //         $data['aprovContra'] = false;  
        //         require_once "view/login/loginUser/index.php";	
        //     }else{
        //         session_start();
        //         $_SESSION['id'] = $usuario->getId();
        //         $_SESSION['name'] = $usuario->getName();
        //         $_SESSION['lastName'] = $usuario->getLastName();
        //         $_SESSION['email'] = $usuario->getEmail();
        //         $_SESSION['phone'] = $usuario->getPhone();
        //         $_SESSION['register_date'] = $usuario->getRegisterDate();
        //         $_SESSION['password'] = $usuario->getPassword();
        //         $_SESSION['state'] = $usuario->getState();
        //         $_SESSION['rol_id'] = $usuario->getRolId();
                

        //         if($_SESSION['rol_id'] == 1){
        //             require_once "view/administrator/message.php";
        //         }else if($_SESSION['rol_id'] == 2){
        //             require_once "view/user/message.php";
        //         }
                
        //     }
        // }

        // public function recContra(){

        //     $email = $_POST['email'];
        //     $user = new UserDAO();
        //     $usuario = $user->recContra($email);
        //     if($usuario == NULL){
        //         $data['errorContra'] = true; 
        //         $data['error'] = false;
        //         $data['aprovContra'] = false;
        //         require_once "view/login/loginUser/index.php";	
        //     }else{

        //         $para      = $email;
        //         $asunto    = 'CAMBIO DE CONTRASEÑA - SICCC';
        //         $descripcion   = '
        //             Usted ha solicitado cambio de contraseña mediante la plataforma SI-CCC de la Universidad Francisco de Paula Santander 
        //             Ingrese al siguiente enlace para asignar nueva contraseña a su Cuenta de SICCC

        //             Enlace: http://localhost/si-ccc/index.php?l=login&a=changePasswordView&id='.$usuario->getId().'

        //             Este Fue un mensaje Automatico, por favor no intente responder a este correo, ya que no será respondido.
        //         ';
        //         $de = 'From: richardacevedo98@gmail.com';
                
        //         if (mail($para, $asunto, $descripcion, $de))
        //         {
        //             $data['aprovContra'] = true;
        //             $data['error'] = false;
        //             $data['errorContra'] = false;
        //         }

        //         require_once "view/login/loginUser/index.php";	

        //     }
        // }

        // public function changePasswordView($id){
        //     $data['id'] = $id;
        //     require_once "view/login/changePassword/index.php";	
        // }

        // public function changePassword(){
        //     $idUser = $_POST['idUser'];
        //     $password = $_POST['password'];

        //     $user = new UserDAO();
        //     $usuario = $user->changePassword($idUser, $password);

        //     echo "<script>alert('Contraseña Cambiada con Exito!')</script>";

        //     $data['error'] = false;
        //     $data['errorContra'] = false;
        //     $data['aprovContra'] = false;
        //     require_once "view/login/loginUser/index.php";



        // }



    }

?>