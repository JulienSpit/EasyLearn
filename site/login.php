<?php
require_once "autoload.php";

$retour = new stdClass();
$retour->result = false;

//conexion
if(!empty($_POST["login"]) && !empty($_POST["password"])){
    $lignes = $bd->query("SELECT * FROM Account WHERE Username = :login",
        array(
            ":login" => $_POST["login"]
        )
    );
	if (count($lignes) > 0) {
		if (password_verify($_POST["password"], $lignes[0]->PWD_Print) == 1) {
			$retour->login = $lignes[0]->Username;
			/*$retour->password =$lignes[0]->PWD_Print;*/
			$retour->result = true;
			echo json_encode($retour);
		}
	}
}
//deconnexion
else if(!empty($_POST["login"])){
	$retour->result = true;
	echo json_encode($retour);
}

