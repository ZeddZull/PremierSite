<form id="choixQuestionnaire"action="Controleur/gestionQuestionnaire.php" method="POST">
	<fieldset>
		<legend>Choix questionnaire</legend>
		<table>
			<tr>
				<th>Questionnaire</th>
				<th>Thème</th>
				<th></th>
			</tr>
			<tr>
				<td>
					<select name="questionnaire" id="questionnaire">
						<?php foreach ($questionnaires as $id => $questionnaire) {
							echo '<option value="'.$id.'"';
							echo '>'.$questionnaire->getNom().'</option>';
						}?>
						<option value='newQuestionnaire' selected=>Nouveau questionnaire</option>
					</select>
				</td>
				<td>
					<select name="domaine" id="domaine">
						<?php foreach ($domaines as $domaine) {
							echo '<option value="'.$domaine.'" ';
							echo '>'.$domaine.'</option>';
						}?>
						<option value='tout' selected>Auncun thème </option>
					</select>
				</td>
				<td>
					<span id = "chargement" style="display: none;"><img src="Images/charge.gif" alt="loading"/></span>
				</td>
			</tr>
		</table>
		<a href="" id="suppression">Supprimer ce questionnaire<a>
		<br>
	</fieldset>
	<fieldset id="editionQuestionnaire">
		<legend>Nouveau Questionnaire</legend>
		<table id="infoQuestionnaire">
			<tr>
				<td>Nom Questionnaire</td>
				<td>
					<input type="text" id="nom" name="nom" maxlength="42" required/>
				</td>
				<td id="checkNom"></td>
			</tr>
			<tr>
				<td>Domaine Questionnaire</td>
				<td>
					<select id="domaineQ" name="domaineQ">
						<?php foreach ($domaines as $domaine) {
							echo '<option value="'.$domaine.'" ';
							echo '>'.$domaine.'</option>';
						}?>
						<option value='tout' selected>Auncun thème </option>
					</select>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>Nombre Questions</td>
				<td>
					<input type="text" id="nbQ" name="nbQ" maxlength="3" pattern="^[1-9][0-9]{0,2}|[0-9][1-9][0-9]|[0-9]{0,2}[1-9]$" required/>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>Durée en secondes</td>
				<td>
					<input type="text" id="dureeQ" name="dureeQ" maxlength="42"/>
				</td>
				<td></td>
			</tr>
		</table>
		<br>
		<table id="lesQuestions">
		</table>
		<br>
		<input type="button" id="envoie" value="Soumettre" />
	</fieldset>
</form>
<script type="text/javascript" src="JavaScript/oXHR.js"></script>
<script type="text/javascript" src="JavaScript/gestionQuestionnaire.js"></script>
<script type="text/javascript" src="JavaScript/eventGestionQuestionnaire.js"></script>