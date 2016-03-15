<?php
header('Content-type: text/xml; charset=utf-8');
header ('Cache-Control: no-cache');
header ('Cache-Control: no-store' , false);
$xml = new DOMdocument('1.0','utf-8');
$tag=$xml->createElement('list');
session_start();
if ($_SESSION['user']){
	if (isset($_POST['questionnaire'])){
		include_once("../../Modele/Basededonnees.php");
		$bdd= new BaseDeDonnees;
		if($_POST['questionnaire']=='tout'){
			$questionnaires=$bdd->getQuestionnairesNom();
		}else{
			$questionnaires=$bdd->getQuestionnaireByDomaine($_POST['questionnaire']);
		}
		foreach ($questionnaires as $tab) {
			$item = $xml->createElement("item");
			$item->setAttribute("id",$tab["IdQuestionnaire"]);
			$item->setAttribute("name",$tab["NomQuestionnaire"]);
			$tag->appendChild($item);
		}
	$xml->appendChild($tag);
	echo $xml->saveXML();
	}
}
?>