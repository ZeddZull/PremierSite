<?php 
session_start();
include_once('../../Modele/Global.php');
if (isset($_SESSION['user'])){
	$user = new User($_SESSION["user"]);
	if(isset($_SESSION["checkMdp"])){
		$newMdp = filter_input(INPUT_POST,'newMotDePasse');
		if ($newMdp == $_SESSION["checkMdp"]){
			$user->setMotDePasse($newMdp);
			$_SESSION['messageC']="Votre mot de passe a été modifié";
			unset($_SESSION['sousPage']);
			unset($_SESSION['checkMdp']);
		} else {
			$_SESSION['messageC']="Echec du changement de mot de passe";
			unset($_SESSION['sousPage']);
			unset($_SESSION['checkMdp']);
		}
	} else {
		$mdp = filter_input(INPUT_POST,'motDePasseAncien');
		if($mdp == $user->getMotDePasse()){
			$_SESSION['checkMdp'] = filter_input(INPUT_POST,'newMotDePasse');
		}
	}
}
header("Location: ../../");
exit();