<?php header('Content-type: text/xml; charset=utf-8');
header ('Cache-Control: no-cache');
header ('Cache-Control: no-store' , false);
$xml = new DOMdocument('1.0','utf-8');
$tag=$xml->createElement('questionnaire');
session_start();
if ($_SESSION['admin']){
	if (isset($_POST['questionnaire'])){
		include_once("../../Modele/Global.php");
		$id=htmlspecialchars_decode($_POST['questionnaire']);
		if ($id == 'newQuestionnaire'){
			$tag->setAttribute("nbq",1);
			$tagq = $xml->createElement("question");
			$tagq->setAttribute("id",'none');
			$tag->setAttribute("domaine",'tout');
			$tag->appendChild($tagq);
		} else {
			$questionnaire=new questionnaire($id);
			$tag->setAttribute("id",$id);
			$tag->setAttribute("name",$questionnaire->getNom());
			$tag->setAttribute("nbq",$questionnaire->getNombreQuestion());
			$tag->setAttribute("duree",$questionnaire->getDuree());
			$tag->setAttribute("domaine",$questionnaire->getDomaine());
			$questions=$questionnaire->getQuestions();
			foreach ($questions as $question) {
				$tagq = $xml->createElement("question");
				$tagq->setAttribute("id",$question->getId());
				$tag->appendChild($tagq);
			}
		}
		$domaine = $_POST['domaine'];
		$questions=getQuestionDomaineQuestionnaire($domaine);
		foreach ($questions as $question) {
			$tagq = $xml->createElement("questionQ");
			$tagq->setAttribute("id",$question->getId());
			$tagq->setAttribute("intitule",$question->getQuestion());
			$tag->appendChild($tagq);
		}
		$xml->appendChild($tag);
		echo $xml->saveXML();
	}
}?>