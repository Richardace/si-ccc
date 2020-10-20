<?php
	
	// CONSTANTES DEL APLICATIVO
	define("CONTROLADOR_PRINCIPAL", "Message");
	define("ACCION_PRINCIPAL", "index");
	define("LOGIN", "Login");

	// AUTENTICACION GOOGLE
	require_once 'google-api\vendor\autoload.php'; 
	$gClient = new Google_Client();
	$gClient->setClientId("639740004339-0dm18jadol1jg6nvh4a62q7u4mh5sosl.apps.googleusercontent.com");
	$gClient->setClientSecret("nWspZaaDUmtGrLvKr_bDIhsZ");
	$gClient->setApplicationName("Vicode Media Login");
	$gClient->setRedirectUri("http://localhost/si-ccc/config/controlGoogle.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/calendar");

	// login URL
	$login_url = $gClient->createAuthUrl();
	
?>