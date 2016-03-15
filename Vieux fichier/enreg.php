
<form id="enregistrement" action="enreg.php" method="POST">
	<fieldset>
		<label for="nomCompte">Nom du compte</label>
		<input type="text" id="nomCompte" name="nomCompte" required/><br>
		<label for="motDePasse">Mot de passe</label>
		<input type="password" id="motDePasse" name="motDePasse" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"required/><br>
		<label for="mail">Mail</label>
		<input type="email" id="mail" name="mail" required/><br>
		<label for="naissance">Date de Naissance (aaaa/mm/jj)</label>
		<input type="text" id="naissance" name="naissance" pattern="(?:19|20)[0-9]{2}/(?:(?:0[1-9]|1[0-2])/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:30))|(?:(?:0[13578]|1[02])/31))" required/><br>
		<label for="nom">Nom</label>
		<input type="text" id="nom" name="nom"/><br>
		<label for="prenom">Prénom</label>
		<input type="text" id="prenom" name="prenom"/><br>
	</fieldset>
	<fieldset>
		<input type="submit" value="envoie"/>
		<input type="reset" value="réinitialisation"/>
	</fieldset>
</form>
<?php 
if (!empty($_POST['nomCompte'])){
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
	echo 'Bien enregistré';
}
?>
