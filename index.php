<html id = "_login">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8">
		<link rel="shortcut icon" href="../images/togo-favicon.png" >
		<title>Login</title>

		<!-- CSS -->

		<!-- CSS -->
<link rel="stylesheet" type="text/css" href="tools/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="tools/materialize/css/roboto.css">
<link rel="stylesheet" type="text/css" href="tools/materialize/css/material-fullpalette.css">
<link rel="stylesheet" type="text/css" href="tools/materialize/css/material.css">
<link rel="stylesheet" type="text/css" href="tools/materialize/css/ripples.css">
<link rel="stylesheet" type="text/css" href="tools/cnsc/css/cnsc.css">
<link rel="stylesheet" type="text/css" href="tools/date-time-picker/css/bmdtp.css">
<!-- CSS -->
		<!-- CSS -->

	</head>

	<body>

		<div class = "container rmp" id = "login">
			<div class = "row rmp">
				<div class = "col-xs-12 rmp login-background"></div>
				<div class = "col-xs-12 rmp login-form shadow-z-3">
					<div class = "col-xs-12 login-form-header">
						<div class = "col-xs-1 rmp"><img src="images/gccarpool.png" class = "img"></div>
						<div class = "col-xs-3 rmp"><!--Her<br><span>Trip--></span></div>
						<div class = "col-xs-7 rmp"><div>Rapide</div><div>Efficace</div><div>Sécurisé</div></div>
					</div>
                 <form method="POST" action="trait_login.php" autocomplete="off">
					<div class = "col-xs-12 login-form-content">
						<div class = "col-xs-12 form-login">
							<div class = "col-xs-12 form-login-label" >Nom d'utilisateur</div>
							<div class = "col-xs-12 form-login-textField"><input type = "text"  required="" class = "form-control" name="Pseudo_Util"></div>
						</div>
						<div class = "col-xs-12 form-login">
							<div class = "col-xs-12 form-login-label">Mot de passe</div>
							<div class = "col-xs-12 form-login-textField"><input type = "password" required="" name="Pass_Util" class = "form-control"></div>
						</div>
						<div class = "col-xs-12 form-login-connect">
							<button name="submit" type="submit" class = "btn btn-primary">connexion</button>
						</div>
					</div>
                </form>
					<!--<div class="col-xs-12 rmp " id="connexion-result"></div>-->
				</div>
			</div>
		</div>
	</body>

	<!-- SCRIPTS -->
	<script type="text/javascript" src="tools/jquery/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="tools/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="tools/materialize/js/ripples.js"></script>
	<script type="text/javascript" src="tools/materialize/js/material.js"></script>
	<script type="text/javascript" src="tools/date-time-picker/js/moment.js"></script>
	<script type="text/javascript" src="tools/date-time-picker/js/bootstrap-material-datetimepicker.js"></script>
	<script type="text/javascript" src="tools/cnsc/js/cnsc.js"></script>

	<!-- SCRIPTS -->

</html>