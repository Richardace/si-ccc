<?php
require_once "../controller/LoginController.php";
require_once "../view/login/loginEvaluador/config.php";

if (isset($_GET['code'])) {
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']); 
}else{
    header('Location: ../index.php');
    exit();
}

if(isset($token["error"]) != "invalid_grant"){
    
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    
    $Controller = new LoginController;
    echo $Controller -> insertData(
        array(
            'email' => $userData['email'],
            'avatar' => $userData['picture'],
            'picture' => $userData['picture'],
            'familyName' => $userData['familyName'],
            'givenName' => $userData['givenName'],
            'idGoogle' => $userData['id']
        )
    );
}
else{    
    header('Location: ../index.php');
    exit();
}



?>
