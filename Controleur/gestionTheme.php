<?php 
session_start();
include_once('../Modele/Global.php');
if ($_SESSION['admin']){
	if (isset($_SESSION['page']) and isset($_POST['themeQuestionnaire']) ){
		$bdd = new BaseDeDonnees;
		$themeQuestionnaire=$_POST['themeQuestionnaire'];
		if (isset($_POST["newThemeQ"])){
			$themeQuestionnaire=$_POST['newThemeQ'];
		}
		$bdd->deleteThemeQuestionnaire($themeQuestionnaire);
		$i=1;
		while (isset($_POST["themeQuestion".$i])){
			$themeQuestion = $_POST['themeQuestion'.$i];
			if (isset($_POST['newTheme'.$i])){
				$themeQuestion = $_POST['newTheme'.$i];
			}
			$bdd->createTheme($themeQuestionnaire,$themeQuestion);
			$i+=1;
		}
		$_SESSION['message']= "Les thèmes ont été mis à jour";
		unset($_SESSION['page']);
	} else {
		$_SESSION['page']='gestionTheme';
	}
}
header("Location: ../");
exit();