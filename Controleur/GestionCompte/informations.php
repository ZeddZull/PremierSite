<?php 
session_start();
include_once('../../Modele/Global.php');
if (isset($_SESSION['user'])){
	$user = new User($_SESSION["user"]);
	$dateN = filter_input(INPUT_POST,'naissance');
	$mdp = filter_input(INPUT_POST,'motDePasse');
	$nom = filter_input(INPUT_POST,'nom');
	$prenom = filter_input(INPUT_POST,'prenom');
	if ($mdp == $user->getMotDePasse()){
		$user->setDateNaissance($dateN);
		$user->setNom($nom);
		$user->setPrenom($prenom);
		$_SESSION['messagec']="Vos informations ont été modifié";
		unset($_SESSION['sousPage']);
	} else {
		$_SESSION['messagec']="Mauvais mot de passe";
		unset($_SESSION['sousPage']);
	}

}
header("Location: ../../");
exit();