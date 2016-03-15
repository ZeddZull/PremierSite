<section>	
	<section id="contenue">
		<form id="enregistrement" action="Controleur/enregistrement.php" method="POST">
			<fieldset>
				<table>
					<tr>
						<td>Nom du compte</td>
						<td><input type="text" id="nomCompte" name="nomCompte" maxlength="42" required/></td>
					</tr>
					<tr>
						<td>Mot de passe</td>
						<td><input type="password" id="motDePasse" name="motDePasse" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" maxlength="42" required/></td>
					</tr>
					<tr>
						<td>Adresse électronique</td>
						<td><input type="email" id="mail" name="mail" maxlength="42" required/></td>
					</tr>
					<tr>
						<td>Date de naissance</td>
						<td><input type="text" id="naissance" name="naissance" maxlength="10" pattern="(?:19|20)[0-9]{2}/(?:(?:0[1-9]|1[0-2])/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:30))|(?:(?:0[13578]|1[02])/31))" required/></td>
					</tr>
					<tr>
						<td>Nom</td>
						<td><input type="text" id="nom" name="nom" maxlength="42" /></td>
					</tr>
					<tr>
						<td>Prénom</td>
						<td><input type="text" id="prenom" name="prenom" maxlength="42"/></td>
					</tr>
				</table>
			</fieldset>
			<fieldset>
				<input type="submit" value="envoie"/>
				<input type="reset" value="réinitialisation"/>
			</fieldset>
			<a href="Controleur/reinitialisation.php">Revenir à la connexion</a>
		</form>
	</section>
</section>
<script type="text/javascript" src="JavaScript/oXHR.js"></script>
<script type="text/javascript" src="JavaScript/enregistrement.js"></script>