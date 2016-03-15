<?php
header('Content-type: text/xml; charset=utf-8');
header ('Cache-Control: no-cache');
header ('Cache-Control: no-store' , false);
$xml = new DOMdocument('1.0','utf-8');
$tag=$xml->createElement('list');

if (isset($_POST['param1'])){
	include_once("../Modele/Basededonnees.php");
	$bdd= new BaseDeDonnees;
	if ($_POST['param1']=='tous'){
		$questionnaires=$bdd->getLesQuestionnaire();
	} else {
		$questionnaires=$bdd->getQuestionnaireDomaine($_POST['param1']);
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
?>