<!DOCTYPE html>
	<html lang="fr">
		<head>
			<title>S'identifier</title>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">	
			<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
			<link rel="stylesheet" type="text/css" href="public/login/vendor/bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="public/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
			<link rel="stylesheet" type="text/css" href="public/login/vendor/animate/animate.css">	
			<link rel="stylesheet" type="text/css" href="public/login/vendor/css-hamburgers/hamburgers.min.css">
			<link rel="stylesheet" type="text/css" href="public/login/vendor/animsition/css/animsition.min.css">
			<link rel="stylesheet" type="text/css" href="public/login/vendor/select2/select2.min.css">	
			<link rel="stylesheet" type="text/css" href="public/login/vendor/daterangepicker/daterangepicker.css">
			<link rel="stylesheet" type="text/css" href="public/login/css/util.css">
			<link rel="stylesheet" type="text/css" href="public/login/css/main.css">
		</head>
	
	<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="index.php?action=login" method="POST">
					<span class="login100-form-title p-b-32">
						Se Connecter
					</span>

					<span class="txt1 p-b-11">
						Pseudo
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Le Pseudo est obligatoire">
						<input class="input100" type="text" name="alias" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Mot de passe
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Veuillez entrer votre mot de passe">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div>
							Pas encore inscris ? c'est par <a href="index.php?action=register">ici</a>
						</div>
					</div>

					<div class="flex-sb-m w-full p-b-48">
						<div>
							<a href="index.php?action=listPost">Revenir à l'accueil</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Se Connecter
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="public/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="public/login/vendor/animsition/js/animsition.min.js"></script>
	<script src="public/login/vendor/bootstrap/js/popper.js"></script>
	<script src="public/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="public/login/vendor/select2/select2.min.js"></script>
	<script src="public/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="public/login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="public/login/vendor/countdowntime/countdowntime.js"></script>
	<script src="public/login/js/main.js"></script>

</body>
</html>