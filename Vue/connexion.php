<section>
	<section id="contenue">
		<form action='Controleur/connexion.php' method='POST'>
			<fieldset>
				<table>
					<tr>
						<td>Nom du compte</td>
						<td><input type="text" id="nomDuCompte" name="nomDuCompte" required/></td>
					</tr>
					<tr>
						<td>Mot de Passe</td>
						<td><input type="password" id="mdp" name="mdp" required/></td>
					</tr>
				</table>
				<br>
				<input type="submit" value="Connexion"/>
			</fieldset>
			<a href="Controleur/enregistrement.php">Creer un compte</a>
		</form>
	</section>
</section>
<script type="text/javascript" src="JavaScript/oXHR.js"></script>
<script type="text/javascript" src="JavaScript/connexion.js"></script>
