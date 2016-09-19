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

	<link rel="stylesheet" href="include/css/bootstrap.min.css">
	<link rel="stylesheet" href="include/css/bootstrap-theme.min.css">

	<script src="include/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="include/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

	<script src="include/js/bootstrap.min.js"></script>

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">EasyLearn®</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<div style="display: none;float:right;">
				<a class="navbar-brand"></a>
				<form class="navbar-form navbar-right" id="formLogout" role="form" method="POST" action="index.php">
					<input type="hidden" name="deconnexion" value="1">
					<button type="submit" class="btn btn-danger">Déconnexion</button>
				</form>
			</div>
			<form style="display: none;" id="formLogin" class="navbar-form navbar-right" role="form" method="POST" action="index.php">
				<div class="form-group">
					<input type="text" name="email" placeholder="Email" class="form-control" />
					<input type="password" name="password" placeholder="Password" class="form-control" />
					<button type="submit" class="btn btn-success">Sign in</button>
				</div>
			</form>
		</div>
	</div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1>Connectez Vous...</h1>
		<div class="menu-logged row" style="display: none;">
			<div class="col-md-4" id="afficher">
				<h3>Ajouter</h3>
			</div>
			<div class="col-md-4" id="modifier">
				<h3>Modifier</h3>
			</div>
			<div class="col-md-4" id="supprimer">
				<h3>Supprimer</h3>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div id="afficherData">
		<form role="form" id="formCreate" method="post">
			<label>Nom de l'ingrédient : <input type="text" name="description"/> </label>
			<button type="submit" class="btn btn-success">Valider</button>
		</form>
	</div>
	<div id="modifierData">
		<form role="form" id="formModif" method="post">
			<label>
				Selectionnez un ingrédient :
				<select name="id">
					<option value=""></option>
				</select>
			</label>
			=>
			<label><input type="text" name="description"</label>
			<button type="submit" class="btn btn-success">Valider</button>
		</form>
	</div>
	<div id="supprimerData">
		<h3>Cliquez pour supprimer un ingrédient</h3>
	</div>
</div>
</body>
</html>