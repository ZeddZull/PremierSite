<?php
header('Content-type: text/xml; charset=utf-8');
header ('Cache-Control: no-cache');
header ('Cache-Control: no-store' , false);
$xml = new DOMdocument('1.0','utf-8');
$tag=$xml->createElement('list');
session_start();
if ($_SESSION['admin']){
	if (isset($_POST['theme'])){
		include_once("../../Modele/Basededonnees.php");
		$bdd= new BaseDeDonnees;
		if($_POST['theme']=='tout'){
			$themes=$bdd->getQuestionNom();
		}else{
			$themes=$bdd->getQuestionByDomaine($_POST['theme']);
		}
		foreach ($themes as $tab) {
			$item = $xml->createElement("item");
			$item->setAttribute("id",$tab["IdQuestion"]);
			$item->setAttribute("name",$tab["Question"]);
			$tag->appendChild($item);
		}
	$xml->appendChild($tag);
	echo $xml->saveXML();
	}
}
?>