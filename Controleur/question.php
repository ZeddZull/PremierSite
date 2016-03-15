<?php
session_start();
if ($_SESSION['admin']){
	if (isset($_SESSION["page"]) and $_SESSION['page']=='question' and isset($_POST['question'])){
		include_once("../Modele/Global.php");
		$bdd = new BaseDeDonnees;
		$id = filter_input(INPUT_POST,'questions');
		$question = filter_input(INPUT_POST,'question');
		$domaine = filter_input(INPUT_POST,('domaine'));
		$choix = array();
		for ($i=0; $i < 5 ; $i++) { 
			$choix[$i]= strtolower(filter_input(INPUT_POST,'choix'.($i+1)));
		}
		$reponse = strtolower(filter_input(INPUT_POST,'reponse'));
		$duree = filter_input(INPUT_POST,'duree');
		if($id == "newQuestion"){
			$bdd->createQuestion($question,$domaine,$choix[0],$choix[1],$choix[2],$choix[3],$choix[4],$reponse,$duree);
			$_SESSION['message']="Question créé";
		} else {
			$questionQ = new Question($id);
			if ($question != $questionQ->getQuestion()){
				$questionQ->setQuestion($question);
			}
			if ($domaine != $questionQ->getDomaine()){
				$questionQ->setDomaine($domaine);
			}
			if ($choix != $questionQ->getChoix()){
				$questionQ->setChoix($choix);
			}
			if ($reponse != $questionQ->getReponse()){
				$questionQ->setReponse($reponse);
			}
			if ($duree != $questionQ->getDuree()){
				$questionQ->setDuree($duree);
			}
			$_SESSION['message']="Question modifié ";

		}
		unset($_SESSION["page"]);
	} else {
		$_SESSION["page"]='question';
	}
}
header("Location: ../");
exit();
