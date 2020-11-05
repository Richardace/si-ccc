<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/si-ccc/google-api\vendor\autoload.php'); 
	$gClient = new Google_Client();
	$gClient->setClientId("466390034500-biv2ngcm1f3unftvco3l20kkf7koceg6.apps.googleusercontent.com");
	$gClient->setClientSecret("t0qTov6K-0D-eOSyps-2peRY");
	$gClient->setApplicationName("Vicode Media Login");
	$gClient->setRedirectUri("http://localhost/si-ccc/config/controlGoogle.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/calendar");

	
	// login URL
	$login_url = $gClient->createAuthUrl();
	
?>