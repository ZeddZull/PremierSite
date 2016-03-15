<?php 
session_start();
if (isset($_SESSION['user'])){
	if (isset($_SESSION['page']) and isset($_GET["choix"])){
		$choix = filter_input(INPUT_GET,'choix');
		switch ($choix) {
			case '2':
				$_SESSION['sousPage']="modifMdp";
				break;
			case '3':
				$_SESSION['sousPage']="modifMail";
				break;
			case '4':
				$_SESSION['sousPage']="modifInfo";
				break;
		}
	} else {
		$_SESSION["page"] = "gestionCompte";
		$_SESSION['sousPage'] = "modifInfo";
	}
}
header("Location: ../");
exit();