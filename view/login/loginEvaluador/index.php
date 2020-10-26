<?php
  require_once('view/login/loginEvaluador/config.php');
  require_once('controller/LoginController.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="view/login/assets/css/styleLoginUser.css" />


  
</head>

<body class="align">

  <img id="fondoImagen" src="view/login/assets/img/office-620822_1920.jpg">

  <div class="grid align__item">

    <div class="register">
      <br><br><br>
      <img id="imgLogo" src="view/login/assets/img/logoufps.jpg">

      <h2>
        ACCESO ADMINISTRATIVO perro
        <br>
        COMITE CURRICULAR CENTRAL
      </h2>


      <br>

      <button onclick="window.location = '<?php echo $login_url_evaluador; ?>'" type="button" class="loginBtn loginBtn--google">
        Login with Google
      </button>

    </div>

  </div>

</body>

</html>