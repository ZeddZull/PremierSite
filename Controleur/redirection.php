<?php 
session_start();
if (isset($_SESSION['user'])){
	if (isset($_POST['selectionPage'])){
		if ($_POST['selectionPage']=="../"){
			unset($_SESSION['page']);
		}
		header("Location: ".filter_input(INPUT_POST,'selectionPage'));
		exit();
	}
}