<?php
include_once ("include/autoload.php");
// si on veux se connecter ou se deconnecter
if(isset($_POST["mode"])) {
	$retour = new stdClass();
	$retour->result = false;
	switch ($_POST["mode"]){
		case "connexion":
			//connexion
			if (!empty($_POST["login"]) && !empty($_POST["password"])) {
				$lignes = $bd->query("SELECT * FROM Account WHERE Username = :login",
					array(
						":login" => $_POST["login"]
					)
				);
				if (count($lignes) > 0) {
					if (password_verify($_POST["password"], $lignes[0]->PWD_Print) == 1) {
						$_SESSION["User"] = new User($lignes[0]->PrK_Account, $lignes[0]->Username, $_POST["password"]);
						$retour->result = true;
					}
				}
			}
			break;
		case "deconnexion":
			//deconnexion
			$_SESSION = [];
			$retour->result = session_destroy();
			break;
		case "verification":
			if (!empty($_POST["username"])) {
				$lignes = $bd->query("SELECT PRK_Account FROM Account WHERE Username = :username",
					array(
						":username" => $_POST["username"]
					)
				);
				if (count($lignes) > 0) {
					// si pseudo deja utiliser renvoie erreur
					$retour->result = true;
				}
				else $retour->result = false;
			}
			break;
		case "creation":
			if (!empty($_POST["login"]) || !empty($_POST["password"])) {
				$bd->query("INSERT INTO Account (PWD_Print, Username, Type) VALUES (:password, :login, 0);",
					array(
						":login" => $_POST["login"],
						":password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
					)
				);
				$_SESSION["User"] = new User($bd->last_insert_id(), $_POST["login"], $_POST["password"]);
				$retour->result = true;
			}
			else {
				$retour->result = false;
			}
			break;
		default: return;
	}

	echo json_encode($retour);
	return;
}
else {
	include ("include/header.php");
	// sinon on veux afficher la page de creation de compte
	?>
	<div class="ui stackable grid">
		<div class="ten wide centered column">
			<div class="ui red segment">
				<h1 class="ui header">
					<div class="content">Création de compte</div>
					<div class="sub header">Veuillez remplir les informations ci-dessous pour créer votre compte</div>
					<div class="sub header">Les champs marqués d'une <span style="color: #db2828;">*</span> sont obligatoires</div>
				</h1>
				<form class="ui form" id="newCompte" name="newCompte">
					<div class="ui red message" style="display: none;">
						<div class="content">
							Nom utilisateur déja utilisé
						</div>
					</div>
					<div class="required field">
						<label>Nom utilisateur</label>
						<div class="ui icon input">
							<input type="text" name="username"/>
							<i class="icon"></i>
						</div>

					</div>
					<div class="required field">
						<label>Mot de passe</label>
						<input type="text" name="password"/>
					</div>
					<div class="ui submit primary right floated button">Envoyer</div>
					<br/>
					<br/>
				</form>
			</div>
		</div>
	</div>
<?php }?>