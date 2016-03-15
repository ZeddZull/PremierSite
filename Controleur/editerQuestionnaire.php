<?php
session_start();
include_once('../Modele/Global.php');
if (isset($_SESSION['page']) and $_SESSION['page']=='editerQuestionnaire') {
		if (isset($_SESSION['user']) and isset($_POST['questionnaire'])) {
			$questionnaire=new Questionnaire(filter_input(INPUT_POST,'questionnaire'));
			$nom = filter_input(INPUT_POST,'nom');
			if ($questionnaire->getNom() <> $nom){
				$questionnaire->setNom($nom);
			}
			$nbq = filter_input(INPUT_POST,'nbQ');
			if ($questionnaire->getNombreQuestion() != $nbq){
				$questionnaire->setNombreQuestion($nbq);
			}
			$duree = filter_input(INPUT_POST,'dureeQ');
			if ($questionnaire->getDuree() <> $duree){
				$questionnaire->setDuree($duree);
			}
			$questions=array();
			for ($i=1; $i <= $nbq; $i++) { 
				$id=filter_input(INPUT_POST,'question'.$i);
				$questions[]=$id;
			}
			$questionnaire->setQuestions($questions);
			$questionnaire->setDate();
			$_SESSION['message']='Le questionnaire à été mis à jour';
			unset($_SESSION['page']);
	}
} else {
	$_SESSION['page']='editerQuestionnaire';
}
header("Location: ../");
exit();