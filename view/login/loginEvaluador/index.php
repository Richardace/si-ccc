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
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="view/login/loginUser/images/Logo.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="view/login/loginUser/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="view/login/loginUser/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="view/login/loginUser/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="view/login/loginUser/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="view/login/loginUser/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="view/login/loginUser/css/util.css">
	<link rel="stylesheet" type="text/css" href="view/login/loginUser/css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<img src="view/login/assets/img/laptop-3196481_1920.jpg" style="z-index: 0; position:fixed; opacity:0.7;" />
	<div class="limiter">
		<div class="container-login100" style="background: white;">
			<div class="wrap-login100" style="padding: 80px 130px 80px 80px; opacity: 1; z-index: 1;">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="view/login/loginUser/images/Logo.png" alt="IMG">
				</div>


				<form class="login100-form validate-form">
					<br>
					<br>
					<span class="login100-form-title" style="font-size:20px;">
						ACCESO EVALUADOR
						<br>
						<span style="font-size:18px;">COMITE CURRICULAR CENTRAL</span>
					</span>
					<center>
						<button onclick="window.location = '<?php echo $login_url_evaluador; ?>'" type="button" class="loginBtn loginBtn--google js-tilt">
							Ingresar con Google
						</button>
					</center>
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="view/login/loginUser/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="view/login/loginUser/vendor/bootstrap/js/popper.js"></script>
	<script src="view/login/loginUser/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="view/login/loginUser/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="view/login/loginUser/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="view/login/loginUser/js/main.js"></script>

</body>

</html>