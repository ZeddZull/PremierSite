<form action="Controleur/GestionCompte/motDePasse.php" method="POST">
	<fieldset>
		<legend>Changement de mot de passe</legend>
		<table>
		<?php if(!isset($_SESSION['checkMdp'])){ ?>
			<tr>
				<td>Ancien mot de passe</td>
				<td><input type="password" id="motDePasseAncien" name="motDePasseAncien" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" maxlength="42" required/></td>
			</tr>
			<?php } ?>
			<tr>
				<td><?php echo (isset($_SESSION['checkMdp'])) ? "Confirmation du mot de passe" : "Nouveau mot de passe"  ?></td>
				<td><input type="password" name="newMotDePasse" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" maxlength="42" required/></td>
			</tr>	
		</table>
		<br>
		<input type ="submit" value="Envoie" />
	</fieldset>
</form>