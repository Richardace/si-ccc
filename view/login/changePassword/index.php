<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="view/login/assets/css/styleLoginUser.css" />


  <script type="text/javascript" src="view/login/assets/js/main.js"></script>
</head>

<body class="align">

  <img id="fondoImagen" src="view/login/assets/img/office-620822_1920.jpg">

  <div class="grid align__item">

    <div class="register">
      <br><br><br>
      <img id="imgLogo" src="view/login/assets/img/logoufps.jpg">

      <h2>
        CAMBIO DE CONTRASEÑA <?php $_GET['id']; ?>
        <br>
        COMITE CURRICULAR CENTRAL
      </h2>



      <br>



      <form action="index.php?l=login&a=changePassword" method="post" class="form">

        <div class="form__field">
          <input type="password" name="password" placeholder="NUEVA CONTRASEÑA">
        </div>

        <!-- <input type="number" name="idUser" > -->

        <input type="hidden" name="idUser" value="<?php echo $data['id']; ?>"> 

        <!-- <div class="form__field">
          <input type="password" name="password" placeholder="••••••••••••">
        </div> -->

        <br>

        <div class="form__field">
          <input type="submit" value="Cambiar Contraseña">
        </div>

      </form>


    </div>

  </div>

</body>

</html>