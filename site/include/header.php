<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>EasyLearn®</title>
	<meta name="description" content="EasyLearn - La plateforme d'apprentissage en ligne">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="/EasyLearn/site/include/semantic.min.css">
	<link rel="stylesheet" href="/EasyLearn/site/include/style.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<script src="/EasyLearn/site/include/semantic.min.js"></script>
	<script src="/EasyLearn/site/include/login.js"></script>
	<script src="/EasyLearn/site/include/menu.js"></script>
	<script src="/EasyLearn/site/include/listes.js"></script>

</head>
<body>
<div class="container">
	<?/* menu horizontale */?>
	<div class="ui inverted menu" id="horizMenu">
		<a class="item" href="/EasyLearn/">
			<div class="menu">
				<div class="vertically fitted borderless item">
					<div class="labeled icon">
						<i class="student icon"></i>
						EasyLearn®
					</div>
				</div>
				<div class="vertically fitted borderless item sousmenu">
					La plateforme d'apprentissage en ligne
				</div>
			</div>
		</a>

		<div class="right broderless item">
			<form class="ui form" id="formLogout">
				<input type="hidden" name="mode" value="deconnexion"/>
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
			<div class="ui primary button">
				<a href="site/login.php">Créer un compte</a>
			</div>
		</div>
	</div>
