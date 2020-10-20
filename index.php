<?php
	
	require_once "config/config.php";
	require_once "core/routes.php";
	require_once "config/database.php";
	require_once "controller/MessageController.php";
	require_once "controller/LoginController.php";


	if(isset($_COOKIE['id']) && isset($_COOKIE['sess'])){
		$Controller = new LoginController;
		if($Controller -> checkUserStatus($_COOKIE['id'], $_COOKIE['sess'])){

			if(isset($_GET['c'])){
			
				$controlador = cargarControlador($_GET['c']);
				
				if(isset($_GET['a'])){
					if(isset($_GET['id'])){
						cargarAccion($controlador, $_GET['a'], $_GET['id']);
					} else {
						cargarAccion($controlador, $_GET['a']);
					}
				} else {
					cargarAccion($controlador, ACCION_PRINCIPAL);
				}
				
			} else {
				
				$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
				$accionTmp = ACCION_PRINCIPAL;
				$controlador->$accionTmp();
			}
		}
		
	} else {

		if(isset($_GET['l'])){

			$controlador = cargarControlador($_GET['l']);

			if(isset($_GET['a'])){
				if(isset($_GET['id'])){
					cargarAccion($controlador, $_GET['a'], $_GET['id']);
				} else {
					cargarAccion($controlador, $_GET['a']);
				}
			}
		}else{
			
			$controlador = cargarControlador(LOGIN);
			$accionTmp = ACCION_PRINCIPAL;
			$controlador->$accionTmp();
		}


	

	}

?>