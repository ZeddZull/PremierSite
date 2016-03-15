<form id="choixQuestionnaire"action="Controleur/reponse.php" method="POST">
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
							echo '<option value="'.$id.'" ';
							if (isset($_SESSION['idQ'])){
								if ($_SESSION['idQ']==$id){
									echo "selected=true";
								}
							}
							echo '>'.$questionnaire->getNom().'</option>';
						}?>
					</select>
				</td>
				<td>
					<select name="domaine" id="domaine">
						<?php foreach ($domaines as $domaine) {
							echo '<option value="'.$domaine.'" ';
							if (isset($_SESSION['domaine'])){
								if ($_SESSION['domaine']==$id){
									echo "selected=true";
								}
							}
							echo '>'.$domaine.'</option>';
						}?>
						<option value='tout' <?php if(isset($_SESSION['domaine'])){unset($_SESSION['domaine']);}else{echo 'selected=true';} ?> >Tous les questionnaires </option>
					</select>
				</td>
				<td>
					<span id = "chargement" style="display: none;"><img src="Images/charge.gif" alt="loading"/></span>
				</td>
			</tr>
		</table>
		<input type="submit" value="Go !" />
		<br>
	</fieldset>
</form>
<script type="text/javascript" src="JavaScript/oXHR.js"></script>
<script type="text/javascript" src="JavaScript/getQuestionnaire.js"></script>
<script type="text/javascript" src="JavaScript/eventChoixQuestionnaire.js"></script>