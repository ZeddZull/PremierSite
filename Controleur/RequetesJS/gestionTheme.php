<?php
header('Content-type: text/xml; charset=utf-8');
header ('Cache-Control: no-cache');
header ('Cache-Control: no-store' , false);

$xml = new DOMdocument('1.0','utf-8');
$tag=$xml->createElement('list');
session_start();

if ($_SESSION['admin']){
	if (isset($_POST['themeQ'])){
		include_once("../../Modele/Basededonnees.php");
		$bdd= new BaseDeDonnees;
		$themeQ = filter_input(INPUT_POST,'themeQ');
		$themes=$bdd->getThemesQuestionsLierThemeQuestionnaire($themeQ);
		foreach ($themes as $theme) {
			$item = $xml->createElement('item');
			$item->setAttribute('theme',$theme['DomaineQuestion']);
			$tag->appendChild($item);
		}
		$xml->appendChild($tag);
		echo $xml->saveXML();
	}
}
?>