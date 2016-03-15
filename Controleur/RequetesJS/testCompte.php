<?php 
include_once("../../Modele/Basededonnees.php");
$bdd = new BaseDeDonnees();
$nomCompte = filter_input(INPUT_POST,"nomCompte");
echo $bdd->chercheUser($nomCompte);
?>