<form action="Controleur/GestionCompte/nomCompte.php" method="POST">
	<fieldset>
		<legend>Changement nom compte</legend>
		<table>
			<tr>
				<td>Nom de compte actuel</td>
				<td><input name="ancienCompte" value=<?php echo '"'.$user->getNomCompte().'"' ?> disabled/></td>
			</tr>
			<tr>
				<td>Nouveau nom de compte</td>
				<td><input id="newCompte" name='newCompte' type="text" maxlength="42" required/></td>
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