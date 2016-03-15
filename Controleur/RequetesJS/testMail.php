<?php 
include_once("../../Modele/Basededonnees.php");
$bdd = new BaseDeDonnees();
$mail = filter_input(INPUT_POST,"mail");
echo $bdd->chercheMail($mail);
?>