<?php 
session_start();
if (isset($_SESSION['user'])){
	$_SESSION['idQ']=filter_input(INPUT_GET,'id');
	$_SESSION['page']='reponse';
}
header("Location: ../");
exit();