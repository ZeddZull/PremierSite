<form action="Controleur/GestionCompte/mail.php" method="POST">
	<fieldset>
		<legend>Changement de mail</legend>
		<table>
			<tr>
				<td>Mail actuel</td>
				<td><input value=<?php echo '"'.$user->getMail().'"' ?> disabled/></td>
			</tr>
			<tr>
				<td>Nouveau mail</td>
				<td><input id="mail" name='mail' type="email"  required/></td>
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