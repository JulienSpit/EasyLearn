<?php
require_once "../autoload.php";

$retour = new stdClass();
$retour->result = false;

if(!empty($_POST["login"]) && !empty($_POST["password"])){
    $lignes = $bd->query("SELECT PWD_Print FROM Account WHERE Username = :login",
        array(
            ":login" => $_POST["login"]
        )
    );
    if(count($lignes)){
        /*$_SESSION["u_id"] = $lignes[0]->id;*/
		$retour->password = $lignes["password"];
        $retour->result = true;
    }
}
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($retour);