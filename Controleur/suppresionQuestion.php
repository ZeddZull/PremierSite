<?php 
session_start();
include_once('../Modele/Global.php');
if (isset($_SESSION['admin']) and $_SESSION['admin']){
	$id = filter_input(INPUT_GET,'id');
	deleteQuestion($id);
	$_SESSION['message']="Question supprimé";
	unset($_SESSION['page']);
}
header("Location: ../");
exit();