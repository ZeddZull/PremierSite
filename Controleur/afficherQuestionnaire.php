<?php
header('Content-type: text/xml; charset=utf-8');
header ('Cache-Control: no-cache');
header ('Cache-Control: no-store' , false);
$xml = new DOMdocument('1.0','utf-8');
$tag=$xml->createElement('questionnaire');

if (isset($_POST['param1'])){
	include_once("../Modele/Global.php");
	$id=htmlspecialchars_decode($_POST['param1']);
	$questionnaire=new questionnaire($id);
	$tag->setAttribute("id",$id);
	$tag->setAttribute("name",$questionnaire->getNom());
	$tag->setAttribute("nbq",$questionnaire->getNombreQuestion());
	$tag->setAttribute("duree",$questionnaire->getDuree());
	$questions=$questionnaire->getQuestions();
	foreach ($questions as $question) {
		$tagq = $xml->createElement("question");
		$tagq->setAttribute("id",$question->getId());
		$tag->appendChild($tagq);
	}
	$domaine = $questionnaire->getDomaine();
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
?>