<?php

class CorreoController
{

	public function __construct()
	{
		require_once "model/DAO/CorreoDAO.php";
	}

	public function addCorreo()
	{
		$CorreoDAO = new CorreoDAO;
		$email = $_POST['email'];

		// validar si el correo ya existe
		$validar =  $CorreoDAO->getCorreoByEmail($email);

		if ($validar != NULL) {
			echo "
					<script>
							alert('Correo Electronico ya Existe');
							window.location= 'index.php?c=personal&a=administrador'
					</script>
					";
		} else {
			$newCorreo = $CorreoDAO->newCorreo($email);
			echo "
					<script>
							alert('Correo Electronico añadido con Exito');
							window.location= 'index.php?c=personal&a=administrador'
					</script>
					";
		}
	}

	public function eliminarCorreo($id)
	{
		$CorreoDAO = new CorreoDAO;
		$newCorreo = $CorreoDAO->deleteCorreo($id);

		header('Location: index.php?c=personal&a=administrador');
	}

	public function addCorreoByEmail($email){
		$CorreoDAO = new CorreoDAO;
		
		// validar si el correo ya existe
		$validar =  $CorreoDAO->getCorreoByEmail($email);

		if ($validar == NULL) {
			$newCorreo = $CorreoDAO->newCorreo($email);
			return true;
		}else{
			return false;
		}
	}

	public function addCorreoExcel()
	{
		$archivo = $_FILES['excel']['name'];
        $tipo = $_FILES['excel']['type'];
        $destino = "bak_" . $archivo;
        if (copy($_FILES['excel']['tmp_name'], $destino)){
            
        }
        else{
            echo "
				<script>
						alert('error al Cargar el archivo, Intentalo Nuevamente');
						window.location= 'index.php?c=personal&a=administrador'
				</script>
				";
        }
        if (file_exists("bak_" . $archivo)) {
			require_once($_SERVER['DOCUMENT_ROOT']."/si-ccc/config/Classes/PHPExcel.php");
			require_once($_SERVER['DOCUMENT_ROOT']."/si-ccc/config/Classes/PHPExcel/Reader/Excel2007.php");
            $objReader = new PHPExcel_Reader_Excel2007();
            $objPHPExcel = $objReader->load("bak_" . $archivo);
			$objPHPExcel->setActiveSheetIndex(0);
			
			$i = 1;
			$errores = 0;

			$email = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();

			if($email == NULL){
				echo "
					<script>
							alert('Archivo Vacio');
							window.location= 'index.php?c=personal&a=administrador'
					</script>
					";
			}
			while($email != NULL){
				$dato = $this->addCorreoByEmail($email);

				if($dato == false){
					$errores = $errores + 1;
				}

				$i = $i + 1;
				$email = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
			}

			if($errores == ($i-1)){
				echo "
					<script>
							alert('Todos los elementos del Excel ya se encuentran en la Base de Datos');
							window.location= 'index.php?c=personal&a=administrador'
					</script>
					";
			}

			echo "
					<script>
							alert('Correos Electronicos añadidos con exito Nota: Se encontraron elementos $errores repetidos');
							window.location= 'index.php?c=personal&a=administrador'
					</script>
					";
        }
        //si por algo no cargo el archivo bak_ 
        else {
            echo "
					<script>
							alert('Correo Electronico ya Existe');
							window.location= 'index.php?c=personal&a=administrador'
					</script>
					";
        }
	}
}
