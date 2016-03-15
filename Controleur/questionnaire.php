<?php
session_start();
if ($_SESSION['admin']){
	if (isset($_SESSION['page']) and $_SESSION['page']=='questionnaire' and isset($_POST["nomquest"])) {
		include_once("../Modele/Basededonnees.php");
		$bdd = new BaseDeDonnees;
		$questionnaire = filter_input(INPUT_POST,'nomquest');
		if(!$bdd->verificationQuestionnaire($questionnaire)){
			$nbquest = filter_input(INPUT_POST,'nbquest');
			$domaine = filter_input(INPUT_POST,'domaine');
			$duree = filter_input(INPUT_POST,'duree');
			$bdd->createQuestionnaire($questionnaire,$nbquest,$domaine,$duree);
			$_SESSION['idQ']=$bdd->chercherIdQuestionnaire($questionnaire);
			$_SESSION['domaine']=$domaine;
			$_SESSION["page"]='editerQuestionnaire';
		}
	} else {
		$_SESSION['page']='questionnaire';
	}
}
header("Location: ../");
exit();
