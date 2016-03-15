<form action='Controleur/questionnaire.php' method='POST'>

	<fieldset>
		<legend>Ajout de questionnaire</legend>
		<label for="nomquest">Nom du Questionnaire</label>
		<input type="text" id="nomquest" name="nomquest" maxlength="42" />
		<br>
		<label for="nbquest">Nombre de questions contenues dans le questionnaire ?</label>
		<input type="text" id="nbquest" name="nbquest" pattern="[1-9][0-9]{0,2}|[0-9][1-9][0-9]|[0-9]{0,2}[1-9]"/>
		<br>
		<label for="domaine">Quel est le thème du questionnaire ?</label>
		<select id="domaine" name="domaine">
			<?php foreach ($domaines as $domaine) {
				echo "<option value=\"".$domaine."\">".$domaine."</option>";
			}
			?>
		</select>
		<br>
		<label for="duree">Quelle est la durée estimée en seconde du questionnaire ?</label>
		<input type="text" id="duree" name="duree" pattern="[0-9]{0,4}"/>
		<br>
		<input type="submit" value="Soumettre"/>
		<input type="reset"  value="Annuler Tout"/>
	</fieldset>

</form>