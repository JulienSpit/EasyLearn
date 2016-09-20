<?php
require_once ("site/autoload.php");
?>
<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>EasyLearn®</title>
	<meta name="description" content="EasyLearn - La plateforme d'apprentissage en ligne">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="site/include/semantic.min.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<script src="site/include/semantic.min.js"></script>
	<script src="site/include/login.js"></script>

</head>
<body>
<div class="container">
	<div class="ui inverted menu">
		<div class="item">
			<div class="labeled icon">
				<i class="student icon"></i>
				EasyLearn®
			</div>
			<div>
				La plateforme d'apprentissage en ligne
			</div>
		</div>

		<div class="right broderless item">
			<form class="ui form" id="formLogout">
				<input type="hidden" name="login" value=""/>
				<div class="ui submit button">Déconnexion</div>
			</form>
		</div>
		<div class="right borderless item">
			<form id="formLogin" name="formLogin" class="ui form">
				<div class="inline fields" style="margin: 0;">
					<div class="field">
						<input type="text" name="login" placeholder="Login">
					</div>
					<div class="field">
						<input type="password" name="password" placeholder="Password">
					</div>
					<div class="ui submit green button">Connexion</div>
				</div>
			</form>
		</div>
		<div class="item">
			<div class="ui button">
				<a href="site/login.php">Créer un compte</a>
			</div>
		</div>
	</div>