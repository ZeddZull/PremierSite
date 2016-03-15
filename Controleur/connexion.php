<?php
session_start();
include("../Modele/Global.php");
$bdd = new BaseDeDonnees;
$estEnregistrer = $bdd->chercheUser(filter_input(INPUT_POST, "nomDuCompte"));
if ($estEnregistrer){
	$bonMdp = $bdd->seConnecter(filter_input(INPUT_POST, "nomDuCompte"),filter_input(INPUT_POST, "mdp"));
	if ($bonMdp){
		$nomCompte = filter_input(INPUT_POST, "nomDuCompte");
		$_SESSION['user']=$nomCompte;
		$_SESSION['message']= ("Bienvenue ".$_SESSION['user']) ;
	}
}
header("Location: ../");
exit();
