<?php
header('Content-type: text/xml; charset=utf-8');
header ('Cache-Control: no-cache');
header ('Cache-Control: no-store' , false);
$xml = new DOMdocument('1.0','utf-8');
$tag=$xml->createElement('question');
session_start();
if ($_SESSION['admin']){
	if (isset($_POST['id'])){
		include_once("../../Modele/Global.php");
		$question = new Question($_POST['id']);
		$tag->setAttribute("nom",$question->getQuestion());
		$tag->setAttribute("domaine",$question->getDomaine());
		$tag->setAttribute("reponse",$question->getReponse());
		$tag->setAttribute("duree",$question->getDuree());
		for ($i=1; $i <= 5 ; $i++) { 
			$tag->setAttribute("choix".$i,$question->getChoix()[$i-1]);
		}
		$xml->appendChild($tag);
		echo $xml->saveXML();
	}
}
?>