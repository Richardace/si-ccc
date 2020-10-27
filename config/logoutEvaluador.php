<?php
    session_start();
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params["httponly"]);
    }
    session_destroy();
    setcookie('id', '', time() - 60*60*24*30, '/'); 
    setcookie('sess', '', time() - 60*60*24*30, '/');
    

    header('Location: ../index.php?l=login&a=indexEvaluador');
    die();
?>