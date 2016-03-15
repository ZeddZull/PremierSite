<?php
session_start();
if ($_SESSION['user']=='Admin'){
include_once("../Modele/Basededonnees.php");
$bdd=new BaseDeDonnees;
for ($i=1; $i < $_SESSION['nbq']+1; $i++) { 
	$bdd->insertionFaitPartie($_SESSION['idQ'],$_POST['lQ'.$i]);
}
unset($_SESSION['nbq']);
unset($_SESSION['idQ']);
unset($_SESSION['page']);
header("Location: /Projet");
exit();
} else {
	echo "Lol t'est pas admin toi !";
}
?>


