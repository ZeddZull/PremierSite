<form id="formQ" action='Controleur/question.php' method='POST'>
	<fieldset>
		<legend>Choix questions</legend>
		<table>
			<tr>
				<th>Questions</th>
				<th>Thème</th>
				<th></th>
			</tr>
			<tr>
				<td>
					<select id="questions" name="questions">
						<?php
						foreach ($questions as $id => $question) {
							echo '<option value="'.$id.'">'.$question->getQuestion()."</option>"; 
						}?>
						<option value="newQuestion">Nouvelle question</option>
					</select>
				</td>
				<td>
					<select  id="themeQuestion" >
						<?php foreach ($domaines as $domaine) {
							echo '<option value="'.$domaine.'">'.$domaine.'</option>';
						}?>
						<option value="tout" selected>Aucun thème</option>
					</select>
				</td>
				<td>
					<span id = "chargement" style="display: none;"><img src="Images/charge.gif" alt="loading"/></span>
				</td>
			</tr>
		</table>
		<a id="lienS" href=""></a>
	</fieldset>

	<fieldset>
		<legend>Ajout de question</legend>
		<textarea id="question" name="question" rows="1" cols="100" placeholder="Taper votre question ici." required></textarea>
		<br>
		<table id="infoQuestion">
			<tr>
				<td>Domaine de la question</td>
				<td>
					<select name="domaine" id="domaine" >
						<?php foreach ($domaines as $domaine) {
							echo '<option value="'.$domaine.'">'.$domaine.'</option>';
						}?>
						<option value="tout" selected>Aucun thème</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Réponse à la question</td>
				<td>
					<input type="text" id="reponse" name="reponse" maxlength="42" required/>
				</td>
			</tr>
			<tr>
				<td>Durée de la question</td>
				<td>
					<input type="text" id="duree" name="duree" pattern="[0-9]{0,3}" />
				</td>
			</tr>
			<tr>
				<td>Question à choix multiples?</td>
				<td>
					<input type="checkbox" id="forme" name="forme"/>
				</td>
			</tr>			
		</table>
		<br>
		<input type="submit" value="Soumettre"/>
	</fieldset>
</form>

<script type="text/javascript" src="JavaScript/oXHR.js"></script>
<script type="text/javascript" src="JavaScript/gestionQuestion.js"></script>
<script type="text/javascript" src="JavaScript/eventGestionQuestion.js"></script>

