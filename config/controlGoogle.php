<?php
require_once "../controller/LoginController.php";
require_once "../view/login/loginUser/config.php";

if (isset($_GET['code'])) {
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']); 
}else{
    header('Location: ../index.php');
    exit();
}

if(isset($token["error"]) != "invalid_grant"){
    // get data from google
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    // setcookie("idea", $userData['id'], time()+60*60*24*30, "/", NULL);

    // var_dump($userData);

    //insert data in the database
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
