<?php
session_start();
include_once('../Modele/Global.php');
if (isset($_SESSION['page']) and $_SESSION['page']=='editerQuestionnaire') {
		if (isset($_SESSION['user']) and isset($_POST['questionnaire'])) {
			$nom = filter_input(INPUT_POST,'nom');
			$nbq = filter_input(INPUT_POST,'nbQ');
			$duree = filter_input(INPUT_POST,'dureeQ');
			$domaine = filter_input(INPUT_POST,'domaineQ');
			$questions=array();
			for ($i=0; $i < $nbq; $i++) { 
				$id=filter_input(INPUT_POST,'question'.($i+1));
				$questions[$i]=$id;
			}
			if ($_POST['questionnaire'] == "newQuestionnaire"){
				createQuestionnaire($nom,$nbq,$domaine,$duree,$questions);
				$_SESSION['message']="Questionnaire créé";
			} else {
				$id=filter_input(INPUT_POST,'questionnaire');
				$questionnaire=new Questionnaire($id);
				if ($questionnaire->getNom() <> $nom){
					$questionnaire->setNom($nom);
				}

				if ($questionnaire->getNombreQuestion() != $nbq){
					$questionnaire->setNombreQuestion($nbq);
				}

				if ($questionnaire->getDuree() <> $duree){
					$questionnaire->setDuree($duree);
				}
				$questionnaire->setQuestions($questions);
				$questionnaire->setDate();
				$questionnaire->setDomaine($domaine);
				$_SESSION['message']='Le questionnaire à été mis à jour';
			}
			unset($_SESSION['page']);
	}
} else {
	$_SESSION['page']='editerQuestionnaire';
}
header("Location: ../");
exit();