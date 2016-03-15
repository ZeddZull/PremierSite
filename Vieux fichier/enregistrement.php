<?php 
require_once("connexion.php");
$bdd=connect_bd();
$insert = $bdd->prepare('INSERT INTO Compte(NomCompte,MotDePasse,Mail,Nom,Prenom,DateNaissance,DateInscription,TypeC) VALUES (:nomcompte,:mdp,:mail,:nom,:prenom,:naissance,Now(),"user")');
$insert->execute(array(
	'nomcompte'=>filter_input(INPUT_POST,'nomCompte'),
	'mdp'=>filter_input(INPUT_POST,'motDePasse'),
	'mail'=>filter_input(INPUT_POST,'mail'),
	'nom'=>filter_input(INPUT_POST,'nom'),
	'prenom'=>filter_input(INPUT_POST,'prenom'),
	'naissance'=>filter_input(INPUT_POST,'naissance')
	));
echo 'Bien enregistré'
?>
