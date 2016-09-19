<?php
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Bienvenue</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">

	<link rel="stylesheet" href="site/include/semantic.min.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<script src="site/include/semantic.min.js"></script>
	<script src="site/include/login.js"></script>

</head>
<body>
<div class="container">
	<div class="ui inverted menu">
		<div class="header item">EasyLearn®</div>
		<div class="item">
			<form class="ui form" id="formLogout">
				<div class="ui submit button">Déconnexion</div>
			</form>
		</div>
		<div class="right item">
			<form id="formLogin" class="ui form">
				<div class="inline fields">
					<div class="field">
						<input type="text" name="login" placeholder="Login" />
					</div>
					<div class="field">
						<input type="password" name="password" placeholder="Password" />
					</div>
					<div class="field">
						<div class="ui submit button">Connexion</div>
					</div>
				</div>
			</form>
		</div>
		<div class="item">
			<div class="ui button">
				<a href="/site/login.php" class="btn btn-info">Créer un compte</a>
			</div>

		</div>
	</div>


	<?include ("site/easy_learn_info.php")?>
</div>
</body>
</html>