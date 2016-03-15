<?php 
include_once("../../Modele/Basededonnees.php");
$bdd = new BaseDeDonnees();
$nomCompte = filter_input(INPUT_POST,"nomCompte");
$mdp = filter_input(INPUT_POST,'mdp');
echo $bdd->seConnecter($nomCompte,$mdp);
?>