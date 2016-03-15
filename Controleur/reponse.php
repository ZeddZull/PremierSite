<?php
session_start();
if (isset($_SESSION["user"])){
	if (isset($_SESSION['page'])){
		if ($_SESSION['page']=='reponse'){
			if(isset($_POST["bonneReponse"]) and isset($_POST['tempsReponse'])){
				include_once('../Modele/Basededonnees.php');
				$bdd=new BaseDeDonnees;
				$bdd->createReponse($_SESSION['idQ'],$_SESSION['user'],filter_input(INPUT_POST,'bonneReponse'),filter_input(INPUT_POST,'tempsReponse'));
				unset($_SESSION['idQ']);
				unset($_SESSION['page']);
				}
			} else {
			if ($_SESSION['page']=='choixQuestionnaire'){
				$id=filter_input(INPUT_POST,'questionnaire');
				$_SESSION["idQ"]=$id;
				$_SESSION['page']='reponse';
			} else {
				$_SESSION['page']='choixQuestionnaire';
			}
		}
	} else {
		$_SESSION['page']='choixQuestionnaire';
	}
}
header("Location: ../");
exit();
?>