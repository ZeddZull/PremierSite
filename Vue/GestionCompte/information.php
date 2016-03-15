<form action="Controleur/GestionCompte/informations.php" method="POST">
	<fieldset>
		<legend>Changement des informations</legend>
		<table>
			<tr>
				<td>Date de naissance</td>
				<td><input type="text" name="naissance" maxlength="10" value=<?php echo '"'.$user->getDateNaissance().'"' ?> pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])/31))" required/></td>
			</tr>
			<tr>
				<td>Nom</td>
				<td><input type="text" name="nom" maxlength="42" value=<?php echo '"'.$user->getNom().'"' ?> /></td>
			</tr>
			<tr>
				<td>Prénom</td>
				<td><input type="text" name="prenom" maxlength="42" value=<?php echo '"'.$user->getPrenom().'"' ?> /></td>
			</tr>
			<tr>
				<td>Votre mot de passe</td>
				<td><input type="password" id="motDePasse" name="motDePasse" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" maxlength="42" required/></td>
			</tr>		
		</table>
		<br>
		<input type ="submit" value="Envoie" />
	</fieldset>
</form>