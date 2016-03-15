<?php 
session_start();
include_once('../Modele/Global.php');
if (isset($_SESSION['admin']) and $_SESSION['admin']){
	$id = filter_input(INPUT_GET,'id');
	deleteQuestionnaire($id);
	$_SESSION['message']="Questionnaire supprimé";
	unset($_SESSION['page']);
}
header("Location: ../");
exit();