<form action="Controleur/gestionTheme.php" method="POST">
	<fieldset id="themeQuestionnaireF">
	<legend> Thème des Questionnaires </legend>
		<label for="themeQuestionnaire" >Selection du thème</label>
		<select name="themeQuestionnaire" id="themeQuestionnaire" >
			<?php foreach ($themesQuestionnaires as $theme) {
				echo '<option value="'.$theme.'">'.$theme. '</option>';
			}
			?>
			<option value="newThemeQ" selected>Nouveau thème</option>
		</select>

		<input type="text" id="newThemeQ" name="newThemeQ" placeholder="Ici notez votre thème" /> 
		<span id = "chargement" style="display: none;"><img src="Images/charge.gif" alt="loading"/></span>
	</fieldset>

	<fieldset>
		<legend> Thèmes des Questions </legend>
		<table id="themesQuestions">
			<tr>
				<th>Les thèmes</th>
				<th></th>
			</tr>
			<tr>
				<td>
					<select name="themeQuestion1" id="themeQuestion1" onchange="javascript:gestionThemeQuestions(this);">
						<?php foreach ($themesQuestions as $theme) {
							echo '<option value="'.$theme.'">'.$theme. '</option>';
						}
						?>
						<option value="newTheme"  selected>Nouveau thème</option>
					</select>
				</td>
				<td id="case1" >
					<input type="text" id="newTheme1" name="newTheme1" placeholder="Ici notez votre thème" /> 
				</td>
			</tr>		
		</table>
		<br>
		
		<div>
			<input id="ajouterTheme" type="button" value="Ajouter Thème"/>
			<input id="supprimerTheme" type="button" value="Supprimer Thème"/>
		</div>
	</fieldset>

	<fieldset>
	<input type="submit" value="Envoyer"/>
	</fieldset>

</form>
<script type="text/javascript" src="JavaScript/oXHR.js"></script>
<script type="text/javascript" src="JavaScript/gestionTheme.js"></script>
<script type="text/javascript" src="JavaScript/eventGestionTheme.js"></script>