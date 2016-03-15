<form id="gestionCompte" action="" method="POST">
	<fieldset>
		<table>
			<tr>
				<td>Nom du compte</td>
				<td><input type="text" id="nomCompte" name="nomCompte" maxlength="42" value=<?php echo '"'.$user->getNomCompte().'"' ?> required/></td>
			</tr>
			<tr>
				<td>Mot de passe</td>
				<td><input type="text" id="motDePasse" name="motDePasse" value=<?php echo '"'.$user->getMotDePasse().'"' ?> pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" maxlength="42" required/></td>
			</tr>
			<tr>
				<td>Adresse électronique</td>
				<td><input type="email" id="mail" name="mail" maxlength="42" value=<?php echo '"'.$user->getMail().'"' ?> required/></td>
			</tr>
			<tr>
				<td>Date de naissance</td>
				<td><input type="text" id="naissance" name="naissance" maxlength="10" value=<?php echo '"'.$user->getDateNaissance().'"' ?> pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])/31))" required/></td>
			</tr>
			<tr>
				<td>Nom</td>
				<td><input type="text" id="nom" name="nom" maxlength="42" value=<?php echo '"'.$user->getNom().'"' ?> /></td>
			</tr>
			<tr>
				<td>Prénom</td>
				<td><input type="text" id="prenom" name="prenom" maxlength="42" value=<?php echo '"'.$user->getPrenom().'"' ?> /></td>
			</tr>
		</table>
	</fieldset>
</form>