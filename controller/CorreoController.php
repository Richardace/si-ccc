<?php
	
	class CorreoController {
		
		public function __construct(){
			require_once "model/DAO/CorreoDAO.php";
		}

        public function addCorreo(){
			$CorreoDAO = new CorreoDAO;
			$email = $_POST['email'];

			// validar si el correo ya existe
			$validar =  $CorreoDAO->getCorreoByEmail($email);
			
			if($validar != NULL){
				echo "
					<script>
							alert('Correo Electronico ya Existe');
							window.location= 'index.php?c=personal&a=administrador'
					</script>
					";
			}else{
				$newCorreo = $CorreoDAO->newCorreo($email);
				echo "
					<script>
							alert('Correo Electronico añadido con Exito');
							window.location= 'index.php?c=personal&a=administrador'
					</script>
					";
			}

		}

		public function eliminarCorreo($id){
			$CorreoDAO = new CorreoDAO;
            $newCorreo = $CorreoDAO->deleteCorreo($id);
            
			header('Location: index.php?c=personal&a=administrador');	
		}

		
    }

?>