<form action='#' method='POST'>
	<fieldset>
		<label for="nomDuCompte">Nom du Compte</label>
		<input type="text" id="nomDuCompte" name="nomDuCompte"/>
		<br>
		<label for="mdp">Mot de Passe du Compte</label>
		<input type="password" id="mdp" name="mdp"/>
		<br>
		<input type="submit" value="Connexion"/>
	</fieldset>
	
<?php
$nomCompte=filter_input(INPUT_POST, "nomDuCompte");
if (!empty($nomCompte)){
	require_once("connexion.php");
	$bdd=connect_bd();
	$cheruser=$bdd->prepare('SELECT NomCompte FROM Compte WHERE NomCompte=:nomCompte');
	$cheruser->bindParam(":nomCompte",$nomCompte);
	$cheruser->execute();
	if (!empty($cheruser)){
		if ($cheruser->rowCount()==0){
			echo "Nom utilisateur non Valide";
		}
		else{
			$mdpcompte=$bdd->prepare('SELECT MotDePasse FROM Compte WHERE NomCompte=:nomCompte');
			$mdpcompte->bindParam(":nomCompte",$nomCompte);
			$mdpcompte->execute();
			if ($mdpcompte->fetch()[0]==filter_input(INPUT_POST, "mdp")){
				echo "Je me connecte";
			}
			else {
				echo "MotDePasse different";
			}
		}
	}
}
?>