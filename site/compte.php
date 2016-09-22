<?php
	include_once ("include/header.php");
?>
<div class="ui stackable grid">
		<div class="ten wide centered column">
			<div class="ui blue segment">
				<h1 class="ui header">
					<div class="content">Mon compte</div>
				</h1>
				<form action="" class="ui form">
					<div class="field">
						<label>Nom utilisateur</label>
						<input type="text" readonly value="<?=$_SESSION["User"]->getNom()?>"/>
					</div>
					<div class="field">
						<label>Mot de passe</label>
						<input type="text" readonly value="<?=$_SESSION["User"]->getPwd()?>"/>
					</div>
				</form>
			</div>
		</div>
	</div>
