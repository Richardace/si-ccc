<?php

    session_start();
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', 0, $params['path'], $params['domain'], $params['secure'], $params["httponly"]);
    }
    session_destroy();
    setcookie('id', '', 0, '/'); 
    setcookie('sess', '', 0, '/');
    

    header('Location: ../index.php');
    die();
?>