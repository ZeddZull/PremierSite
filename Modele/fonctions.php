<?php
function getQuestionDomaineQuestionnaire($domaine){
	$bdd=new BaseDeDonnees();
	$domaines = $bdd->getDomaineQuestion($domaine);
	$questions = array();
	if ($domaine != 'tout'){
		foreach ($domaines as $domaineQ) {
			$question = $bdd->getQuestionsDomaine($domaineQ);
			foreach ($question as $tab) {
				$questions[$tab['IdQuestion']]=new Question($tab['IdQuestion']);
			}
		}
	} else {
		$questions = getToutesLesQuestions();
	}
	return $questions;
}

function getToutesLesQuestions(){
	$bdd=new BaseDeDonnees();
	$question= $bdd->getToutesLesQuestions();
	$questions= array();
	foreach ($question as $tab){
			$questions[$tab['IdQuestion']]=new Question($tab['IdQuestion']);
		}
	return $questions;
}

function getReponsesUser($nomCompte){
	$bdd=new BaseDeDonnees();
	$donnees = $bdd->getReponseUser($nomCompte);
	$reponses=array();
	foreach ($donnees as $reponse) {
		$reponses[]= new Reponse ($nomCompte,$reponse['IdQuestionnaire'],$reponse['DateReponse']);
	}
	return $reponses;
}

function getQuestionnaires(){
	$bdd=new BaseDeDonnees();
	$idQuestionnaires=$bdd->getLesQuestionnaires();
	$questionnaires=array();
	foreach ($idQuestionnaires as $id) {
		$questionnaires[$id] = new Questionnaire($id);
	}
	return $questionnaires;
}

function getQuestions(){
	$bdd = new BaseDeDonnees();
	$idQuestions=$bdd->chercherQuestions();
	$questions=array();
	foreach ($idQuestions as $i => $id) {
		$questions[$id] = new Question($id);
	}
	return $questions;
}

function createQuestionnaire($nom,$nbq,$domaine,$duree,$questions){
	$bdd = new BaseDeDonnees();
	$bdd->createQuestionnaire($nom,$nbq,$domaine,$duree);
	$idQ=$bdd->chercherIdQuestionnaire($nom);
	foreach ($questions as $id) {
		$bdd->insertionFaitPartie($idQ,$id);
	}
	$bdd->setDateEdition($idQ);
}

function deleteQuestionnaire($idQ){
	$bdd = new BaseDeDonnees();
	$bdd->deleteQuestionnaireFaitPartie($idQ);
	$bdd->deleteQuestionnaire($idQ);
}

function trierPop($id1,$id2){
	$bdd = new BaseDeDonnees();
	$val1 = $bdd->getNombreReponse($id1);
	$val2 = $bdd->getNombreReponse($id2);
	if ($val1==$val2){
		return 0;
	} else {
		if ($val1>$val2){
			return -1;
		} else {
			return 1;
		}
	}
}

function getQuestionnairesPop(){
	$bdd = new BaseDeDonnees();
	$idQuestionnaires=$bdd->getLesQuestionnaires();
	usort($idQuestionnaires,"trierPop");
	return $idQuestionnaires;
}