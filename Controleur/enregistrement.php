<?php 
session_start();
if (isset($_SESSION['page'])){
	include_once("../Modele/Basededonnees.php");
	$bdd = new BaseDeDonnees;
	$nomCompte = filter_input(INPUT_POST,'nomCompte');
	if (!$bdd->chercheUser($nomCompte)){
		$mdp=filter_input(INPUT_POST,'motDePasse');
		$mail=filter_input(INPUT_POST,'mail');
		$nom=filter_input(INPUT_POST,'nom');
		$prenom=filter_input(INPUT_POST,'prenom');
		$naissance=filter_input(INPUT_POST,'naissance');
		$bdd->createUser($nomCompte,$mdp,$mail,$nom,$prenom,$naissance);
		unset($_SESSION["page"]);
		header("Location: ../");
		exit();
	}
} else {
	$_SESSION['page']='newCompte';
}
header("Location: ../");
exit();
