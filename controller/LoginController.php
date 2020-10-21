<?php
	
	class LoginController {
		
		public function __construct(){
            require_once($_SERVER['DOCUMENT_ROOT']."/si-ccc/model/DAO/UserDAO.php");
            require_once($_SERVER['DOCUMENT_ROOT']."/si-ccc/config/database.php");
        }
        
        function checkUserStatus($id, $sess){
            $db = new Connect;
            $UserDAO = new UserDAO;

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
            
            $correoValido = $UserDAO->validarCorreoAutorizado($data['email']);

            if($correoValido != NULL){
                
                $checkUser = $UserDAO->checkUser($data['idGoogle']);
                $validarDatos = $UserDAO->checkValidarUser($data['idGoogle']);
                $info = $validarDatos -> fetch(PDO::FETCH_ASSOC);
                
                if($checkUser == NULL){
                    
                    $checkIdUser = $UserDAO->checkIdUser($data['email']);
                    $checkIdUserProblema = $UserDAO->checkIdUserProblema($data['email']);
                    $infoUser = $checkIdUserProblema->fetch(PDO::FETCH_ASSOC);

                    if($checkIdUser != NULL){

                        $session = $this -> generateCode(10);
                        $pass = $this -> generateCode(5);
                        $insertNewUser = $UserDAO->newUser($data, $session, $pass, $infoUser['id']);

                        if($insertNewUser){

                            $checkUserEmail = $UserDAO->checkIdUserProblema($data['email']);
                            $info = $checkUserEmail->fetch(PDO::FETCH_ASSOC);
                            setcookie("id", $info['id'], time()+60*60*24*30, "/", NULL);
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
                                header('Location: ../index.php?c=message&a=index');
                            }

                            exit();
                        }else{
                            session_destroy();
                            echo "<script>
                                alert('Error al intentar Insertar sus datos, Verifique su conexion a internet o intente mas tarde');
                                window.location= '../index.php'
                            </script>";
                        }
                    }else{
                        echo "<script>
                                alert('Cuenta de Correo aun no tiene Rol Definido');
                                window.location= '../index.php'
                            </script>";
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
                        header('Location: ../index.php?c=message&a=index');
                    }else{
                        header('Location: ../index.php');
                    }

                    exit();
                }
            }else{

                echo "<script>
                                alert('Cuenta de Correo no esta Autorizada para el acceso a esta Plataforma');
                                window.location= '../index.php'
                    </script>";
            }
        }

        public function index(){
			require_once "view/login/loginUser/index.php";	
        }
        
    }

?>