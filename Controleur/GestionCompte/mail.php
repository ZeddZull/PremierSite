<?php 
session_start();
include_once('../../Modele/Global.php');
if (isset($_SESSION['user'])){
	$user = new User($_SESSION["user"]);
	$bdd = new BaseDeDonnees();
	$mail = filter_input(INPUT_POST,'mail');
	$mdp = filter_input(INPUT_POST,'motDePasse');
	if($mdp == $user->getMotDePasse()){
		if (!$bdd->chercheMail($mail)){
			$user->setMail($mail);
			$_SESSION['messageC']="Votre mail a été modifié";
			unset($_SESSION['sousPage']);
		}
	} else {
		$_SESSION['messageC']="Mauvais mot de passe";
		unset($_SESSION['sousPage']);
	}

}
header("Location: ../../");
exit();